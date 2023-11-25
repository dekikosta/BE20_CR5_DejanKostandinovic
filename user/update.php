<?php
    session_start();

    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: /index.php");
        die();
    }

    if(isset($_SESSION["adm"])){
        $id = $_GET["id"]??$_SESSION["adm"];
    }
    else{
        $id = $_SESSION["user"];
    }

    require_once '../components/db_connect.php';
    require_once '../components/clean.php';
    require_once '../components/fileUpload.php';

    $emailError = "";
    $passError = "";

    $sql = "SELECT * FROM `user` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST["update"])){
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

            if($_FILES["picture"]["error"] == 0){
                if($row["picture"] !== "avatar.png"){
                    unlink("../assets/$row[picture]");
                }
                $sql = "UPDATE `user` SET `email`='$email',`pass`='$pass', `picture`='$picture[0]' WHERE id = $id";
            }
            else{
                $sql = "UPDATE `user` SET `email`='$email',`pass`='$pass' WHERE id = $id";
            }

            $result = mysqli_query($conn, $sql);

            if($result){
                echo "
            <div class='alert alert-success' role='alert'>
                User updated!
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
</head>
<body>
    <?php require_once '../components/navbar.php' ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label>
                Email:
                <input type="email" name="email" class="form-control" value="<?= $row["email"]??""; ?>">
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
            <input type="submit" value="Update" name="update" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>