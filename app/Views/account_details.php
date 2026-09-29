<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>

.customer-details-section {
    background: #f6f8fb;
    min-height: 80vh;
    padding: 50px 0;
}

.customer-details-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 35px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.customer-header {
    border-bottom: 1px solid #eeeeee;
    padding-bottom: 25px;
    margin-bottom: 30px;
}

.customer-header h1 {
    color: #2850b5;
    font-weight: 700;
    margin-bottom: 8px;
}

.account-number {
    color: #777;
    font-size: 16px;
}

.detail-label {
    color: #777;
    font-size: 14px;
    margin-bottom: 5px;
}

.detail-value {
    color: #222;
    font-size: 17px;
    font-weight: 500;
}

.detail-box {
    background: #f8f9fa;
    border-radius: 12px;
    padding: 18px;
    height: 100%;
}

.status-badge {
    display: inline-block;
    padding: 7px 14px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

.status-active {
    background: #d1fae5;
    color: #047857;
}

.status-inactive {
    background: #fee2e2;
    color: #b91c1c;
}

.status-suspended {
    background: #fef3c7;
    color: #92400e;
}

.connection-badge {
    display: inline-block;
    padding: 7px 14px;
    border-radius: 20px;
    background: #dbeafe;
    color: #1d4ed8;
    font-size: 14px;
    font-weight: 600;
}

.back-button {
    margin-top: 30px;
}

</style>


<section class="customer-details-section">

    <div class="container">

        <div class="customer-details-card">

            <!-- Header -->

            <div class="customer-header">

                <h1>
                    Customer Details
                </h1>

                <div class="account-number">
                    Account Number:
                    <strong>
                        <?= esc($account['account_number']) ?>
                    </strong>
                </div>

            </div>


            <!-- Customer Information -->

            <div class="row g-4">


                <!-- Customer Name -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Customer Name
                        </div>

                        <div class="detail-value">
                            <?= esc($account['customer_name']) ?>
                        </div>

                    </div>

                </div>


                <!-- Status -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Status
                        </div>

                        <div class="detail-value">

                            <?php if ($account['status'] === 'active'): ?>

                                <span class="status-badge status-active">
                                    Active
                                </span>

                            <?php elseif ($account['status'] === 'inactive'): ?>

                                <span class="status-badge status-inactive">
                                    Inactive
                                </span>

                            <?php else: ?>

                                <span class="status-badge status-suspended">
                                    Suspended
                                </span>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>


                <!-- Address -->

                <div class="col-12">

                    <div class="detail-box">

                        <div class="detail-label">
                            Address
                        </div>

                        <div class="detail-value">
                            <?= esc($account['address']) ?>
                        </div>

                    </div>

                </div>


                <!-- Phone -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Phone
                        </div>

                        <div class="detail-value">
                            <?= esc($account['phone']) ?>
                        </div>

                    </div>

                </div>


                <!-- Email -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Email
                        </div>

                        <div class="detail-value">
                            <?= esc($account['email']) ?>
                        </div>

                    </div>

                </div>


                <!-- Meter Number -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Meter Number
                        </div>

                        <div class="detail-value">
                            <?= esc($account['meter_number']) ?>
                        </div>

                    </div>

                </div>


                <!-- Connection Type -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Connection Type
                        </div>

                        <div class="detail-value">

                            <span class="connection-badge">

                                <?= ucfirst(
                                    esc($account['connection_type'])
                                ) ?>

                            </span>

                        </div>

                    </div>

                </div>


                <!-- Created -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Account Created
                        </div>

                        <div class="detail-value">
                            <?= esc($account['created_at']) ?>
                        </div>

                    </div>

                </div>


                <!-- Updated -->

                <div class="col-md-6">

                    <div class="detail-box">

                        <div class="detail-label">
                            Last Updated
                        </div>

                        <div class="detail-value">
                            <?= esc($account['updated_at']) ?>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Back Button -->

            <div class="back-button">

                <a
                    href="<?= base_url('accounts') ?>"
                    class="btn btn-outline-primary"
                >
                    ← Back to Customer Accounts
                </a>

            </div>

        </div>

    </div>

</section>

<?= $this->endSection() ?>
