<?php
    session_start();

    if((!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) || isset($_SESSION["user"])){
        header("Location: /index.php");
    }

    require_once '../components/db_connect.php';
   

    $options = "";

    $sql = "SELECT * FROM `suppliers`";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $options .= "<option value='$row[sup_id]'>$row[sup_name]</option>";
    }

    if(isset($_POST["create"])){
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $breed = $_POST["breed"];
        $size = $_POST["size"];
        $vaccine = $_POST["vaccine"];
        $description = $_POST["description"];
        $status = $_POST["status"];
        $supplier = $_POST["supplier"] != 0 ? $_POST["supplier"] : NULL;
        $picture = $_POST["picture"];


        // INSERT INTO `products`( `name`, `picture`, `fk_supplier`, `age`, `gender`, `breed`, `size`, `vaccine`, `description`, `status`) VALUES 
        $sql = "INSERT INTO `products`(`name`,`picture`,`fk_supplier`,`age`,`gender`,`breed`,`size`,`vaccine`,`description`, `status`) VALUES 
        ('$name', '$picture',$supplier, '$age' ,'$gender','$breed','$size','$vaccine', '$description', '$status')";
        if(mysqli_query($conn, $sql)){
            echo "
            <div class='alert alert-success' role='alert'>
                New product created!
            </div>";
        }
        else {
            echo "
            <div class='alert alert-danger' role='alert'>
                Something went wrong!
            </div>";
        }
    }

    require_once '../components/navbar.php';
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
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label class="form-label">
                Name:
                <input type="text" name="name" class="form-control">
                <label class="form-label">
            </label>
            <label class="form-label">
            Gender:
            <select name="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
           </select>
                Breed:
                <input type="text" name="breed" class="form-control">
                <label class="form-label">
               </label>
               Size:
                <select name="size" class="form-control">
                    <option value="small">Small</option>
                    <option value="large">Large</option>
                </select>
                Age:
                <input type="number" step="0.01" name="age" class="form-control">
                 </label>
                <label class="form-label">
           </label>
           <label class="form-label">
                Vaccine:
                <select name="vaccine" class="form-control">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
           Location:
            <select name="supplier" class="form-control">
                <?= $options; ?>
            </select>
            <label class="form-label">
            Description:
            <textarea name="description" class="form-control"></textarea>
            <label class="form-label">
            </label>
            Status:
              <select name="status" class="form-control">
                  <option value="available">Available</option>
                  <option value="adopted">Adopted</option>
                 </select>
              <label class="form-label">
              </label>
                Picture Url:
                <input type="text" name="picture" class="form-control">
            </label>
            <input type="submit" value="Create" name="create" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>