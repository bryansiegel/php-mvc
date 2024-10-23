<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>Users</h1>
    <a href="/create">Add User</a>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo $user['name']; ?> (<?php echo $user['email']; ?>)
                <a href="/show/<?php echo $user['id']; ?>">View</a>
                <a href="/edit/<?php echo $user['id']; ?>">Edit</a>
                <a href="/delete/<?php echo $user['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
