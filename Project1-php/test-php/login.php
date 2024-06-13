<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $err1 = "";

    $getEmailSS = $_SESSION['session_email'];
    $getPassSS = $_SESSION['session_pass'];

    if (isset($_POST["login"])) {

        if ($_POST["email"] ==  $getEmailSS && $_POST["pass"]  == $getPassSS) {
            $err1 = "đăng nhập thành công!";
        } else {
            $err1 = "đăng nhập thất bại!";
        }
    }
    ?>
    <form action="login.php" method="post">
        <input type="text" name="email" value="" placeholder="Email"><br>

        <input type="text" name="pass" value="" placeholder="Password"><br>
        <p> <?php echo $err1; ?> </p>

        <button type="submit" name="login">Đăng nhập</button>
    </form>
</body>

</html>