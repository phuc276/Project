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
    $err2 = "";

    if (isset($_POST["register"])) {
        $x = 1;
        if (empty($_POST["email"])) {
            $err1 = "vui lòng nhập Email";
            $x = 2;
        }
        if (empty($_POST["pass"])) {
            $err2 = "vui lòng nhập Password";
            $x = 2;
        }
        if ($x == 1) {
            $Getmail = $_POST["email"];
            $Getpass = $_POST["pass"];
            $_SESSION['session_email'] = $Getmail;
            $_SESSION['session_pass'] = $Getpass;
        }
    }
    ?>
    <form action="register.php" method="post">
        <input type="text" name="email" value="" placeholder="Email"><br>
        <p> <?php echo $err1; ?> </p>
        <input type="text" name="pass" value="" placeholder="Password"><br>
        <p> <?php echo $err2; ?> </p>
        <button type="submit" name="register">register</button>
    </form>
</body>

</html>