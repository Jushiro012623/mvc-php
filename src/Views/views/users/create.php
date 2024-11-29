<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <form action="/users" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <input type="text" id="password" name="password" required>
        <input type="text" id="email" name="email" required>
        <input type="submit" name="create_user">
    </form>
</body>
</html>