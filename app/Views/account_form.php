<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<section class="section-padding bg-light-custom">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">

                        <h1 class="text-primary-custom mb-4">
                            <?= $mode === 'edit'
                                ? 'Edit Customer Account'
                                : 'Add Customer Account'
                            ?>
                        </h1>

                        <?php if (session('errors')): ?>

                            <div class="alert alert-danger">

                                <?php foreach (session('errors') as $error): ?>

                                    <div>
                                        <?= esc($error) ?>
                                    </div>

                                <?php endforeach; ?>

                            </div>

                        <?php endif; ?>

                        <?php
                        $action = $mode === 'edit'
                            ? base_url('accounts/update/' . $account['id'])
                            : base_url('accounts/store');
                        ?>

                        <form method="POST" action="<?= $action ?>">

                            <?= csrf_field() ?>

                            <div class="row g-3">

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Account Number
                                    </label>

                                    <input
                                        type="text"
                                        name="account_number"
                                        class="form-control"
                                        value="<?= old(
                                            'account_number',
                                            $account['account_number'] ?? ''
                                        ) ?>"
                                        required
                                    >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Customer Name
                                    </label>

                                    <input
                                        type="text"
                                        name="customer_name"
                                        class="form-control"
                                        value="<?= old(
                                            'customer_name',
                                            $account['customer_name'] ?? ''
                                        ) ?>"
                                        required
                                    >

                                </div>

                                <div class="col-12">

                                    <label class="form-label">
                                        Address
                                    </label>

                                    <textarea
                                        name="address"
                                        class="form-control"
                                        rows="3"
                                        required
                                    ><?= old(
                                        'address',
                                        $account['address'] ?? ''
                                    ) ?></textarea>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        value="<?= old(
                                            'phone',
                                            $account['phone'] ?? ''
                                        ) ?>"
                                    >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="<?= old(
                                            'email',
                                            $account['email'] ?? ''
                                        ) ?>"
                                    >

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Meter Number
                                    </label>

                                    <input
                                        type="text"
                                        name="meter_number"
                                        class="form-control"
                                        value="<?= old(
                                            'meter_number',
                                            $account['meter_number'] ?? ''
                                        ) ?>"
                                    >

                                </div>

                                <div class="col-md-3">

                                    <label class="form-label">
                                        Connection Type
                                    </label>

                                    <select
                                        name="connection_type"
                                        class="form-select"
                                        required
                                    >

                                        <?php
                                        $selectedType =
                                            old(
                                                'connection_type',
                                                $account['connection_type'] ?? 'residential'
                                            );
                                        ?>

                                        <option
                                            value="residential"
                                            <?= $selectedType === 'residential'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Residential
                                        </option>

                                        <option
                                            value="commercial"
                                            <?= $selectedType === 'commercial'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Commercial
                                        </option>

                                        <option
                                            value="industrial"
                                            <?= $selectedType === 'industrial'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Industrial
                                        </option>

                                    </select>

                                </div>

                                <div class="col-md-3">

                                    <label class="form-label">
                                        Status
                                    </label>

                                    <?php
                                    $selectedStatus =
                                        old(
                                            'status',
                                            $account['status'] ?? 'active'
                                        );
                                    ?>

                                    <select
                                        name="status"
                                        class="form-select"
                                        required
                                    >

                                        <option
                                            value="active"
                                            <?= $selectedStatus === 'active'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Active
                                        </option>

                                        <option
                                            value="inactive"
                                            <?= $selectedStatus === 'inactive'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Inactive
                                        </option>

                                        <option
                                            value="suspended"
                                            <?= $selectedStatus === 'suspended'
                                                ? 'selected'
                                                : '' ?>
                                        >
                                            Suspended
                                        </option>

                                    </select>

                                </div>

                                <div class="col-12 mt-4">

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <?= $mode === 'edit'
                                            ? 'Update Account'
                                            : 'Add Account'
                                        ?>
                                    </button>

                                    <a
                                        href="<?= base_url('accounts') ?>"
                                        class="btn btn-secondary"
                                    >
                                        Cancel
                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?= $this->endSection() ?>

