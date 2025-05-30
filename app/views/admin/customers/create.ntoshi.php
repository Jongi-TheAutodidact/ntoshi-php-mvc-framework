<?php $this->view('inc/admin-header', $data); ?>
<div class="p-3 mt-2 mx-4 bg-body-tertiary shadow-sm rounded animated-card d-flex flex-column align-items-center text-center" style="--animation-order: 1;">
    <?php $this->view('inc/admin-welcome', $data); ?>
</div>

<main id="main" class="main">
    <section class="section p-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="" id="user-new" enctype="multipart/form-data">
                            <!--CSRF TOKEN-->
                            <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                            <!--VERIFY TOKEN-->
                            <input type="hidden" name="<?= esc('verify_token') ?>" value="<?= md5(rand()) ?>">
                            <!--USER CREATING RECORD-->
                            <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname' . ' ' . user('surname')) ?>">
                            <?php if (!empty($errors)) : ?>
                                <div class="alert alert-danger text-center col-lg-12">
                                    <?= implode('<br>', $errors);  ?>
                                </div>
                            <?php endif; ?>
                           
                            <!--ROW 0--> 
                            <?= Util::displayFlash('register_success','success') ?>
                            <!--ROW 1-->
                        
                            <div class="row form-row">
                                <div class="col-lg-4">
                                    <label for="user_id">User</label>
                                    <?php $selUserId = old_value('user_id', $preselect_user_id) ?>
                                    <select  name="<?= esc('user_id') ?>" class="form-control mb-1" id="user_id">
                                        <option value="">-- Select User --</option>
                                        <?php if(!empty($users)): foreach($users as $user): ?>
                                            <option value="<?= $user->user_id ?>" <?= $selUserId == $user->user_id ? 'selected' : '' ?>><?= $user->firstname . ' ' . $user->surname ?></option>
                                        <?php endforeach; endif ?>
                                    </select> <span style="font-size: 12px;"><a href="<?= ROOT . '/admin/customers/create-user' ?>"><i class="bi bi-plus-circle"></i> Create New user</a> or select one from the dropdown</span>
                                </div>
                                <div class="col-lg-4">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" name="<?= esc('dob') ?>" value="<?= old_value('dob') ?>" class="form-control mb-1" id="dob">
                                </div>
                                <div class="col-lg-4">
                                    <label for="address">Street Address</label>
                                    <input type="text" name="<?= esc('address') ?>" value="<?= old_value('address') ?>" class="form-control mb-1" id="address" placeholder="e.g. 12 Evelyn Street">
                                </div>
                            </div>
                            <!--ROW 2-->
                            <div class="row form-row">
                                <div class="col-lg-6">
                                    <label for="city">City</label>
                                    <input type="text" name="<?= esc('city') ?>" value="<?= old_value('city') ?>" class="form-control mb-1" id="city">
                                </div>
                                <div class="col-lg-6">
                                    <label for="province">Province</label>
                                    <?php $selProv = old_value('province') ?>
                                    <select name="<?= esc('province') ?>" class="form-control mb-1" id="province">
                                            <option value="">-- Select Province --</option>
                                            <option value="Eastern Cape" <?= $selProv == 'Eastern Cape' ? 'selected' : '' ?>>Eastern Cape</option>
                                            <option value="KwaZulu Natal" <?= $selProv == 'KwaZulu Natal' ? 'selected' : '' ?>>KwaZulu Natal</option>
                                            <option value="Northern Cape" <?= $selProv == 'Northern Cape' ? 'selected' : '' ?>>Northern Cape</option>
                                            <option value="Western Cape" <?= $selProv == 'Western Cape' ? 'selected' : '' ?>>Western Cape</option>
                                            <option value="Free State" <?= $selProv == 'Free State' ? 'selected' : '' ?>>Free State</option>
                                            <option value="North West" <?= $selProv == 'North West' ? 'selected' : '' ?>>North West</option>
                                            <option value="Mpumalanga" <?= $selProv == 'Mpumalanga' ? 'selected' : '' ?>>Mpumalanga</option>
                                            <option value="Limpopo" <?= $selProv == 'Limpopo' ? 'selected' : '' ?>>Limpopo</option>
                                            <option value="Gauteng" <?= $selProv == 'Gauteng' ? 'selected' : '' ?>>Gauteng</option>
                                    </select>
                                </div>
                            </div>
                            <!--ROW 3-->
                            <div class=" row form-row">
                                <div class="col-lg-4">
                                    <label for="postal_code">Postal Code</label>
                                    <input type="number" name="<?= esc('postal_code') ?>" value="<?= old_value('postal_code') ?>" class="form-control mb-1" id="postal_code">
                                </div>
                                <div class="col-lg-4">
                                    <label for="country">Country</label>
                                    <input type="text" name="<?= esc('country') ?>" value="<?= 'South Africa' ?>" class="form-control mb-1" id="country" readonly>
                                </div>
                                <div class="col-lg-4">
                                    <label for="status">Status</label>
                                    <?php $selStatus = old_value('status') ?>
                                    <select name="<?= esc('status') ?>" class="form-control mb-1" id="status">
                                        <option value="Active" <?= $selStatus == 'Active' ? 'selected' : '' ?>>Active</option>
                                        <option value="Suspended" <?= $selStatus == 'Suspended' ? 'selected' : '' ?>>Suspended</option>
                                        <option value="Inactive" <?= $selStatus == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                                        <option value="Pending" <?= $selStatus == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="Blacklisted" <?= $selStatus == 'Blacklisted' ? 'selected' : '' ?>>Blacklisted</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="d-grid gap-2 col-lg-12">
                                    <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">CREATE NEW CUSTOMER</button>
                                    <a href="<?= ROOT ?>/admin/customers" class="btn btn-danger">CANCEL</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->


<!-- ======= Footer ======= -->
<?php $this->view('inc/admin-footer') ?>