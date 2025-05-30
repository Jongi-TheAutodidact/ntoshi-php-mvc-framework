<?php $this->view('inc/front-header', $data) ?>


<header class="py-5 text-center text-white frontend-hero">
  <div class="container">
    <h1 class="display-3 fw-bolder" style="text-shadow: var(--neon-text-glow);">Build With <?= APP_NAME ?></h1>
    <p class="lead fw-normal mb-0" style="text-shadow: 0 0 2px rgba(255,255,255,0.5);">Discover the latest articles, insights, and innovations.</p>
  </div>
</header>

<section class="py-5 feature-section bg-body-tertiary shadow-sm ">
  <div class="container">
    <h2 class="text-center mb-5 display-6 fw-bold frontend-title">Explore Our World</h2>
    <div class="row gx-4 gx-lg-5">
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="frontend-card h-100 p-4 text-center">
          <i class="bi bi-lightbulb-fill fs-1 primary-text mb-3 d-block" style="color: var(--accent-color) !important;"></i>
          <h4 class="card-title">Innovative Ideas</h4>
          <p class="card-text">Dive into articles about cutting-edge technology and creative solutions.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="frontend-card h-100 p-4 text-center">
          <i class="bi bi-braces fs-1 primary-text mb-3 d-block" style="color: var(--accent-color) !important;"></i>
          <h4 class="card-title">Developer Insights</h4>
          <p class="card-text">Tips, tutorials, and discussions for web developers and tech enthusiasts.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="frontend-card h-100 p-4 text-center">
          <i class="bi bi-bar-chart-line-fill fs-1 primary-text mb-3 d-block" style="color: var(--accent-color) !important;"></i>
          <h4 class="card-title">Future Trends</h4>
          <p class="card-text">Explore upcoming trends in AI, web development, and digital experiences.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<main class="container-fluid py-5 bg-body-tertiary shadow-sm ">
  <h2 class="text-center mb-5 display-6 fw-bold frontend-title">Latest Posts</h2>
  <div class="row mx-5">
    <?php if (!empty($recentPosts)): foreach ($recentPosts as $recentPost): ?>

        <div class="col-md-6 col-lg-4 mb-4">
          <div class="card frontend-card h-100">
            <a href="<?= ROOT . "/single/$recentPost->post_id" ?>">
              <img src="<?= get_image($recentPost->image) ?>" class="card-img-top" alt="<?= $recentPost->title . ' Post Image' ?>"
                style="height: 200px; object-fit: cover;">
            </a>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= $recentPost->title ?></h5>
              <p class="card-text flex-grow-1"><?= substr($recentPost->content,0,100) ?></p>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="<?= ROOT . "/single/$recentPost->post_id" ?>" class="btn btn-sm frontend-btn-primary">Read More <i class="bi bi-arrow-right-short"></i></a>
                <small class="text-muted">By <?= $recentPost->author ?></small>
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