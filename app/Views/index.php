<!DOCTYPE html>
<html>
<head>
    <title>Management System</title>
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

        <h1>Today's Tasks</h1>
        <p class="subtitle">Tasks scheduled for today.</p>

        <table>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>
            </tr>

            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>

                    <td>
                        <span class="badge">
                            <?= esc($task['status']) ?>
                        </span>
                    </td>

                    <td><?= esc($task['task_date']) ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>

</div>

</body>
</html>