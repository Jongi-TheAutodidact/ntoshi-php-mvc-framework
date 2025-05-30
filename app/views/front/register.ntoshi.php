<?php $this->view('inc/slf-header', $data) ?>


<div class="frontend-card auth-card">
    <div class="card-body">
        <div class="text-center">
            <img src="<?= $company_details[0]->image ?>" width="40%" alt="<?= LOGO_IMG_ALT ?>">
        </div>
        <hr>
        <h3 class="card-title text-center mb-4">Create Account</h3>
        <?= Util::displayFlash('token_not_found_error', 'danger'); ?>
        <?= Util::displayFlash('token_expired_error', 'danger'); ?>
        <?php if (!empty($errors)) : ?>
            <div class="alert alert-danger text-center">
                <?= implode('<br>', $errors);  ?>
            </div>
        <?php endif; ?>

        <form id="register-form" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <label> Profile Image (Upload)<br>
                        <img src="<?= get_image('', 'user')  ?>" class="rounded-circle" width="80px" height="80px" style=" object-fit:cover;cursor:pointer">
                        <input onchange="display_image(this.files[0], event)" type="file" value="<?= old_value('image') ?>" name="<?= esc('image') ?>" class="d-none">
                    </label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name(s)</label>
                        <input type="text" name="<?= esc('firstname') ?>" class="form-control" value="<?= old_value('firstname') ?>" id="firstname" placeholder="Your First Name" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" name="<?= esc('surname') ?>" class="form-control" value="<?= old_value('surname') ?>" id="surname" placeholder="Your Surname" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="<?= esc('username') ?>" class="form-control" value="<?= old_value('username') ?>" id="username" placeholder="Your Username" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="<?= esc('email') ?>" class="form-control" value="<?= old_value('email') ?>" id="email" placeholder="Your Email" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="<?= esc('password') ?>" value="<?= old_value('password') ?>" class="form-control" id="password" placeholder="Create a password" required>
                </div>
                <div class="col-lg-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="<?= esc('phone') ?>" value="<?= old_value('phone') ?>" placeholder="Your Phone Number" class="form-control" id="phone">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="user_role">User Role</label>
                    <input type="text" name="<?= esc('user_role') ?>" value="User" class="form-control bg-secondary text-light" id="user_role" readonly>
                </div>
            </div>
            <!--ROW 3-->
            <div class=" row form-row">
                <div class="col-lg-6">
                    <label for="user_id">User ID</label>
                    <input type="text" name="<?= esc('user_id') ?>" value="<?= rand(10001, 99099) ?>" class="form-control bg-secondary text-light" id="user_id" readonly>
                </div>

                <div class="col-lg-6">
                    <label for="gender">Gender</label>
                    <select name="<?= esc('gender') ?>" class="form-control text-light bg-primary" id="gender">
                        <option value="">-- Choose Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">I agree to the <a href="#" class="text-decoration-none">terms and conditions</a></label>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="bi bi-person-plus-fill me-2"></i>Register</button>
        </form>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">Already have an account? <a href="<?= ROOT ?>/login" class="text-decoration-none">Log in</a></p>
            <p class="mt-3"><a href="<?= ROOT ?>" class="text-decoration-none"><i class="bi bi-arrow-left-circle me-1"></i>Back to Site</a></p>
        </div>
    </div>
</div>


<?php $this->view('inc/slf-footer', $data) ?>