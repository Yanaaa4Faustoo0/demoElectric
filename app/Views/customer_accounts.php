<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>

.accounts-section {
    background: #f8fafc;
    min-height: 80vh;
    padding: 50px 0;
}

.accounts-container {
    background: #ffffff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

/* Header */

.accounts-header h1 {
    color: #2850b5;
    font-weight: 700;
    margin-bottom: 5px;
}

.accounts-header p {
    color: #777;
    margin-bottom: 30px;
}

/* Statistics */

.stats-card {
    border-radius: 15px;
    padding: 20px;
    color: white;
    margin-bottom: 20px;
}

.stats-card h2 {
    font-size: 30px;
    margin-bottom: 5px;
}

.stats-card p {
    margin: 0;
}

.card-total {
    background: #2850b5;
}

.card-active {
    background: #10b981;
}

.card-inactive {
    background: #dc3545;
}

.card-suspended {
    background: #f59e0b;
    color: #222;
}

/* Search */

.search-box {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 25px;
}

/* Table */

.table thead th {
    white-space: nowrap;
}

.table tbody td {
    vertical-align: middle;
}

/* Pagination */

.pagination-card {
    margin-top: 35px;
    background: #ffffff;

    border-radius: 0 0 24px 24px;

    padding: 25px 30px;

    min-height: 100px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border-top: 1px solid #eeeeee;

    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
}

.pagination-info {
    color: #111827;
    font-size: 17px;
}

.pagination-numbers {
    display: flex;
    align-items: center;
    gap: 12px;
}

.pagination-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 32px;
    height: 32px;

    color: #2563eb;

    text-decoration: none;

    font-size: 17px;

    border-radius: 6px;
}

.pagination-number:hover {
    background: #f1f5f9;
}

.pagination-number.active {
    color: #111827;
    font-weight: 700;
}

/* Mobile */

@media (max-width: 768px) {

    .pagination-card {
        flex-direction: column;
        gap: 20px;
        align-items: flex-start;
    }

}

</style>


<section class="accounts-section">

    <div class="container">

        <div class="accounts-container">

            <!-- Header -->

            <div class="accounts-header">

                <h1>
                    Customer Accounts
                </h1>

                <p>
                    Puihaha Electric Customer Account Management
                </p>

            </div>


            <!-- Statistics -->

            <div class="row">

                <div class="col-md-3">

                    <div class="stats-card card-total">

                        <h2>
                            <?= esc($total_accounts) ?>
                        </h2>

                        <p>
                            Total Accounts
                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="stats-card card-active">

                        <h2>
                            <?= esc($active_accounts) ?>
                        </h2>

                        <p>
                            Active
                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="stats-card card-inactive">

                        <h2>
                            <?= esc($inactive_accounts) ?>
                        </h2>

                        <p>
                            Inactive
                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="stats-card card-suspended">

                        <h2>
                            <?= esc($suspended_accounts) ?>
                        </h2>

                        <p>
                            Suspended
                        </p>

                    </div>

                </div>

            </div>


            <!-- Search -->

            <div class="search-box">

                <form
                    method="GET"
                    action="<?= base_url('accounts') ?>"
                >

                    <div class="row g-3">

                        <!-- Search -->

                        <div class="col-md-4">

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Search customer..."
                                value="<?= esc($search_keyword ?? '') ?>"
                            >

                        </div>


                        <!-- Status -->

                        <div class="col-md-3">

                            <select
                                name="status"
                                class="form-select"
                            >

                                <option value="">
                                    All Status
                                </option>

                                <option
                                    value="active"
                                    <?= ($filter_status ?? '') === 'active'
                                        ? 'selected'
                                        : '' ?>
                                >
                                    Active
                                </option>

                                <option
                                    value="inactive"
                                    <?= ($filter_status ?? '') === 'inactive'
                                        ? 'selected'
                                        : '' ?>
                                >
                                    Inactive
                                </option>

                                <option
                                    value="suspended"
                                    <?= ($filter_status ?? '') === 'suspended'
                                        ? 'selected'
                                        : '' ?>
                                >
                                    Suspended
                                </option>

                            </select>

                        </div>


                        <!-- Type -->

                        <div class="col-md-3">

                            <select
                                name="type"
                                class="form-select"
                            >

                                <option value="">
                                    All Types
                                </option>

                                <option
                                    value="residential"
                                    <?= ($filter_type ?? '') === 'residential'
                                        ? 'selected'
                                        : '' ?>
                                >
                                    Residential
                                </option>

                                <option
                                    value="commercial"
                                    <?= ($filter_type ?? '') === 'commercial'
                                        ? 'selected'
                                        : '' ?>
                                >
                                    Commercial
                                </option>

                                <option
                                    value="industrial"
                                    <?= ($filter_type ?? '') === 'industrial'
                                        ? 'selected'
                                        : '' ?>
                                >
                                    Industrial
                                </option>

                            </select>

                        </div>


                        <!-- Search button -->

                        <div class="col-md-2">

                            <button
                                type="submit"
                                class="btn btn-primary w-100"
                            >
                                Search
                            </button>

                        </div>

                    </div>

                </form>


                <!-- Clear -->

                <?php if (
                    $search_keyword ||
                    $filter_status ||
                    $filter_type
                ): ?>

                    <div class="mt-3">

                        <a
                            href="<?= base_url('accounts') ?>"
                            class="btn btn-secondary btn-sm"
                        >
                            Clear Filters
                        </a>

                    </div>

                <?php endif; ?>

            </div>


            <!-- Customer Table -->

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>
                                Account Number
                            </th>

                            <th>
                                Customer Name
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Type
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (empty($accounts)): ?>

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center text-muted py-4"
                                >
                                    No customer accounts found.
                                </td>

                            </tr>

                        <?php else: ?>

                            <?php foreach ($accounts as $account): ?>

                                <tr>

                                    <td>
                                        <strong>
                                            <?= esc(
                                                $account['account_number']
                                            ) ?>
                                        </strong>
                                    </td>


                                    <td>
                                        <?= esc(
                                            $account['customer_name']
                                        ) ?>
                                    </td>


                                    <td>
                                        <?= esc(
                                            $account['email']
                                        ) ?>
                                    </td>


                                    <td>
                                        <?= esc(
                                            $account['phone']
                                        ) ?>
                                    </td>


                                    <td>

                                        <span class="badge bg-info text-dark">

                                            <?= ucfirst(
                                                esc(
                                                    $account['connection_type']
                                                )
                                            ) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <?php

                                            $statusClass =
                                                match (
                                                    $account['status']
                                                ) {
                                                    'active' =>
                                                        'bg-success',

                                                    'inactive' =>
                                                        'bg-danger',

                                                    'suspended' =>
                                                        'bg-warning text-dark',

                                                    default =>
                                                        'bg-secondary'
                                                };

                                        ?>

                                        <span
                                            class="badge <?= $statusClass ?>"
                                        >

                                            <?= ucfirst(
                                                esc(
                                                    $account['status']
                                                )
                                            ) ?>

                                        </span>

                                    </td>


                                    <td>

                                        <a
                                            href="<?= base_url(
                                                'account/' .
                                                $account['id']
                                            ) ?>"
                                            class="btn btn-sm btn-outline-primary"
                                        >
                                            View
                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>


            <!-- Pagination -->

            <?php if ($pager): ?>

                <?php

                    $totalPages =
                        $pager->getPageCount();

                    $currentPage =
                        (int) ($current_page ?? 1);

                ?>

                <div class="pagination-card">

                    <div class="pagination-info">

                        Page
                        <?= $currentPage ?>
                        of
                        <?= $totalPages ?>

                    </div>


                    <div class="pagination-numbers">

                        <?php
                        for (
                            $page = 1;
                            $page <= $totalPages;
                            $page++
                        ):
                        ?>

                            <?php

                                $query = http_build_query([
                                    'page' => $page,
                                    'search' =>
                                        $search_keyword ?? '',
                                    'status' =>
                                        $filter_status ?? '',
                                    'type' =>
                                        $filter_type ?? ''
                                ]);

                            ?>

                            <a
                                href="<?= base_url(
                                    'accounts?' . $query
                                ) ?>"
                                class="pagination-number
                                <?= $page === $currentPage
                                    ? 'active'
                                    : '' ?>"
                            >
                                <?= $page ?>
                            </a>

                        <?php endfor; ?>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>


<?= $this->endSection() ?>