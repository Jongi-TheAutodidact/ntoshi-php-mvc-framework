<?php $this->view('inc/admin-header', $data); ?>
<div class="p-3 mt-2 mx-4 bg-body-tertiary shadow-sm rounded animated-card d-flex flex-column align-items-center text-center" style="--animation-order: 1;">
    <?php $this->view('inc/admin-welcome', $data); ?>
</div>
<!-- Page Content -->
<main class="container-fluid px-4">
    <!-- Customer Profile and Quick Stats -->
    <div class="row g-4 my-3">
        <div class="col-lg-4 col-md-6">
            <div class="p-3 bg-body-tertiary shadow-sm rounded animated-card d-flex flex-column align-items-center text-center" style="--animation-order: 1;">
                <img src="<?= get_image($cust_profile->image) ?>" alt="<?= $cust_profile->firstname . ' Profile Image' ?>" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid var(--accent-color);">
                <h4 class="mb-1"><?= $cust_profile->firstname . ' ' . $cust_profile->surname ?></h4>
                <p class="text-muted mb-2"><?= $cust_profile->email ?></p>
                <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i><?= $cust_profile->phone ?></p>
                <p class="mb-1"><i class="bi bi-building me-2"></i>Acme Corp</p>
                <p class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i><?= $cust_profile->address ?></p>
                <span class="badge bg-success fs-6 my-2"><?= $cust_profile->status ?></span>
                <a href="add-customer.html?id=1" class="btn btn-sm btn-outline-primary mt-2 w-100"><i class="bi bi-pencil-square me-2"></i>Edit Profile</a>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-between align-items-center rounded animated-card" style="--animation-order: 2;">
                        <div>
                            <p class="fs-5 mb-1">Customer Date</p>
                            <h3 class="fs-4"><?= Util::ntoshiDate($cust_profile->date_created) ?></h3>
                        </div>
                        <i class="bi bi-calendar-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-between align-items-center rounded animated-card" style="--animation-order: 3;">
                        <div>
                            <p class="fs-5 mb-1">Total Orders</p>
                            <h3 class="fs-4">25</h3>
                        </div>
                        <i class="bi bi-cart-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-between align-items-center rounded animated-card" style="--animation-order: 4;">
                        <div>
                            <p class="fs-5 mb-1">Total Spent</p>
                            <h3 class="fs-4">$1,250.75</h3>
                        </div>
                        <i class="bi bi-cash-coin fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="p-3 bg-body-tertiary shadow-sm d-flex justify-content-between align-items-center rounded animated-card" style="--animation-order: 5;">
                        <div>
                            <p class="fs-5 mb-1">Last Activity</p>
                            <h3 class="fs-4">Jul 20, 2024</h3>
                        </div>
                        <i class="bi bi-clock-history fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs for Orders, Invoices, Payments -->
    <div class="row my-4">
        <div class="col">
            <div class="bg-body-tertiary p-3 p-md-4 rounded shadow-sm animated-card" style="--animation-order: 6;">
                <ul class="nav nav-tabs nav-pills flex-column flex-sm-row" id="customerTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active w-100" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders-tab-pane" type="button" role="tab" aria-controls="orders-tab-pane" aria-selected="true"><i class="bi bi-box-seam-fill me-2"></i>Orders</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link w-100" id="invoices-tab" data-bs-toggle="tab" data-bs-target="#invoices-tab-pane" type="button" role="tab" aria-controls="invoices-tab-pane" aria-selected="false"><i class="bi bi-receipt-cutoff me-2"></i>Invoices</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link w-100" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments-tab-pane" type="button" role="tab" aria-controls="payments-tab-pane" aria-selected="false"><i class="bi bi-credit-card-2-front-fill me-2"></i>Payments</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link w-100" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes-tab-pane" type="button" role="tab" aria-controls="notes-tab-pane" aria-selected="false"><i class="bi bi-journal-text me-2"></i>Notes & Activity</button>
                    </li>
                </ul>
                <div class="tab-content pt-3" id="customerTabsContent">
                    <div class="tab-pane fade show active" id="orders-tab-pane" role="tabpanel" aria-labelledby="orders-tab" tabindex="0">
                        <h4 class="mb-3">Order History</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#ORD1024</td>
                                        <td>2024-07-01</td>
                                        <td>$150.00</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-fill"></i> View</button></td>
                                    </tr>
                                    <tr>
                                        <td>#ORD1025</td>
                                        <td>2024-07-15</td>
                                        <td>$75.50</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary"><i class="bi bi-eye-fill"></i> View</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="invoices-tab-pane" role="tabpanel" aria-labelledby="invoices-tab" tabindex="0">
                        <h4 class="mb-3">Invoice Records</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>INV-001</td>
                                        <td>2024-07-01</td>
                                        <td>$150.00</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary"><i class="bi bi-printer-fill me-1"></i> Print</button></td>
                                    </tr>
                                    <tr>
                                        <td>INV-002</td>
                                        <td>2024-07-15</td>
                                        <td>$75.50</td>
                                        <td><span class="badge bg-danger">Unpaid</span></td>
                                        <td><button class="btn btn-sm btn-outline-primary"><i class="bi bi-printer-fill me-1"></i> Print</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payments-tab-pane" role="tabpanel" aria-labelledby="payments-tab" tabindex="0">
                        <h4 class="mb-3">Payment History</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Payment ID</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PAY-001A</td>
                                        <td>2024-07-01</td>
                                        <td>$150.00</td>
                                        <td>Credit Card</td>
                                        <td><span class="badge bg-success">Succeeded</span></td>
                                    </tr>
                                    <tr>
                                        <td>PAY-002B</td>
                                        <td>2024-07-18</td>
                                        <td>$75.50</td>
                                        <td>PayPal</td>
                                        <td><span class="badge bg-info">Processing</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="notes-tab-pane" role="tabpanel" aria-labelledby="notes-tab" tabindex="0">
                        <h4 class="mb-3">Notes & Activity Log</h4>
                        <textarea class="form-control mb-3" rows="4" placeholder="Add a new note..."></textarea>
                        <button class="btn btn-primary mb-3"><i class="bi bi-plus-lg me-1"></i> Add Note</button>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Support Call - Jul 20, 2024</strong>
                                <p class="mb-0 small text-muted">Discussed issue with product X. Resolved.</p>
                            </li>
                            <li class="list-group-item">
                                <strong>Onboarding - Jan 15, 2023</strong>
                                <p class="mb-0 small text-muted">Customer successfully onboarded. Sent welcome email.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->view('inc/admin-footer', $data); ?>