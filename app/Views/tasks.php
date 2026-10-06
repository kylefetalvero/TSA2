<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
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

        <h1>Task List</h1>
        <p class="subtitle">View all tasks in the management system.</p>

        <?php if (session()->get('logged_in')): ?>
            <div class="task-actions">
                <a href="<?= site_url('tasks/new') ?>" class="btn btn-add">
                + Add New Task
                </a>
            </div>
        <?php endif; ?>

        <table>
            <tr>
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>

                <?php if (session()->get('logged_in')): ?>
                    <th>Actions</th>
                <?php endif; ?>
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

                    <?php if (session()->get('logged_in')): ?>
                        <td>
                            <a href="<?= site_url('tasks/edit/' . $task['id']) ?>" class="btn btn-edit">
                                Edit
                            </a>

                            <form
                                action="<?= site_url('tasks/delete/' . $task['id']) ?>"
                                method="post"
                                class="action-form"
                            >
                                <?= csrf_field() ?>

                                <button type="submit"
                                    onclick="return confirm('Archive this task?')">
                                    Archive
                                </button>
                            </form>
                        </td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; ?>

        </table>

    </div>

</div>

</body>
</html>