<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title . ' | ' . APP_NAME ?></title>
    <!-- Favicons -->
    <link href="<?= ROOT ?>/assets/img/<?= FAVICON ?>" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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