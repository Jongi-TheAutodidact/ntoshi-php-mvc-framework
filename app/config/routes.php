<?php

return [
    # ADMIN ROUTES 
    // Admin
    'admin' => ['AdminController', 'index'],

    // Users (Admin Portal)
    'admin/users' => ['UserController', 'index', 'middleware' => ['AuthMiddleware']],
    'admin/users/new' => ['UserController', 'create'],
    'admin/users/edit/{id}' => ['UserController', 'edit'],
    'admin/users/delete/{id}' => ['UserController', 'delete'],
    'admin/users/profile/{id}' => ['UserController', 'profile'],
    'admin/users/pdf/{id}' => ['PDF', 'userProfilePDF'],
    'customers' => ['AdminController', 'customers'], 

    // Customers (Admin Portal)
    'admin/customers' => ['CustomerController', 'index'],
    'admin/customers/new/{id}' => ['CustomerController', 'create'],
    'admin/customers/create-user' => ['CustomerController', 'createUser'],
    'admin/customers/edit/{id}' => ['CustomerController', 'edit'],
    'admin/customers/delete/{id}' => ['CustomerController', 'delete'],
    'admin/customers/profile/{id}' => ['CustomerController', 'profile'],
    'admin/customers/pdf/{id}' => ['PDF', 'CustomerProfilePDF'],

    // Company (Admin Portal)
    'admin/company' => ['AdminController', 'companyDetails'],
    'admin/company/edit/{id}' => ['AdminController', 'companyDetailsEdit'],
    'admin/social' => ['AdminController', 'socialLinks'],
    'admin/social/edit/{id}' => ['AdminController', 'socialLinksEdit'],
    'admin/hours' => ['AdminController', 'operatingHours'],
    'admin/hours/edit/{id}' => ['AdminController', 'operatingHoursEdit'],

    // Authentication routes
    'login' => ['AuthController', 'login'],
    'user-registration' => ['AuthController', 'user_registration'],
    'logout' => ['AuthController', 'logout'],

    // Blog Posts (Admin Portal)
    'admin/posts' => ['PostController', 'index'],
    'admin/post/create/{id}' => ['PostController', 'create'],
    'admin/posts/create-category' => ['PostController', 'createCat'],
    'admin/post/edit/{id}' => ['PostController', 'edit'],
    'admin/post/delete/{id}' => ['PostController', 'delete'],
    'admin/post/view/{id}' => ['PostController', 'post_view'],
    'admin/comments' => ['PostController', 'comments'],

    // Categories (Admin Portal)
    'admin/categories' => ['PostController', 'categories'],
    'admin/category/create' => ['PostController', 'create_category'],
    'admin/category/edit/{id}' => ['PostController', 'edit_category'],
    'admin/category/delete/{id}' => ['PostController', 'delete_category'],

    # FRONTEND ROUTES

    // Default route (optional)
    '' => ['HomeController', 'index'],
    'home/index' => ['HomeController', 'index'],

     // Front Navigation
    'contact' => ['HomeController', 'contact'],
    'about' => ['HomeController', 'about'],
    'services' => ['HomeController', 'services'],

     // Blog
    'blog' => ['HomeController', 'blog'],
    'single/{id}' => ['HomeController', 'single'], 
    'postspercategory/{id}' => ['HomeController', 'postsPerCategory'], 

    // User routes
    'user/profile' => ['UserController', 'profile'],
    'user/settings' => ['UserController', 'settings'], 

    // Legal Pages
    'popia' => ['HomeController', 'popia'],
    'privacy' => ['HomeController', 'privacy'], 

   

   
];


