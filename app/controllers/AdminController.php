<?php 

/**
 * AdminController class 
 */

defined('ROOTPATH') OR exit('Access Denied!');

class AdminController
{
	use Controller;
	
	public function index() 
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$customer = new Customer();
		$contact_form = new Home;
		$post = new Post();
		$comment = new Comment();
		
		
		/*** CHECK IF USER IS LOGGED IN ***/
		if (!$user->logged_in()) 
		{
			redirect('login');
		}
		
		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		
		$data['users'] = $user->findAll();
		$data['customers'] = $customer->findAll();
		$data['posts'] = $post->findAll();
		$data['comments'] = $comment->commentsWithPosts();
		$data['form_submissions'] = $contact_form->findAll();
		$data['page_title'] = 'Dashboard';
		$data['action'] = '';

		// Count modules
		$data['num_cust'] = $customer->numCustomers();
		$data['num_posts'] = $post->numPosts();
		$data['num_comments'] = $comment->numComments();

		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('admin/index', $data);
	}

	public function companyDetails($id = null)
	{
		$user = new User();
		$company_detail = new CompanyDetail();

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		$company_detail->limit = 1;
		$data['company_details'] = $company_detail->findAll();
		$data['admin_user'] = $user->adminUser();

		$data['row'] = $company_detail->first(['id' => $id]);

		$data['page_title'] = 'Company Details';


		$this->view('admin/company/company_details', $data);
	}

	public function companyDetailsEdit($id = null)
	{
		$user = new User();
		$company_detail = new CompanyDetail();

		// Check if current user is looged in 
		if (!$user->logged_in())
			redirect('login');

		// Create Logo Folder
		$folder = 'uploads/logo/';
		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}

		$company_detail->limit = 1;
		$data['company_details'] = $company_detail->findAll();
		$data['admin_user'] = $user->adminUser();

		$data['row'] = $company_detail->first(['id' => $id]);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($_FILES['image'] && $_FILES['image']['error'] == UPLOAD_ERR_OK && $company_detail->validate($_FILES,$_POST, $id)) {
				$destination = $folder . time() . '_' . $_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'], $destination);
				
				$_POST['image'] = $destination;
				if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
					die('Invalid CSRF Token!');
				} else {
					
					$company_detail->update($id, $_POST);
					Util::setFlash('company_details_update_success', 'Company details updated Successfully!!');
					redirect('admin/company');
				}
			}
		}

		$data['errors'] = $company_detail->errors;
		$data['page_title'] = 'Edit Company Details';


		$this->view('admin/company/company-details-edit', $data);
	}

	public function socialLinks($id = null) 
	{
		$user = new User(); 
		$social_link = new SocialLink();
		
		// Check if current user is looged in 
		if(!$user->logged_in())
			redirect('login');

		$social_link->limit = 1;
		$data['social_links'] = $social_link->findAll();
		$data['admin_user'] = $user->adminUser();
		 
		$data['page_title'] = 'Social Links';
		

		$this->view('admin/company/social_link', $data);
	}

	public function socialLinksEdit($id = null) 
	{
		$user = new User(); 
		$social_link = new SocialLink();
		
		// Check if current user is looged in 
		if(!$user->logged_in())
			redirect('login');

		$social_link->limit = 1;
		$data['social_links'] = $social_link->findAll();
		$data['admin_user'] = $user->adminUser();
		 
		$data['row'] = $social_link->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($social_link->validate($_POST, $id)) {
					
					$social_link->update($id,$_POST);
					Util::setFlash('link_update_success', 'Social Links updated Successfully!!');
					redirect('admin/social');
				}
			}

		$data['errors'] = $social_link->errors;
		$data['page_title'] = 'Edit Social Links';
		

		$this->view('admin/company/social-link-edit', $data);
	}

	public function operatingHours($id = null) 
	{
		$user = new User(); 
		$op_hour = new OperatingHour();
		
		
		// Check if current user is looged in 
		if(!$user->logged_in())
			redirect('login');

		$op_hour->limit = 1;
		$data['op_hours'] = $op_hour->findAll();
		$data['admin_user'] = $user->adminUser();
		 
		$data['page_title'] = 'Operating Hours';
		
		$this->view('admin/company/op-hours', $data);
	}
	
	public function operatingHoursEdit($id = null) 
	{
		$user = new User(); 
		$op_hour = new OperatingHour();
		
		
		// Check if current user is looged in 
		if(!$user->logged_in())
			redirect('login');

		$op_hour->limit = 1;
		$data['op_hours'] = $op_hour->findAll();
		$data['admin_user'] = $user->adminUser();
		 
		$data['row'] = $op_hour->first(['id' => $id]);

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($op_hour->validate($_POST, $id)) {
					
					$op_hour->update($id,$_POST);
					Util::setFlash('ophours_update_success', 'Business Hours updated Successfully!!');
					redirect('admin/hours');
				}
			}

		$data['errors'] = $op_hour->errors;
		$data['page_title'] = 'Edit Operating Hours';
		

		$this->view('admin/company/op-hours-edit', $data);
	}
}
