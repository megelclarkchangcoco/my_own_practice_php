<?php 


if(isset($_POST['submit'])){
    include 'classes/users.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersData = new users();

    $usersData->registerUser($username, $password);
    echo "<h1 stlye='color:green'> Register Successfully! </h1>'";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username" required>
        <input type="password" name="password" required>
        <button name="submit">Register</button>
        <a href="login.php">Already signed in? Login here</a>
    </form>
</body>
</html>