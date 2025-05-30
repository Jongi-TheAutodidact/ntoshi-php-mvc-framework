<?php 

/**
 * CustomerController class 
 */

defined('ROOTPATH') OR exit('Access Denied!');

class CustomerController
{
	use Controller;
	
	public function index() 
	{
		$customer = new Customer();
		$user = new User();

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$data['customers'] = $customer->customersWithUsersDetails();
		
		$data['errors'] = $customer->errors;
		$data['page_title'] = 'Customers';


		$this->view('admin/customers/customers', $data);
	}

	public function create($id = null)
	{
		$user = new User();
		$customer = new Customer();

		// Check if current user is logged in 
		if (!$user->logged_in())
			redirect('login');
		$data['users'] = $user->findAll();

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($customer->validate($_POST)) {
				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					// Insert New Customer details into DB
					$customer->insert($_POST);
					Util::setFlash('cust_register_success', 'Customer Registered Successfully!!');
					redirect('admin/customers');
				}
			}
		}


		$preselect_user_id = $id ?? null;
		$data['preselect_user_id'] = $preselect_user_id;


		$data['errors'] = $customer->errors;
		$data['page_title'] = 'Add New Customer';


		$this->view('admin/customers/create', $data);
	}

	public function profile($id = null)
	{
		$user = new User();
		$customer = new Customer();

		// Check if current user is logged in 
		if (!$user->logged_in())
			redirect('login');
		$data['users'] = $user->findAll();

		# extract ID from URL (admin/customers/profile/{id})
		$url = ROOT . "/admin/customers/profile/$id";
		$id= extract_id_from_url($url);
		$data['id'] = $id;
		# END extract ID from URL (admin/customers/profile/{id})

		// Get Single Customer Profile
		$data['cust_profile'] = $customer->customerProfile($id);

		$data['page_title'] = 'Customer Profile';
		$this->view('admin/customers/profile', $data);
	}

	public function edit($id = null)
	{
		$data['page_title'] = 'Edit Customer';
		$this->view('admin/customers/edit', $data);
	}

	public function delete($id = null)
	{
		$data['page_title'] = 'Delete Customer';
		$this->view('admin/customers/delete', $data);
	}

	public function createUser()
	{
		$user = new User();

		// Create Users' Profile Folder
		$folder = 'uploads/users/';
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

		// Check if current user is logged in 
		if (!$user->logged_in())
			redirect('login');

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
						redirect('admin/users/new');
					} else 
					if ($username) {
						Util::setFlash('username_exists_error', 'Username already in use by another user!!');
						redirect('admin/users/new');
					} else {
						// Hash The Submitted Password
						$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
						// Insert New User details into DB
						$user->insert($_POST);
						Util::setFlash('register_success', 'User Registered Successfully!!');
						redirect('admin/customers/new/' . $_POST['user_id']);
					}
				}
			}
		}


		$data['errors'] = $user->errors;
		$data['page_title'] = 'Create New User';


		$this->view('admin/users/create', $data);
	}
}
