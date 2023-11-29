<?php
    session_start();
    
    require_once 'components/db_connect.php';

   

    $sql = "SELECT * FROM `user_product` up JOIN `products` p ON p.id = up.fk_product JOIN `users` u ON u.id = up.fk_user WHERE u.id = $_SESSION[user]";
    $result = mysqli_query($conn, $sql);

    $cards = "";

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $cards .= "
            <div class='p-2'>
                <div class='card'>
                <img src='assets/{$row["picture"]}' class='card-img-top object-fit-cover' style='height: 100%; width: 100%; object-fit: cover;' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>$row[name]</h5>
                        <p class='card-text'>Gender: $row[gender]</p>
                        <p class='card-text'>Breed: $row[breed]</p>
                        <p class='card-text'>Size: $row[size]</p>
                        <p class='card-text'>Age: $row[age]</p>
                        <p class='card-text'>Vaccine: $row[vaccine]</p>
                        <a href='product/details.php?id=$row[id]' class='btn btn-primary'>Details</a>";
                        if(isset($_SESSION["user"])){
                            $cards .= "
                            <form action='' method ='post'>
                              <input type='hidden' name='prod' value='$row[id]'>
                              <input class ='btn btn-success' type ='submit' value='Take me home' name='buy'>
                            </form>
                            ";
                        }
                  $cards .=  "</div>
                </div>
            </div>
            ";
        }
    }
    else{
        $cards = "No data found.";
    }

    mysqli_close($conn);
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
    <?php require_once 'components/navbar.php' ?>

    <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
        <?= $cards ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>