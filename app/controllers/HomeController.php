<?php

/**
 * HomeController class 
 */

defined('ROOTPATH') or exit('Access Denied!');

class HomeController
{
	use Controller;

	public function index()
	{

		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$op_hour = new OperatingHour();
		$post = new Post();


		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Home';
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]);
		$data['op_hours'] = $op_hour->first(['id' => 1]);
		$data['recentPosts'] = $post->recentPosts();


		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('front/home', $data);
	}

	public function popia() 
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$op_hour = new OperatingHour();


		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Home';
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]); 
		$data['op_hours'] = $op_hour->first(['id' => 1]);

		$data['page_title'] = 'Popia Compliance';
		$this->view('front/pages/popia', $data);
	}

	public function privacy() 
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$op_hour = new OperatingHour();


		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Home';
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]);
		$data['op_hours'] = $op_hour->first(['id' => 1]);

		$data['page_title'] = 'Privacy Policy';
		$this->view('front/pages/privacy', $data);
	}

	public function blog() 
	{
		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$op_hour = new OperatingHour();

		// Blog
		$blog = new Blog();
		$data['posts'] = $blog->postsWithcats();
		$data['recentPosts'] = $blog->recentPosts();

		// Categories
		$category = new Category();
		$data['categories'] = $category->findAll();


		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]);
		$data['op_hours'] = $op_hour->first(['id' => 1]);

		$data['page_title'] = 'Company News';
		$this->view('front/pages/blog', $data);
	}

	public function single($id = null) 
	{
		// User
		$user = new User();
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Blog Spot';
		$data['logged_in_user'] = $user->logged_in();
		$data['session_id'] = session_id();
		// Social Links
		$contact = new SocialLink();
		$data['social_link'] = $contact->first(['id' => 1]);
		// Company Details
		$detail = new CompanyDetail();
		$data['comp_detail'] = $detail->first(['id' => 1]);
		
		// Blog
		$blog = new Blog();
		$data['posts'] = $blog->findAll();
		$data['single_post'] = $blog->singlePost($id);
		// show($data['single_post']); die;
		$data['recentPosts'] = $blog->recentPosts();

		// Categories
		$category = new Category();
		$data['categories'] = $category->findAll();

		// Comments 
		$comment = new Comment();
		$data['comments'] = $comment->findAll();

		# extract ID from URL (single/{ID})
		$url = ROOT . "/single/$id";
		$id= extract_id_from_url($url);
		$data['id'] = $id;
		# END extract ID from URL (single/{ID})

		$data['spec_post_comments'] = $comment->specificPostComments($id);

		$data['num_comments'] = $comment->commentCount($id);
		
		// Insert new comment into DB
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			if ($comment->validate($_POST,$id)) 
			{
				if($data['session_id'] !== $_POST['session_id'])
				{
					die('We could not process your request!');
				} else 
				{
					// Insert New User details into DB
					$comment->insert($_POST);

					redirect("single/$id/#blog-comments");
				}
			}
		}

		$data['errors'] = $comment->errors;

		$data['page_title'] = 'Company News';
		$this->view('front/pages/single-blog', $data);
	}

	public function postsPerCategory($id = null) 
	{
		// User
		$user = new User();
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Blog Spot';
		$data['logged_in_user'] = $user->logged_in();
		$data['session_id'] = session_id();
		// Social Links
		$contact = new SocialLink();
		$data['social_link'] = $contact->first(['id' => 1]);
		// Company Details
		$detail = new CompanyDetail();
		$data['comp_detail'] = $detail->first(['id' => 1]);
		
		// Blog
		$blog = new Blog();
		$data['posts'] = $blog->postsWithcats();
		$data['recentPosts'] = $blog->recentPosts();
		
		// Extract ID from the targeted URL
		$id = extract_id_from_url("postspercategory/$id");

		// Display Posts per Category
		$data['postsPerCat'] = $blog->postsPerCat($id);
	
		// Categories
		$category = new Category();
		$data['categories'] = $category->findAll();

		// Comments 
		$comment = new Comment();
		$data['comments'] = $comment->findAll();
		$data['num_comments'] = $comment->commentCount($id);
		
		// Insert new comment into DB
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			if ($comment->validate($_POST,$id)) 
			{
				if($data['session_id'] !== $_POST['session_id'])
				{
					die('We could not process your request!');
				} else 
				{
					// Insert New User details into DB
					$comment->insert($_POST);

					redirect("single/$id/#blog-comments");
				}
			}
		}

		$data['errors'] = $comment->errors;

		$data['page_title'] = 'Company News';
		$this->view('front/pages/posts-per-cat', $data);
	}

	public function contact()
	{

		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$op_hour = new OperatingHour();
		$contact_form = new Home();


		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Contact Us';
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]);
		$data['op_hours'] = $op_hour->first(['id' => 1]);

		// Contact Form Data Submission
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($contact_form->validate($_POST)) {
				// Insert Contact form details into DB
				$contact_form->insert($_POST);
				Util::setFlash('form_submit_success', 'Thank you for contacting us, your message has been submitted successfully!!');
				redirect('contact');
			}
		}

		$data['errors'] = $contact_form->errors;


		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('front/pages/contact', $data);
	}
	public function about()
	{

		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$op_hour = new OperatingHour();


		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['page_title'] = 'About us';
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]);
		$data['op_hours'] = $op_hour->first(['id' => 1]);


		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('front/pages/about', $data);
	}
	public function services()
	{

		/*** INSTANTIATE RELEVANT INSTANCES (OBJECTS) ***/
		$user = new User();
		$contact = new SocialLink();
		$detail = new CompanyDetail();
		$op_hour = new OperatingHour();


		/*** EXPORT THE (OBJECTS) VARIABLES ***/
		$data['users'] = $user->findAll();
		$data['page_title'] = 'Services';
		$data['logged_in_user'] = $user->logged_in();
		$data['social_link'] = $contact->first(['id' => 1]);
		$data['comp_detail'] = $detail->first(['id' => 1]);
		$data['op_hours'] = $op_hour->first(['id' => 1]);


		/*** DISPLAY THE VIEW PAGE ***/
		$this->view('front/pages/services', $data);
	}
}
