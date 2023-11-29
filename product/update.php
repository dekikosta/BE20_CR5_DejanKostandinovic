<?php
    session_start();
    if ((!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) || isset($_SESSION["user"])) {
        header("Location: /index.php");
    }
    require_once '../components/db_connect.php';
    $options = "";
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM `products` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $sql = "SELECT * FROM `suppliers`";
        $result = mysqli_query($conn, $sql);
        while ($row_sup = mysqli_fetch_assoc($result)) {
            if ($row["fk_supplier"] == $row_sup["sup_id"]) {
                $options .= "<option selected value='$row_sup[sup_id]'>$row_sup[sup_name]</option>";
            } else {
                $options .= "<option value='$row_sup[sup_id]'>$row_sup[sup_name]</option>";
            }
        }
    }
    if (isset($_POST["create"])) {
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $size = $_POST["size"];
        $age = $_POST["age"];
        $breed = $_POST["breed"];
        $vaccine = $_POST["vaccine"];
        $supplier = $_POST["supplier"] != 0 ? $_POST["supplier"] : "NULL";
        $picture = $_POST["picture"];
        $sql = "UPDATE `products` SET 
            `name`='$name', 
            `age`='$age', 
            `breed`='$breed', 
            `gender`='$gender', 
            `size`='$size', 
            `vaccine`='$vaccine', 
            `fk_supplier`=$supplier, 
            `picture`='$picture' 
            WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<div class='alert alert-success' role='alert'>Product updated!</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Something went wrong!</div>";
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
</head>
<body>

    <div class="container">
        <form action="" method="POST">
            <label class="form-label">
                Name:
                <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>">
            </label>
            
            <label class="form-label">
                Gender:
                <select name="gender" class="form-control">
                    <option value="male" <?= $row['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                    <option value="female" <?= $row['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                </select>
            </label>
            
            <label class="form-label">
                Breed:
                <input type="text" name="breed" class="form-control" value="<?= $row['breed'] ?>">
            </label>
            
            <label class="form-label">
                Size:
                <select name="size" class="form-control">
                    <option value="small" <?= $row['size'] == 'small' ? 'selected' : '' ?>>Small</option>
                    <option value="large" <?= $row['size'] == 'large' ? 'selected' : '' ?>>Large</option>
                </select>
            </label>
            
            <label class="form-label">
                Age:
                <input type="number" step="0.01" name="age" class="form-control" value="<?= $row['age'] ?>">
            </label>
            
            <label class="form-label">
                Vaccine:
                <select name="vaccine" class="form-control">
                    <option value="yes" <?= $row['vaccine'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="no" <?= $row['vaccine'] == 'no' ? 'selected' : '' ?>>No</option>
                </select>
            </label>
            
            <label class="form-label">
                Location:
                <select name="supplier" class="form-control">
                    <?= $options; ?>
                </select>
            </label>
            
            <label class="form-label">
                Picture URL:
                <input type="text" name="picture" class="form-control" value="<?= $row['picture'] ?>">
            </label>
            
            <input type="submit" value="Update" name="create" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
