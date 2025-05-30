<?php $this->view('inc/slf-header', $data) ?>


<div class="frontend-card auth-card">
    <div class="card-body">
        <div class="text-center">
            <img src="<?= $company_details[0]->image ?>" width="40%" alt="<?= LOGO_IMG_ALT ?>">
        </div>
        <hr>
        <h3 class="card-title text-center mb-4">User Login</h3>
        <?= Util::displayFlash('token_not_found_error', 'danger'); ?>
        <?= Util::displayFlash('token_expired_error', 'danger'); ?>
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center">
                <?= implode('<br>', $errors);  ?>
            </div>
        <?php endif; ?>
        <form method="post" id="login-form">
            <div class="mb-3">
                <label for="email" class="form-label">Username/Email</label>
                <input type="text" name="<?= esc('email') ?>" value="<?php if (!empty($sess_email)) {
                                                                            echo $sess_email;
                                                                        } elseif (isset($_COOKIE['remember_email'])) {
                                                                            echo $_COOKIE['remember_email'];
                                                                        }  ?>" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="<?= esc('password') ?>" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-box-arrow-in-right me-2"></i>Login</button>
        </form>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-1"><a href="<?= ROOT . '/forgot' ?>" class="text-decoration-none">Forgot password?</a></p>
            <p class="mb-0">Don't have an account? <a href="<?= ROOT . '/user-registration' ?>" class="text-decoration-none">Sign up/Register</a></p>
            <p class="mt-3"><a href="<?= ROOT ?>" class="text-decoration-none"><i class="bi bi-arrow-left-circle me-1"></i>Back to Site</a></p>
        </div>
    </div>
</div>


<?php $this->view('inc/slf-footer', $data) ?>