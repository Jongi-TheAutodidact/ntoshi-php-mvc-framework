<?php $this->view('inc/front-header', $data) ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= ROOT ?>">Home</a></li>
                <li>Blog</li>
                <li>Category: <span class="text-warning"><?= $postsPerCat ? $postsPerCat[0]->cat_name : 'No Posts' ?></span></li>
            </ol>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="row">

            <div class="col-lg-8">
                <h4 class="text-center">Displaying Posts Per Category: <?= $postsPerCat ? $postsPerCat[0]->cat_name : 'No Posts For this Category ' ?></h4> <br>
                <div class="row">
                    <a class="btn btn-outline-primary" href="<?= ROOT . '/blog' ?>">Back to All Posts</a>
                </div>
                <hr>
                <div class="container" data-aos="fade-up">
                    <table class="table datatable">
                        <?php if ($postsPerCat) : foreach ($postsPerCat as $postRow) : ?>
                                <tr>
                                    <div class="row">
                                        <td>
                                            <div>
                                                <article class="entry">
                                                    <div class="entry-img">
                                                        <img src="<?= get_image($postRow->image) ?>" style="width:100%;min-height:600px;object-fit:cover;" class="img-fluid">
                                                    </div>

                                                    <h2 class="entry-title">
                                                        <a href="<?= ROOT ?>/home/singleblog/<?= $postRow->post_id ?>"><?= $postRow->title ?></a>
                                                    </h2>

                                                    <div class="entry-meta">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $postRow->author ?></a></li>
                                                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= $postRow->date_posted ?></time></a></li>
                                                            <li class="d-flex align-items-center"><i class="bi bi-server"></i> <a href="blog-single.html"> from: <?= $postRow->cat_name ?></a></li>

                                                        </ul>
                                                    </div>

                                                    <div class="entry-content">
                                                        <p>
                                                            <?= substr($postRow->content, 0, 100) ?>...
                                                        </p>
                                                        <div class="read-more">
                                                            <a href="<?= ROOT ?>/single/<?= $postRow->post_id ?>">Read More...</a>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                                </article><!-- End blog entry -->
                                            </div>

                                        <?php else : ?>
                                            
                                        </td>
                                    </div>
                                </tr>
                            <?php endif; ?>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">

                    <h3 class="sidebar-title">Recent Posts</h3>
                    <div class="sidebar-item recent-posts">
                        <?php if ($recentPosts) : foreach ($recentPosts as $recPostsRow) : ?>
                                <div class="post-item clearfix">
                                    <a href="<?= ROOT ?>/single/<?= $recPostsRow->post_id ?>">
                                        <img src="<?= get_image($recPostsRow->image) ?>" alt="Blog Post Image">
                                        <h4><?= $recPostsRow->title ?></h4>
                                        <time datetime="2020-01-01"><?= $recPostsRow->date_posted ?></time>
                                    </a>
                                </div>
                                <hr>
                        <?php endforeach;
                        endif; ?>
                    </div><!-- End sidebar recent posts-->
                </div><!-- End sidebar -->
            </div>
        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

<?php $this->view('inc/front-footer', $data) ?>