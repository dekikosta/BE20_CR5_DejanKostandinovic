<?php
    session_start();

    if(!isset($_SESSION["adm"])){
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';

    $data = "";

    $sql = "SELECT * FROM `users` WHERE `status` != 'adm'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $data .= "
                <tr>
                    <th scope='row'>$row[id]</th>
                    <td>$row[email]</td>
                    <td><a href='/user/update.php?id=$row[id]' class='btn btn-warning'>Update</a></td>
                </tr>
            ";
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
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once '../components/navbar.php' ?>

    <div class="container">
        <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">email</th>
            <th scope="col">actions</th>
        </tr>
    </thead>
    <tbody>
        <?= $data; ?>
    </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>




