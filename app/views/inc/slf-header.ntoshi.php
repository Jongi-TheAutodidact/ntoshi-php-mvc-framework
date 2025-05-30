<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title . ' | ' . APP_NAME ?></title>
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
<body class="frontend-body auth-wrapper">

    <div class="theme-toggle-container">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="theme-toggle">
            <label class="form-check-label" for="theme-toggle"><i class="bi bi-moon-stars-fill"></i>/<i class="bi bi-sun-fill"></i></label>
        </div>
    </div>