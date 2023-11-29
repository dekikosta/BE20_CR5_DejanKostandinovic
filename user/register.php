<?php
    session_start();

    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';
    require_once '../components/clean.php';
    require_once '../components/fileUpload.php';

    $emailError = "";
    $passError = "";

    if(isset($_POST["register"])){
        $email = clean($_POST["email"]);
        $pass = clean($_POST["pass"]);
        $picture = fileUpload($_FILES["picture"]);

        $error = false;

        if(empty($email)){
            $error = true;
            $emailError = "Email cannot be empty.";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Email has the wrong format.";
        }
        else{
            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) !== 0){
                $error = true;
                $emailError = "Email already exists.";
            }
        }

        if(empty($pass)){
            $error = true;
            $passError = "Password cannot be empty.";
        }
        elseif(strlen($pass) < 3){
            $error = true;
            $passError = "Password must be at least 8 chars long.";
        }


        if($error === false){
            $pass = hash("sha256", $pass);

            $sql = "INSERT INTO `users`(`email`, `pass`, `picture`) VALUES ('$email', '$pass', '$picture[0]')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo "
            <div class='alert alert-success' role='alert'>
                New user created!
            </div>";
            }
            else{
                echo "
                <div class='alert alert-danger' role='alert'>
                    Something went wrong!
                </div>";
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <?php require_once '../components/navbar.php' ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label>
                Email:
                <input type="email" name="email" class="form-control" value="<?= $email??""; ?>">
                <span><?= $emailError; ?></span>
            </label>
            <label>
                Password:
                <input type="password" name="pass" class="form-control">
                <span><?= $passError; ?></span>
            </label>
            <label class="form-label">
                Picture:
                <input type="file" name="picture" class="form-control">
            </label>
            <input type="submit" value="Register" name="register" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>