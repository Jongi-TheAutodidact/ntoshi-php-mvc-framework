<?php $this->view('inc/front-header', $data) ?>

<div class="page-title bg-body-tertiary mt-3 mx-5" data-aos="fade">
    <div class="container">
        <nav class="breadcrumbs">
            <ol>
                <li><a href="<?= ROOT ?>">Home</a></li>
                <li>Post Details</li>
                <li class="current"><?= $single_post ? $single_post->title : 'Empty Post' ?></li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->

<div class="container bg-body-tertiary mt-1">
    <?php if(!empty($single_post)): ?>
    <div class="row">

        <div class="col-lg-8">

            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">

                    <article class="article">

                        <div class="post-img text-center m-3">
                            <img src="<?= $single_post ? get_image($single_post->image) : '' ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="title"><?= $single_post->title ?></h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?= $single_post->author ?></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01"><?= date($single_post->date_posted) ?></time></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <?= $num_comments ?> Comments</li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <p style="text-align: justify;">
                                <?= $single_post->content ?>
                            </p>

                        </div><!-- End post content -->

                    </article>

                </div>
            </section><!-- /Blog Details Section -->

            <hr>
            <!-- Blog Comments Section -->
            <section id="blog-comments" class="blog-comments section">
                <div class="container">

                    <h4 class="comments-count"><?= $num_comments  ? $num_comments : 0 ?> <?= $num_comments == 1 ? 'Comment' : 'Comments' ?></h4>

                    <?php if (!empty($spec_post_comments)): foreach ($spec_post_comments as $spec_post_comment): ?>
                            <div id="comment-1" class="comment">
                                <div class="d-flex">
                                    <div class="bg-secondary text-light p-4" style="border-radius: 15px;">
                                        <h5><i class="bi bi-person text-warning"></i> &nbsp;<?= $spec_post_comment->fullname ?>
                                            <time datetime="2020-01-01"><i class="bi bi-clock text-warning"></i> &nbsp; <?= $spec_post_comment->com_date ?></time>

                                            <p>
                                                <span style="font-weight:bold">Comment:</span> <br> <?= $spec_post_comment->comment ?>
                                            </p>
                                    </div>
                                </div>

                            </div><!-- End comment div -->
                        <?php endforeach;
                    else: ?>
                        <div class="alert alert-danger text-center col-lg-12">
                            <h5>No Comments to show</h5>
                            <p>Go ahead and comment <a href="#comment-form" style="font-weight: bold;"><u>here</u></a></p>
                        </div>
                    <?php endif ?>
                </div>
            </section><!-- /Blog Comments Section -->

            <!-- Comment Form Section -->
            <section id="comment-form" class="comment-form section">
                <div class="container" style="border: 1px solid #fff">

                    <form action="" method="POST">
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger text-center col-lg-12">
                                <?= implode('<br>', $errors);  ?>
                            </div>
                        <?php endif; ?>
                        <h4>Post Comment</h4>
                        <p>Your email address will not be published. Required fields are marked * </p>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input name="<?= esc('fullname') ?>" type="text" value="<?= old_value('fullname') ?>" class="form-control bg-light text-dark" placeholder="Your Full Name*">
                            </div>
                            <!--Post ID-->
                            <input name="<?= esc('post') ?>" type="hidden" value="<?= $single_post->post_id ?>">
                            <!--Session ID-->
                            <input name="<?= esc('session_id') ?>" type="hidden" value="<?= session_id() ?>">
                            <div class="col-md-6 form-group">
                                <input name="<?= esc('email') ?>" value="<?= old_value('email') ?>" type="text" class="form-control bg-light text-dark" placeholder="Your Email*">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col form-group">
                                <textarea name="<?= esc('comment') ?>" class="form-control bg-light text-dark" placeholder="Your Comment*"><?= old_value('comment') ?></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </div>

                    </form>

                </div>
            </section><!-- /Comment Form Section -->

        </div>

        <div class="col-lg-4 sidebar">

            <div class="widgets-container">
                <!-- Categories Widget -->
                <div class="categories-widget widget-item mt-5">

                    <h3 class="widget-title">Categories</h3>
                    <ul class="mt-3 ms-0 ps-0" style="list-style-type: none;">
                        <?php if (!empty($categories)): foreach ($categories as $cat): ?>
                                <li><a href="#"><?= $cat->cat_name ?></a></li>
                        <?php endforeach;
                        endif ?>
                    </ul>

                </div><!--/Categories Widget -->
                <hr style="border: none; height: 4px; background: linear-gradient(to right, #ccc, #963, #000); box-shadow: 0 2px 4px rgba(0,0,0,0.3);">

                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">

                    <h3 class="widget-title">Recent Posts</h3>
                    <?php if (!empty($recentPosts)): foreach ($recentPosts as $recentPost): ?>
                            <div class="post-item">
                                <a href="<?= ROOT . '/single/' . $recentPost->post_id ?>">
                                    <img src="<?= get_image($recentPost->image) ?>" width="70%" alt="Recent Post Image" class="flex-shrink-0">
                                    <div>
                                        <h5 class="mt-2" style="font-size: 15px;"><?= $recentPost->title ?></h5>
                                        <time datetime="2020-01-01" style="font-size: 12px;text-decoration:none"><?= $recentPost->date_posted ?></time>
                                </a>
                                <hr style="border: none; border-top: 2px dashed #ccc;">

                            </div>

                </div><!-- End recent post item-->
        <?php endforeach;
                    endif ?>
            </div><!--/Recent Posts Widget -->
        </div>
    </div>
    <?php else: ?>
        <div class="alert alert-danger">
            <h4 class="text-center">Oops, no single blog post found!!</h4>
            <p>Return to <a href="<?= ROOT . '/blog' ?>">Blog</a></p>
        </div>
    <?php endif ?>
</div>

</main>


<?php $this->view('inc/front-footer', $data) ?>