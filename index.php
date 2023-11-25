<?php
    require_once 'components/db_connect.php';

    $sql = "SELECT * FROM animals";
    $result = mysqli_query($conn, $sql);
    $cards = "";
            
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $cards .= "
            <div class='p-2'>
             <div class='cards' >
               <img src='{$row['photo_url']}' class='card-img-top' alt='{$row['name']}'>
               <div class='card-body'>
                    <h5 class='card-title'>{$row['name']}</h5>
                    <p class='card-text'><strong>Size:</strong> {$row['size']}</p>
                    <p class='card-text'><strong>Age:</strong> {$row['age']}</p>
                    <p class='card-text'><strong>Gender:</strong> {$row['gender']}</p>
                    <p class='card-text'><strong>Vaccinated:</strong> " . ($row['vaccinated'] ? 'Yes' : 'No') . "
                    <p class='card-text'><strong>Breed:</strong> {$row['breed']}</p>
                    <p class='card-text'><strong>Status:</strong> {$row['status']}</p>
                    <a href='details.php?animalID=$row[id]' 
                    class='btn btn-primary'>Details</a>
                    <a href='adopt_pet.php?animalID=$row[id]' 
                    class='btn btn-success'>Take me home</a>
                    

                 </div>
              </div>
            </div>
           ";
       }
    }       
    else{
        
        $cards ="No data Found.";
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>



      <?php require_once 'components/navbar.php' ?>
      <div class="container">
           <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                 <?= $cards;?>
            </div>
       </div>    




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

