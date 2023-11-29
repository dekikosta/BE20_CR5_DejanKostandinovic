<?php
    require_once '../components/db_connect.php';

    // SELECT
    // *
    // FROM
    //     `products` AS p
    // LEFT JOIN(
    //     SELECT
    //         sup_name AS testets,
    //         sup_id AS test_id
    //     FROM
    //         `suppliers`
    // ) AS s
    // ON
    // s.test_id = p.fk_supplier

    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $sql = "SELECT * FROM `products` p LEFT JOIN `suppliers` s ON p.fk_supplier = s.sup_id WHERE `id` = $_GET[id]";
        $result = mysqli_query($conn, $sql);
    
        $cards = "";
    
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $cards .= "
            <div class='p-2'>
                <div class='card'>
                <img src='{$row[0]['picture']}' class='card-img-top object-fit-cover' style=: 50rem' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row[0]["name"]}</h5>
                        <p class='card-text'>Gender: {$row[0]["gender"]}</p>
                        <p class='card-text'>Breed: {$row[0]["breed"]}</p>
                        <p class='card-text'>Size: {$row[0]["size"]}</p>
                        <p class='card-text'>Age: {$row[0]["age"]}</p>
                        <p class='card-text'>Vaccine: {$row[0]["vaccine"]}</p>
                        <p class='card-text'>Description: {$row[0]["description"]}</p>
                        <p class='card-text'>Status: {$row[0]["status"]}</p>
                        <p class='card-text'>Location: {$row[0]["sup_name"]}</p>
                    </div>
                </div>
            </div>
            ";
        }
        else{
            $cards = "No data found.";
        }
    }
    require_once '../components/navbar.php';
    // <a href='details.php' class='btn btn-primary'>Details</a>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    

    <div class="container">
        <?= $cards ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>