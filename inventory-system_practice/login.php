<?php 

if(isset($_POST['submit'])){
    include 'classes/users.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersData = new users();

    $usersData->loginUser($username, $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- <h1>Login Succesfully!</h1> -->
    <form action="" method="POST">
        <input type="text" name="username" required>
        <input type="password" name="password" required>
        <button type="submit" name="submit">Login</button>
        <a href="register.php">Already signed in? sign up here</a>
    </form>
</body>
</html>