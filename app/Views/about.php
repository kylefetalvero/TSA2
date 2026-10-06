<!DOCTYPE html>
<html>
<head>
    <title>About</title>
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

        <h1>About the System</h1>
        <p class="subtitle">Tasks for Today Management System</p>

        <p>
            This system was developed using CodeIgniter 4
            and MySQL.
        </p>

        <br>

        <p>
            <strong>Developed by:</strong> Sean Kyle Fetalvero
        </p>

    </div>

</div>

</body>
</html>