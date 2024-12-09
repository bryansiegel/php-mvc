<?php include('config/urls.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>View User</title>
</head>
<body>
    <h1><?php echo $user['name']; ?></h1>
    <p>Email: <?php echo $user['email']; ?></p>
    <a href="<?php echo $baseDir; ?>">Back to list</a>
</body>
</html>
