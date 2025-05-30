<nav class="sidebar-wrapper" id="sidebar">
  <div class="sidebar-heading text-center py-4 fs-4 fw-bold text-uppercase border-bottom">
    <a href="<?= ROOT . '/admin' ?>" id="admin_title"><i class="bi bi-shield-lock-fill me-2"></i>Admin</a>
  </div>
  <ul class="list-unstyled components">
    <li>
      <a href="<?= ROOT . '/admin' ?>" class="nav-link px-3">
        <i class="bi bi-speedometer2 me-2"></i>Dashboard
      </a>
    </li>
    <li>
      <a href="#pageSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link px-3">
        <i class="bi bi-file-earmark-post me-2"></i>Posts
      </a>
      <ul class="collapse list-unstyled" id="pageSubmenu">
        <li><a href="<?= ROOT . '/admin/posts' ?>" class="nav-link px-4"><small><i class="bi bi-list-ul me-2"></i>All Posts</small></a></li>
        <li><a href="<?= ROOT . '/admin/post/create' ?>" class="nav-link px-4"><small><i class="bi bi-plus-circle me-2"></i>Add New</small></a></li>
        <li><a href="<?= ROOT . '/admin/categories' ?>" class="nav-link px-4"><small><i class="bi bi-tags me-2"></i>Categories</small></a></li>
      </ul>
    </li>
    <li>
      <a href="#customerSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link px-3">
        <i class="bi bi-person-badge me-2"></i>Customers
      </a>
      <ul class="collapse list-unstyled" id="customerSubmenu">
        <li><a href="<?= ROOT . '/admin/customers' ?>" class="nav-link px-4"><small><i class="bi bi-list-ul me-2"></i>All Customers</small></a></li>
        <li><a href="<?= ROOT . '/admin/customers/new/null' ?>" class="nav-link px-4"><small><i class="bi bi-plus-circle me-2"></i>Add New Customer</small></a></li>
      </ul>
    </li>
    <li>
      <a href="<?= ROOT . '/admin/comments' ?>" class="nav-link px-3">
        <i class="bi bi-chat-dots me-2"></i>Comments
      </a>
    </li>
    <li>
      <a href="<?= ROOT . '/admin/users' ?>" class="nav-link px-3">
        <i class="bi bi-people me-2"></i>Users
      </a>
    </li>
    <li>
      <a href="#settingsSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link px-3">
        <i class="bi bi-gear me-2"></i>Settings
      </a>
      <ul class="collapse list-unstyled" id="settingsSubmenu">
        <li><a href="<?= ROOT ?>/admin/company" class="nav-link px-4"><small><i class="bi bi-list-ul me-2"></i>Company Details</small></a></li>
        <li><a href="<?= ROOT ?>/admin/social" class="nav-link px-4"><small><i class="bi bi-plus-circle me-2"></i>Social Links</small></a></li>
        <li><a href="<?= ROOT ?>/admin/hours" class="nav-link px-4"><small><i class="bi bi-plus-circle me-2"></i>Operating Hours</small></a></li>
      </ul>
    </li>
  </ul>
  <div class="sidebar-footer p-3 border-top">
    <a href="<?= ROOT ?>" class="btn btn-sm btn-outline-light w-100"><i class="bi bi-eye me-1"></i> View Site</a>
    <a href="<?= ROOT . '/logout' ?>" class="btn btn-sm btn-outline-warning w-100 mt-2"><i class="bi bi-box-arrow-left me-1"></i>Logout</a>
  </div>
</nav>