<?php $this->view('inc/front-header', $data) ?>

<main class="container py-5">
    <section class="my-5">
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="frontend-card p-4 p-md-5 contact-form-card">
                    <h3 class="card-title mb-4">Send Us a Message</h3>
                    <?php if (!empty($errors)) : ?>
                        <div class="alert alert-danger text-center col-lg-12">
                            <?= implode('<br>', $errors);  ?>
                        </div>
                    <?php endif; ?>
                    <?= Util::displayFlash('form_submit_success', 'success') ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="contactName" class="form-label">Full Name</label>
                            <input type="text" name="<?= esc('contactName') ?>" class="form-control" value="<?= old_value('contactName') ?>" id="contactName" placeholder="Your Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email Address</label>
                            <input type="email" name="<?= esc('contactEmail') ?>" class="form-control" value="<?= old_value('contactEmail') ?>" id="contactEmail" placeholder="you@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="contactSubject" class="form-label">Subject</label>
                            <?php $selSubject = old_value('contactSubject') ?>
                            <select name="<?= esc('contactSubject') ?>" class="form-control bg-dark text-light" id="contactSubject">
                                <option value="">-- Reason for contacting --</option>
                                <option value="Web Development Enquiry" <?= $selSubject == 'Web Development Enquiry' ? 'selected' : '' ?>>Web Development Enquiry</option>
                                <option value="General Sales Enquiry" <?= $selSubject == 'General Sales Enquiry' ? 'selected' : '' ?>>General Sales Enquiry</option>
                                <option value="Specific Project Enquiry" <?= $selSubject == 'Specific Project Enquiry' ? 'selected' : '' ?>>Specific Project Enquiry</option>
                                <option value="Other General Enquiry" <?= $selSubject == 'Other General Enquiry' ? 'selected' : '' ?>>Other General Enquiry</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contactMessage" class="form-label">Message</label>
                            <textarea name="<?= esc('contactMessage') ?>" class="form-control" id="contactMessage" rows="5" placeholder="Your message here..."><?= old_value('contactMessage') ?></textarea>
                        </div>
                        <button type="submit" class="btn frontend-btn-primary btn-lg w-100">
                            <i class="bi bi-send-fill me-2"></i>Send Message
                        </button>
                        
                    </form>
                    
                </div>
            </div>
            <div class="col-lg-5">
                <div class="frontend-card p-4 h-100">
                    <h4 class="card-title mb-3">Contact Information</h4>
                    <p><i class="bi bi-geo-alt-fill me-2 text-info"></i><?= $comp_detail->address ?></p>
                    <p><i class="bi bi-telephone-fill me-2 text-info"></i><?= $comp_detail->phone ?></p>
                    <p><i class="bi bi-envelope-fill me-2 text-info"></i><?= $comp_detail->email ?></p>
                    <p>

                        <?php if (!empty($op_hours)): ?>
                            <i class="bi bi-clock-fill me-2 text-info"></i> Mon - Fri: <?= $op_hours->mon ?> PM (SAST) <br>
                            <i class="bi bi-clock-fill me-2 text-info"></i> Sat: <?= $op_hours->sat ?> PM (SAST) <br>
                            <i class="bi bi-clock-fill me-2 text-info"></i> Sun: <?= $op_hours->sun ?> PM (SAST) <br>
                        <?php endif  ?>
                    </p>

                    <hr>
                    <h5 class="mt-4 mb-3">Follow Us</h5>
                    <div class="d-flex">
                        <a href="<?= $social_link->twitter_link ?>" target="_blank" class="btn btn-outline-info rounded-circle me-2" title="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="<?= $social_link->facebook_link ?>" target="_blank" class="btn btn-outline-info rounded-circle me-2" title="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="<?= $social_link->linkedin ?>" target="_blank" class="btn btn-outline-info rounded-circle me-2" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="<?= $social_link->tiktok_link ?>" target="_blank" class="btn btn-outline-info rounded-circle" title="Tiktok"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php $this->view('inc/front-footer', $data) ?>