<?php

require_once "./components/db_connect.php";

$sql = "SELECT * FROM `products` WHERE `status` = 'available'";
$result = mysqli_query($conn, $sql);
$cards = "";
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $cards .= "
        <div class='p-2'>
            <div class='card'>
                <div class='card-body'>
                <img src='{$row['picture']}' class='card-img-top object-fit-cover' style='height: 12rem' alt='...'>
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
  <title>Animal Adoption Center</title>

  
  <link rel="stylesheet" href="./CSS/styles.css">

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

</head>

<body>

  <div class='myNavbar'>
    <div>
      <h3 class='logoTitle'>Available Pets</h3>
    </div>
    <ul>
      <li><a href='/index.php'>All Pets</a></li>
      <li><a href='/senior.php'>Senior</a></li>
    </ul>
  </div>

  <div class="row row-cols-1 row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">
        <?= $cards ?>
    </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>