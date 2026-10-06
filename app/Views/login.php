<!DOCTYPE html>
<html>
<head>
    <title>Login - Management System</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

<nav class="navbar">
    <h2>Management System</h2>

    <div>
        <a href="/">Home</a>
        <a href="/tasks">Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </div>
</nav>

<div class="container">

    <div class="card login-card">

        <h1>Login</h1>
        <p class="subtitle">Sign in to manage your tasks.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">

            <?= csrf_field() ?>

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    name="username"
                    id="username"
                    value="<?= old('username') ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                >
            </div>

            <div class="task-form-actions">
                <button type="submit" class="btn-submit">
                    Login
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>