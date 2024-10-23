<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create New User</h1>
    <form method="POST" action="/create">
        <label>Name: </label>
        <input type="text" name="name" required>
        <br>
        <label>Email: </label>
        <input type="email" name="email" required>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
