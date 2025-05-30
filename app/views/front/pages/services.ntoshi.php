<?php $this->view('inc/front-header', $data) ?>
<header class="content-page-header text-center text-white">
    <div class="container">
        <h1 class="display-4 fw-bold">Our Services</h1>
        <p class="lead">Tailored solutions to elevate your digital presence.</p>
    </div>
</header>

<main class="container py-5">
    <section class="my-5 feature-section">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="frontend-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-laptop fs-2 me-3" style="color: var(--accent-color);"></i>
                        <h4 class="card-title mb-0">CMS Implementation</h4>
                    </div>
                    <p>Full setup and configuration of <?= $comp_detail->name ?> tailored to your specific needs. We ensure a smooth launch and provide initial training for your team.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="frontend-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-palette2 fs-2 me-3" style="color: var(--accent-color);"></i>
                        <h4 class="card-title mb-0">Custom Theme Design</h4>
                    </div>
                    <p>Need a unique look? Our designers can create a stunning, bespoke theme that reflects your brand identity and engages your audience.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="frontend-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-code-slash fs-2 me-3" style="color: var(--accent-color);"></i>
                        <h4 class="card-title mb-0">Plugin Development</h4>
                    </div>
                    <p>Extend the functionality of <?= $comp_detail->name ?> with custom plugins. If you have a specific feature in mind, we can build it for you.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="frontend-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-cloud-arrow-up-fill fs-2 me-3" style="color: var(--accent-color);"></i>
                        <h4 class="card-title mb-0">Content Migration</h4>
                    </div>
                    <p>Moving from another platform? We offer content migration services to seamlessly transfer your existing website to <?= $comp_detail->name ?>.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="frontend-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-graph-up-arrow fs-2 me-3" style="color: var(--accent-color);"></i>
                        <h4 class="card-title mb-0">SEO Optimization</h4>
                    </div>
                    <p>Improve your search engine rankings. We provide SEO audits and optimization services to help your content get discovered.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="frontend-card p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-headset fs-2 me-3" style="color: var(--accent-color);"></i>
                        <h4 class="card-title mb-0">Support & Maintenance</h4>
                    </div>
                    <p>Ongoing support packages to keep your <?= $comp_detail->name ?> instance running smoothly, updated, and secure. Peace of mind for your digital assets.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5 text-center">
        <div class="frontend-card p-4 p-md-5">
            <h3 class="card-title mb-3">Ready to Get Started?</h3>
            <p class="lead mb-4">Let us help you build something amazing with <?= $comp_detail->name ?>.</p>
            <a href="<?= ROOT . '/contact' ?>" class="btn frontend-btn-primary btn-lg">
                <i class="bi bi-chat-dots-fill me-2"></i>Contact Us Today
            </a>
        </div>
    </section>
</main>
<?php $this->view('inc/front-footer', $data) ?>