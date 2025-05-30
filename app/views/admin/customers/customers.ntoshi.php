  <?php $this->view('inc/admin-header', $data); ?>
  <div class="p-3 mt-2 mx-4 bg-body-tertiary shadow-sm rounded animated-card d-flex flex-column align-items-center text-center" style="--animation-order: 1;">
    <?php $this->view('inc/admin-welcome', $data); ?>
</div>

  <main class="container-fluid px-4">
      <div class="row my-4">
          <div class="col">
              <div class="d-flex justify-content-between align-items-center mb-3">
                  <h3 class="fs-4 page-title">Customer List</h3>
                  <a href="<?= ROOT . '/admin/customers/new' ?>" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Add New Customer</a>
              </div>
              <?= Util::displayFlash('cust_register_success', 'success') ?>
              <?= Util::displayFlash('cust_update_success', 'success') ?>
              <?= Util::displayFlash('cust_delete_success', 'success') ?>
              <div class="table-responsive bg-body-tertiary p-3 rounded shadow-sm animated-card" style="--animation-order: 1;">
                  <table class="table table-hover align-middle mb-0">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                              <th scope="col">City</th>
                              <th scope="col">Province</th>
                              <th scope="col">Status</th>
                              <th scope="col" class="text-end">Actions</th>
                          </tr>
                      </thead>
                      <tbody id="customer-table-body">
                          <?php $rowId = 1;
                            if (!empty($customers)): foreach ($customers as $customer): ?>
                                  <tr>
                                      <th scope="row"><?= $rowId++ ?></th>
                                      <td><img src="<?= get_image($customer->image) ?>" alt="Jane Doe" class="rounded-circle me-2" style="width:30px; height:30px; object-fit:cover;"><?= $customer->firstname . ' ' . $customer->surname ?></td>
                                      <td><?= $customer->email ?></td>
                                      <td><?= $customer->phone ?></td>
                                      <td><?= $customer->city ?></td>
                                      <td><?= $customer->province ?></td>
                                      <td><span class="badge bg-success"><?= $customer->status ?></span></td>
                                      <td class="text-end">
                                          <a href="<?= ROOT . "/admin/customers/profile/$customer->user_id" ?>" class="btn btn-sm btn-outline-info me-1" title="View Customer"><i class="bi bi-eye-fill"></i></a>
                                          <a href="<?= ROOT . "/admin/customers/edit/$customer->user_id" ?>" class="btn btn-sm btn-outline-warning me-1" title="Edit Customer"><i class="bi bi-pencil-square"></i></a>
                                          <a href="<?= ROOT . "/admin/customers/delete/$customer->user_id" ?>" class="btn btn-sm btn-outline-warning me-1" title="Delete Customer"><i class="bi bi-trash-fill"></i></a>

                                      </td>
                                  </tr>
                          <?php endforeach;
                            endif ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </main>

  <!-- ======= Footer ======= -->
  <?php $this->view('inc/admin-footer') ?>