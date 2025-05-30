<?php $this->view('inc/front-header', $data) ?>
<header class="content-page-header text-center text-white">
    <div class="container">
        <h1 class="display-4 fw-bold">About <?=  $comp_detail->name ?></h1>
        <p class="lead">Innovating the way content is managed and delivered.</p>
    </div>
</header>
<main class="container bg-body-tertiary">
    <section class="my-5 px-3">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="frontend-card p-5">
                    <h2 class="card-title mb-3">Our Mission</h2>
                    <p><?= $comp_detail->about ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="<?= ROOT . '/assets/img/ntoshi-tech-4.jpg' ?>" alt="Abstract representation of technology" class="img-fluid rounded shadow-lg" style="filter: saturate(1.2) contrast(1.1);">
            </div>
        </div>
    </section>

    <section class="my-5 feature-section px-3">
        <h2 class="text-center mb-5 display-6 fw-bold frontend-title">Why Choose <?= $comp_detail->name ?>?</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="frontend-card p-4 text-center h-100">
                    <i class="bi bi-speedometer2 fs-1 primary-text mb-3 d-block" style="color: var(--accent-color) !important;"></i>
                    <h5 class="card-title">Blazing Fast</h5>
                    <p>Optimized for performance, ensuring your content loads quickly for all users.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="frontend-card p-4 text-center h-100">
                    <i class="bi bi-palette-fill fs-1 primary-text mb-3 d-block" style="color: var(--accent-color) !important;"></i>
                    <h5 class="card-title">Modern Design</h5>
                    <p>Beautiful, responsive themes and a sleek admin interface you'll love to use.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="frontend-card p-4 text-center h-100">
                    <i class="bi bi-shield-check fs-1 primary-text mb-3 d-block" style="color: var(--accent-color) !important;"></i>
                    <h5 class="card-title">Secure & Reliable</h5>
                    <p>Built with security best practices to protect your data and ensure uptime.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5 px-3">
        <div class="frontend-card p-4">
            <h2 class="card-title text-center mb-4">Meet the Team</h2>
            <div class="row text-center">
                <?php if (!empty($users)): foreach ($users as $user): ?>
                        <div class="col-md-4 mb-4 p-2" style="border: 1px solid #ccc;border-radius:15px">
                            <img src="<?= get_image($user->image) ?>" alt="<?= $user->firstname . ' Profile Image' ?>" class="rounded-circle mb-2" style="width:120px; height:120px; object-fit:cover; border: 3px solid var(--accent-color);">
                            <h5><?= $user->firstname . ' ' . $user->surname ?></h5>
                            <p class="text-muted"><?= $user->user_role ?></p>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </section>

</main>
<?php $this->view('inc/front-footer', $data) ?>