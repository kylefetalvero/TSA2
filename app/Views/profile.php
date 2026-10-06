<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
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

    <?php if (session()->get('logged_in')): ?>
        <a href="/logout">Logout</a>
    <?php else: ?>
        <a href="/login">Login</a>
    <?php endif; ?>
</div>
</nav>

<div class="container">

    <div class="card">

        <h1>My Profile</h1>
        <p class="subtitle">User account information.</p>

        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>

        <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>

        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>

    </div>

</div>

</body>
</html>