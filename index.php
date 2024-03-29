<?php
    session_start();
    
    require_once 'components/db_connect.php';

    if(isset($_SESSION["user"]) && isset($_POST["buy"])){
        $date = date("Y-m-d");
        $sql = "INSERT INTO `user_product`(`fk_user`, `fk_product`, `adoption_date`) VALUES ($_SESSION[user], $_POST[prod],'$date')";
        if(mysqli_query($conn,$sql)){
            echo "
            <div class='alert alert-success' role='alert'>
            Congratulate you on your successful adoption an Pet!
            </div>";
        }
    
    else {
        echo "
        <div class='alert alert-danger' role='alert'>
            Pet not being adopted !
        </div>";
       }



    }

    $sql = "SELECT * FROM `products` p LEFT JOIN `suppliers` s ON p.fk_supplier = s.sup_id WHERE p.id NOT IN(SELECT fk_product FROM `user_product`)";
    $result = mysqli_query($conn, $sql);
    

    $cards = "";

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
        

            $cards .= " 
            <div class='p-2'>
                <div class='card'>
                    <div class='card-body'>
                    <img src='{$row['picture']}' class='card-img-top object-fit-cover' style=: 30rem' alt='...'>
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
    require_once 'components/navbar.php'; 
    mysqli_close($conn);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    

    
    input[type="submit"] {
      margin-top: 5px; 
      background-color: #28a745;
      display: flex;
      color: #fff;
      padding: 10px 10px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
     
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }

    
    .btn-primary {
      margin-bottom: 10px; 
    }
  </style>
    <title>Animal adopted center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>

    <div class="heroLinks">
    <a class="heroBtns1" href="./senior.php">Show Senior</a>
    <a class="heroBtns2" href="./available.php">Pets Available</a>
  </div>


    <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
        <?= $cards ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <footer class="footer">
        <p>Admin: kos@kos.com Pass:123123</p>
        <p>User: ud@ud.com Pass:123123</p>
    </footer>

</body>
</html>