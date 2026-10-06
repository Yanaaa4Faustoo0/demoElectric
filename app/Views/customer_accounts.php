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




.accounts-header {
    margin-bottom: 30px;
}

.accounts-header h1 {
    color: #2850b5;
    font-weight: 700;
    margin-bottom: 5px;
}

.accounts-header p {
    color: #777;
    margin-bottom: 0;
}




.add-account-button {
    background: #f6a000;
    border: none;
    color: white;
    border-radius: 25px;
    padding: 10px 20px;
    font-weight: 600;
}

.add-account-button:hover {
    background: #df8e00;
    color: white;
}




.stats-card {
    color: white;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
}

.stats-card h2 {
    margin: 0;
    font-size: 30px;
    font-weight: 700;
}

.stats-card p {
    margin: 5px 0 0;
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




.search-box {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 25px;
}


/* =========================
   TABLE
   ========================= */

.table-container {
    overflow-x: auto;
}

.table thead th {
    white-space: nowrap;
}

.table tbody td {
    vertical-align: middle;
}

.customer-row {
    cursor: default;
}

.customer-row:hover {
    background-color: #f8fafc;
}




.pagination-card {
    margin-top: 35px;
    background: #ffffff;

    border-radius: 0 0 24px 24px;

    min-height: 110px;

    padding: 30px 32px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    border-top: 1px solid #eeeeee;

    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
}

.pagination-info {
    font-size: 18px;
    color: #111827;
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

    padding: 0 6px;

    font-size: 18px;

    text-decoration: none;

    color: #2563eb;

    background: transparent;

    border-radius: 6px;
}

.pagination-number:hover {
    background: #f1f5f9;
    color: #1d4ed8;
}

.pagination-number.active {
    color: #111827;
    font-weight: 700;
}




.customer-context-menu {
    position: fixed;

    display: none;

    min-width: 190px;

    background: #ffffff;

    border-radius: 10px;

    padding: 6px 0;

    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);

    border: 1px solid #eeeeee;

    z-index: 9999;
}

.customer-context-menu a,
.customer-context-menu button {
    display: block;

    width: 100%;

    padding: 10px 15px;

    border: none;

    background: transparent;

    text-align: left;

    text-decoration: none;

    color: #222;

    font-size: 14px;

    cursor: pointer;
}

.customer-context-menu a:hover,
.customer-context-menu button:hover {
    background: #f3f4f6;
}

.customer-context-menu .delete-item {
    color: #dc3545;
}




@media (max-width: 768px) {

    .accounts-header {
        flex-direction: column;
        align-items: flex-start !important;
    }

    .pagination-card {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }

}

</style>


<section class="accounts-section">

    <div class="container">

        <div class="accounts-container">


          

            <div class="accounts-header d-flex justify-content-between align-items-center">

                <div>

                    <h1>
                        Customer Accounts
                    </h1>

                    <p>
                        Puihaha Electric Customer Account Management
                    </p>

                </div>


                <a
                    href="<?= base_url('accounts/create') ?>"
                    class="btn add-account-button"
                >
                    + Add Account
                </a>

            </div>


         

            <?php if (session()->getFlashdata('success')): ?>

                <div class="alert alert-success alert-dismissible fade show">

                    <?= esc(session()->getFlashdata('success')) ?>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            <?php endif; ?>


            

            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert-danger alert-dismissible fade show">

                    <?= esc(session()->getFlashdata('error')) ?>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                    ></button>

                </div>

            <?php endif; ?>


            

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


                        <!-- Connection Type -->

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


            

            <div class="table-container">

                <table class="table table-hover align-middle">

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
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (empty($accounts)): ?>

                        <tr>

                            <td
                                colspan="7"
                                class="text-center text-muted py-5"
                            >
                                No customer accounts found.
                            </td>

                        </tr>

                    <?php else: ?>


                        <?php foreach ($accounts as $account): ?>

                            <tr
                                class="customer-row"
                                data-id="<?= esc($account['id']) ?>"
                                data-name="<?= esc($account['customer_name']) ?>"
                            >


                                

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

                                    $statusClass = match (
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


                                   

                                    <a
                                        href="<?= base_url(
                                            'accounts/edit/' .
                                            $account['id']
                                        ) ?>"
                                        class="btn btn-sm btn-outline-warning"
                                    >
                                        Edit
                                    </a>


                                   

                                    <form
                                        method="POST"
                                        action="<?= base_url(
                                            'accounts/delete/' .
                                            $account['id']
                                        ) ?>"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this customer account?');"
                                    >

                                        <?= csrf_field() ?>

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >
                                            Delete
                                        </button>

                                    </form>


                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

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
                                class="pagination-number <?= $page === $currentPage
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


<div
    id="customerContextMenu"
    class="customer-context-menu"
>

    <a
        id="contextView"
        href="#"
    >
        View Customer
    </a>


    <a
        id="contextEdit"
        href="#"
    >
        Edit Customer
    </a>


    <button
        type="button"
        id="contextDelete"
        class="delete-item"
    >
        Delete Customer
    </button>

</div>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const menu =
            document.getElementById(
                'customerContextMenu'
            );

        const viewLink =
            document.getElementById(
                'contextView'
            );

        const editLink =
            document.getElementById(
                'contextEdit'
            );

        const deleteButton =
            document.getElementById(
                'contextDelete'
            );

        let selectedId = null;



        document
            .querySelectorAll('.customer-row')
            .forEach(function (row) {

                row.addEventListener(
                    'contextmenu',
                    function (event) {

                        event.preventDefault();


                        selectedId =
                            row.dataset.id;


                        

                        viewLink.href =
                            '<?= base_url('account/') ?>'
                            + selectedId;


                        

                        editLink.href =
                            '<?= base_url('accounts/edit/') ?>'
                            + selectedId;


                        menu.style.display =
                            'block';



                        let left =
                            event.clientX;

                        let top =
                            event.clientY;


                        const menuWidth =
                            menu.offsetWidth;

                        const menuHeight =
                            menu.offsetHeight;


                        if (
                            left + menuWidth >
                            window.innerWidth
                        ) {

                            left =
                                window.innerWidth -
                                menuWidth -
                                10;

                        }


                        if (
                            top + menuHeight >
                            window.innerHeight
                        ) {

                            top =
                                window.innerHeight -
                                menuHeight -
                                10;

                        }


                        menu.style.left =
                            left + 'px';

                        menu.style.top =
                            top + 'px';

                    }
                );

            });


        /*
        |--------------------------------------------------------------------------
        | Delete from context menu
        |--------------------------------------------------------------------------
        */

        deleteButton.addEventListener(
            'click',
            function () {

                if (!selectedId) {
                    return;
                }


                const confirmDelete =
                    confirm(
                        'Are you sure you want to delete this customer account?'
                    );


                if (!confirmDelete) {
                    return;
                }


                const form =
                    document.createElement(
                        'form'
                    );


                form.method = 'POST';


                form.action =
                    '<?= base_url('accounts/delete/') ?>'
                    + selectedId;


                /*
                | CSRF token
                */

                const csrfInput =
                    document.createElement(
                        'input'
                    );


                csrfInput.type =
                    'hidden';


                csrfInput.name =
                    '<?= csrf_token() ?>';


                csrfInput.value =
                    '<?= csrf_hash() ?>';


                form.appendChild(
                    csrfInput
                );


                document.body.appendChild(
                    form
                );


                form.submit();

            }
        );

        document.addEventListener(
            'click',
            function (event) {

                if (
                    !menu.contains(event.target)
                ) {

                    menu.style.display =
                        'none';

                }

            }
        );


        window.addEventListener(
            'scroll',
            function () {

                menu.style.display =
                    'none';

            }
        );

    }
);

</script>

<?= $this->endSection() ?>
