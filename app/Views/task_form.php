<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
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

        <h1>Add New Task</h1>
        <p class="subtitle">Create a new task for the management system.</p>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="error-message">
                <?= session()->getFlashdata('errors') ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('tasks/create') ?>" method="post">

            <?= csrf_field() ?>

            <div class="form-group">
                <label for="title">Task Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="<?= old('title') ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="task_date">Task Date</label>
                <input
                    type="date"
                    name="task_date"
                    id="task_date"
                    value="<?= old('task_date') ?>"
                    required
                >
            </div>

            <div class="task-form-actions">
                <button type="submit" class="btn-submit">
                Create Task
                </button>
            </div>

        </form>

<a href="<?= site_url('tasks') ?>" class="btn-back">
    ← Back to Tasks
</a>

    </div>

</div>

</body>
</html>s