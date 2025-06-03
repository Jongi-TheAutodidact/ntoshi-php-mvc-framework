<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title . ' | ' . APP_NAME ?></title>
    <meta name="description" content='Purposefully Built, Ntoshi Web Framework is a lightweight, modular, and developer-friendly MVC framework designed for rapid application development across any sector 
    Whether you are a self-taught coder, a university dev student, or a solo entrepreneur, Ntoshi Web Framework empowers you to build full-featured web apps in minutes. Created from scratch, Ntoshi Web Framework is a FOSS initiative that cuts through complexity, gets you shipping faster, and lets you own every line of code you deploy'>
    <meta name="keywords" content="PHP,MVC,Framework,Development,Ntoshi Web Framework,Jongi Brands,Ntoshi PHP framework,lightweight PHP framework,Laravel alternative,CodeIgniter alternative,custom PHP framework,build web apps fast,rapid PHP development,PHP CLI tool,modular PHP framework,self-taught developer PHP,PHP for startups,PHP framework with CLI,PHP artisan alternative,PHP development tools,dev productivity tools,make apps faster PHP,PHP for businesses,church software PHP,PHP CRM,clean PHP framework,small business dev tools, PHP ERP">
    <meta name="author" content="Jongi Mbodla - The Tech Kaffir <jongim@jongibrandz.co.za>">

    <!-- Favicons -->
    <link href="<?= ROOT ?>/assets/img/<?= FAVICON ?>" rel="icon">
    <link href="<?= ROOT ?>/assets/img/<?= FAVICON ?>" rel="apple-touch-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Main Framework CSS -->
    <link rel="stylesheet" href="<?= ROOT . '/assets/css/style.css' ?>">
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
        })();
    </script>
</head>

<body class="frontend-body">

    <nav class="navbar navbar-expand-lg frontend-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= ROOT ?>">
                <img src="<?= ROOT ?>/assets/img/<?= LOGO ?>" width="20%" height="" alt="<?= LOGO_IMG_ALT ?>" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#frontendNavbarNav" aria-controls="frontendNavbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="frontendNavbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a class="nav-link active" href="<?= ROOT ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?= ROOT . '/blog' ?>">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= ROOT . '/about' ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= ROOT . '/services' ?>">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= ROOT . '/contact' ?>">Contact</a></li>
                    <li class="nav-item ms-lg-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="theme-toggle">
                            <label class="form-check-label" for="theme-toggle"><i class="bi bi-moon-stars-fill"></i>/<i class="bi bi-sun-fill"></i></label>
                        </div>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="<?= ROOT . '/admin' ?>" class="btn btn-sm frontend-btn-primary"><i class="bi bi-person-circle me-1"></i> Admin Panel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>