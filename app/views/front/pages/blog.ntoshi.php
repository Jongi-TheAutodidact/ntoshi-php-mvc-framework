<?php $this->view('inc/front-header', $data) ?>

<header class="py-5 text-center text-white frontend-hero">
    <div class="container">
        <h2 class="display-3 fw-bolder" style="text-shadow: var(--neon-text-glow);">Welcome to <?= $comp_detail->name ?> Blog</h2>
        <p class="lead fw-normal mb-0" style="text-shadow: 0 0 2px rgba(255,255,255,0.5);">Discover the latest articles, insights, and innovations.</p>
    </div>
</header>
<main class="container py-5 text-light">
    <h2 class="text-center mb-5 display-6 fw-bold frontend-title">All Posts</h2>
    <div class="row">
        <?php if (!empty($posts)): foreach ($posts as $post): ?> 

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card frontend-card h-100">
                        <a href="<?= ROOT . "/single/$post->post_id" ?>">
                            <img src="<?= get_image($post->image) ?>" class="card-img-top" alt="<?= $post->title . ' Post Image' ?>"
                                style="height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $post->title ?></h5>
                            <p class="card-text flex-grow-1"><?= substr($post->content,0,100) ?></p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <a href="<?= ROOT . "/single/$post->post_id" ?>" class="btn btn-sm frontend-btn-primary">Read More <i class="bi bi-arrow-right-short"></i></a>
                                <small class="text-muted">By <?= $post->author ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        else: ?>
            <p class="text-center">No posts found.</p>
        <?php endif; ?>
    </div>
</main>

<?php $this->view('inc/front-footer', $data) ?>