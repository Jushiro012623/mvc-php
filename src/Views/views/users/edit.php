<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | Edit</title>
</head>
<body>
    <form action="/users/<?= $user['id']?>" method="POST">
        <label for="name"><?= $user['name'] ?></label>
        <input type="text" id="name" name="name" placeholder="name" required>
        <input type="text" id="email" name="email" placeholder="email" required>
        <input type="submit" name="update_user">
    </form>
</body>
</html>