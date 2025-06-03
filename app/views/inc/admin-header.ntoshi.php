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
  <!--Bootstrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!--Main Framework CSS-->
  <link rel="stylesheet" href="<?= ROOT . '/assets/css/style.css' ?>">
  <script>
    // Initialize the theme before the DOM loads to prevent flash of unstyled content
    (function() {
      const savedTheme = localStorage.getItem('theme') || 'light';
      document.documentElement.setAttribute('data-bs-theme', savedTheme);
    })();
  </script>
</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <?php $this->view('inc/admin-sidebar'); ?>
    <!-- /#sidebar -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="bi bi-list fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0 page-title"><?= $page_title ?></h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
            <li class="nav-item me-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="theme-toggle">
                <label class="form-check-label" for="theme-toggle"><i class="bi bi-moon-stars-fill"></i>/<i class="bi bi-sun-fill"></i></label>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold d-flex align-items-center" href="#" id="navbarDropdown"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= ROOT . '/assets/img/profile-pic.png' ?>" alt="Profile" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                <h6><?= user('firstname') . ' ' . user('surname') ?></h6>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= ROOT . "/admin/users/profile/" . $_SESSION['id'] ?>"><i class="bi bi-person-fill me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="<?= ROOT . "/admin/users/edit/" . $_SESSION['id'] ?>"><i class="bi bi-gear-fill me-2"></i>Profile Setting</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= ROOT . '/logout' ?>"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>