<?php $this->view('inc/admin-header', $data); ?>
<div class="p-3 mt-2 mx-4 bg-body-tertiary shadow-sm rounded animated-card d-flex flex-column align-items-center text-center" style="--animation-order: 1;">
    <?php $this->view('inc/admin-welcome', $data); ?>
</div>

<main class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-6 col-lg-3">
            <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-around align-items-center rounded animated-card">
                <div>
                    <h3 class="fs-2 counter"><?= $users ? count($users) : '0' ?></h3>
                    <p class="fs-5"><?= count($users) == 1 ? 'User' : 'Users' ?></p>
                </div>
                <i class="bi bi-people fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-around align-items-center rounded animated-card">
                <div>
                    <h3 class="fs-2 counter"><?= $customers ? $num_cust : 0 ?></h3>
                    <p class="fs-5"><?= $num_cust == 1 ? 'Customer' : 'Customers' ?></p>
                </div>
                <i class="bi bi-file-earmark-post fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-around align-items-center rounded animated-card">
                <div>
                    <h3 class="fs-2 counter"><?= $posts ? $num_posts : 0 ?></h3>
                    <p class="fs-5"><?= $num_posts == 1 ? 'Post' : 'Posts' ?></p>
                </div>
                <i class="bi bi-chat-dots fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-around align-items-center rounded animated-card">
                <div>
                    <h3 class="fs-2 counter"><?= $comments ? $num_comments : 0 ?></h3>
                    <p class="fs-5"><?= $num_comments == 1 ? 'Comment' : 'Comments' ?></p>
                </div>
                <i class="bi bi-graph-up fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <h3 class="fs-4 mb-3 page-title">Recent Activity</h3>
        <div class="col">
            <div class="table-responsive bg-body-tertiary p-3 rounded shadow-sm animated-card">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Action</th>
                            <th scope="col">Item</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Alice</td>
                            <td><span class="badge bg-success">Created</span></td>
                            <td>New Blog Post "Intro to AI"</td>
                            <td>2024-07-28</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Bob</td>
                            <td><span class="badge bg-info">Commented</span></td>
                            <td>On post "WebSim Features"</td>
                            <td>2024-07-28</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Charlie</td>
                            <td><span class="badge bg-warning text-dark">Edited</span></td>
                            <td>User Profile</td>
                            <td>2024-07-27</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>David</td>
                            <td><span class="badge bg-danger">Deleted</span></td>
                            <td>Comment ID #123</td>
                            <td>2024-07-27</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    <div class="row my-5">
        <h3 class="fs-4 mb-3 page-title">Contact Form Messages</h3>
        <div class="col">
            <div class="table-responsive bg-body-tertiary p-3 rounded shadow-sm animated-card">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $submissionRow = 1;
                        if (!empty($form_submissions)): foreach ($form_submissions as $submission): ?>
                                <tr>
                                    <th scope="row"><?= $submissionRow++ ?></th>
                                    <td><?= $submission->contactName ?></td>
                                    <td><?= $submission->contactEmail ?></td>
                                    <td><?= $submission->contactSubject ?></td>
                                    <td><?= $submission->contactMessage ?></td>
                                    <td><?= $submission->date_created ?></td>
                                </tr>
                        <?php endforeach;
                        endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
</div>

<!-- /#page-content-wrapper -->


<!-- ======= Footer ======= -->
<?php $this->view('inc/admin-footer') ?>