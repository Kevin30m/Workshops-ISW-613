<?php require_once __DIR__ . '/../../inc/header.php'; ?>

<div class="container-fluid">

    <div class="jumbotron">
        <h1 class="display-4">Users</h1>
        <p class="lead">Users list</p>
        <hr class="my-4">
    </div>

    <table class="table">

        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Province</th>
            <th>Created at</th>
        </tr>

        <?php foreach ($users as $user): ?>

            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['province_name'] ?? 'Not set'; ?></td>
                <td><?php echo $user['created_at']; ?></td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>

<?php require_once __DIR__ . '/../../inc/footer.php'; ?>