<?php include('config/urls.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>Users</h1>
    <a href="<?php echo $baseDir; ?>/create">Add User</a>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo $user['name']; ?> (<?php echo $user['email']; ?>)
                <a href="<?php echo $baseDir; ?>/show/<?php echo $user['id']; ?>">View</a>
                <a href="<?php echo $baseDir; ?>/edit/<?php echo $user['id']; ?>">Edit</a>
                <a href="<?php echo $baseDir; ?>/delete/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
