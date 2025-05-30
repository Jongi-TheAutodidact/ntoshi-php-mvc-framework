<?php

/**
 * AuthController class 
 */

defined('ROOTPATH') or exit('Access Denied!');

class AuthController
{
	use Controller;

	public function login()
	{
		$company_detail = new CompanyDetail;
		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		
		$data['errors'] = [];
		$data['company_details'] = $company_detail->findAll();

		/*** LOGIN USER ***/
		$data['page_title'] = 'Login';
		if (!empty($_SESSION['user'])) {
			redirect('admin');
		} else
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user = new User();
			// Check if the input is an email or username
			$input = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
			$row = $user->first([$input => $_POST['email']]);

			if ($row && password_verify($_POST['password'], $row->password)) {
				$user->authenticate($row);
				$data['remember'] = $_POST['remember'];
				$data['sess_email'] = $_SESSION['email'];
				if (isset($_POST['remember'])) {
					setcookie('remember_email', $data['sess_email'], time() + 3600 * 24 * 365);
					setcookie('remember', $data['remember'], time() + 3600 * 24 * 365);
				} else {
					setcookie('remember_email', "", time() - 3600);
					setcookie('remember', "", time() - 3600);
				}

				redirect('admin');
			}


			$data['errors']['email'] = 'Wrong email/username or password!';
		}



		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('front/login', $data);
	}

	public function logout()
	{
		$user = new User();
		$user->logout();
        redirect('login');
	}
	
	public function forgot()
	{
		$user = new User();
		$mailer = new Mailer();
		$company_detail = new CompanyDetail;

		$data['company_details'] = $company_detail->findAll();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$user->forgotPwd($_POST['email']);

			$token = $user->getResetToken($_POST['email']);
			$token = $token->reset_token_hash;
			$root = ROOT;

			$mail = $mailer->sendMail();

			// Set Properties
			$mail->setFrom($data['company_details'][0]->email, $data['company_details'][0]->name);
			$mail->addAddress($_POST['email']);
			$mail->Subject = ('PASSWORD RESET');
			$mail->Body = <<<END
			
				You have requested the recovery of you password and as we promised, we are at your service in this regard. <br>
				Kindly click <a href="$root/login/forgotLink/{$token}">Here</a> to reset your password. <br><br> <hr> 
				<em><strong>The Ntoshi MVC Framework Development Team</strong></em>
			
			END;

			try {
				$mail->send();
				Util::setFlash('reset_msg_success', 'Message has been sent successfully, check your inbox for further instructions!');
				redirect('login/forgot');
			} catch (Exception $e) {
				Util::setFlash('reset_msg_error', "Message could not be sent. Mailer Error: {$mail->ErrorInfo}!");
				redirect('login/forgot');
			}
		}

		$data['page_title'] = 'Password Reset';

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('admin/users/forgot', $data);
	}

	public function forgotLink($id = NULL)
	{
		$user = new User();
		// Extract the token from the url
		$token = basename($_GET['url']);
		$token_hash = hash('sha256', $token);

		$user_token = $user->tokenInURL($token_hash);

		if ($user_token == NULL) {
			Util::setFlash('token_not_found_error', 'Token not found!!');
			redirect('login');
		} elseif (strtotime($user_token->reset_token_expires_at) <= time()) {
			Util::setFlash('token_expired_error', 'Your password reset token has expired, you\' have to make a new request!!');
			redirect('login');
		} else {
			// Extract user ID from the token's record
			$id = $user_token->id;
			// Pass $id to the view
			$data['id'] = $id;

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($user->pwd_validate($_POST)) {

					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

					// Update Password
					$user->updatePwd($id, $_POST);
					Util::setFlash('password_reset_success', 'Password reset successful, you may now login!!');

					redirect('login');
				}
			}
		}

		$data['errors'] = $user->errors;
		$data['page_title'] = 'Login';

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('admin/users/forgot-pass', $data);
	}

	public function user_registration()
	{
		$user = new User();
		$company_detail = new CompanyDetail;

		// Create Users' Profile Folder
		$folder = 'uploads/users/';
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

		$data['company_details'] = $company_detail->findAll();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($user->validate($_FILES, $_POST)) {
				// Upload User Profile Image
				$destination = $folder . time() . '_' . $_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], $destination);

				$_POST['image'] = $destination;

				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					// Check if email does not exist
					$user_email = $user->getUserByEmail($_POST['email']);
					$username = $user->getUserByUsername($_POST['username']);
					if ($user_email) {
						Util::setFlash('email_exists_error', 'Email already in use by another user!!');
						redirect('register');
					} else 
					if ($username) {
						Util::setFlash('username_exists_error', 'Username already in use by another user!!');
						redirect('register');
					} else {
						// Hash The Submitted Password
						$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
						// Insert New User details into DB
						$user->insert($_POST);
						Util::setFlash('frontend_register_user', 'User Registered Successfully!!');
						redirect('admin');
					}
				}
			}
		}


		$data['errors'] = $user->errors;
		$data['page_title'] = 'New User Registration';


		$this->view('front/register', $data);
	}
}
