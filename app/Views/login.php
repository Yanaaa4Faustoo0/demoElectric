<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<style>

.login-page {
    min-height: 75vh;
    background: #f6f8fb;

    display: flex;
    justify-content: center;
    align-items: center;

    padding: 60px 20px;
}

.login-card {
    width: 100%;
    max-width: 450px;

    background: white;
    padding: 40px;

    border-radius: 20px;

    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.login-title {
    text-align: center;
    color: #2850b5;
    font-weight: 700;
    margin-bottom: 8px;
}

.login-subtitle {
    text-align: center;
    color: #777;
    margin-bottom: 30px;
}

.login-label {
    font-weight: 600;
    margin-bottom: 8px;
}

.login-button {
    width: 100%;

    background: #f6a000;
    color: white;

    border: none;
    border-radius: 30px;

    padding: 12px;

    font-weight: 600;

    margin-top: 10px;
}

.login-button:hover {
    background: #df8e00;
}

.login-register {
    text-align: center;
    margin-top: 25px;
    color: #777;
}

.login-register a {
    color: #2563eb;
    text-decoration: none;
    font-weight: 600;
}

</style>


<section class="login-page">

    <div class="login-card">

        <div class="text-center mb-3" style="font-size: 45px;">
            ⚡
        </div>

        <h2 class="login-title">
            Login
        </h2>

        <p class="login-subtitle">
            Login to your Puihaha Electric account
        </p>


        <?php if (!empty($error)): ?>

            <div class="alert alert-danger">
                <?= esc($error) ?>
            </div>

        <?php endif; ?>


        <?php if (!empty($success)): ?>

            <div class="alert alert-success">
                <?= esc($success) ?>
            </div>

        <?php endif; ?>


        <form
            method="POST"
            action="<?= base_url('login') ?>"
        >

            <?= csrf_field() ?>


            <div class="mb-3">

                <label
                    for="email"
                    class="form-label login-label"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    placeholder="Enter your email"
                    value="<?= old('email') ?>"
                    required
                >

            </div>


            <div class="mb-3">

                <label
                    for="password"
                    class="form-label login-label"
                >
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <button
                type="submit"
                class="login-button"
            >
                Login
            </button>

        </form>


        <div class="login-register">

            Don't have an account?

            <a href="<?= base_url('register') ?>">
                Register
            </a>

        </div>

    </div>

</section>

<?= $this->endSection() ?>