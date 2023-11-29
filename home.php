<?php
session_start();

if (!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) {
  header("Location: index.php");
  exit;
}
if (isset($_SESSION["adm"])) {
  header("Location: index.php");
  exit;
}

require_once "./components/db_connect.php";

$sql = "SELECT * FROM `users` WHERE `id` = {$_SESSION["user"]}";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


require_once "./components/navbar.php";
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome <?= $row["first_name"] ?></title>

  <!-- CSS LINK -->
  <link rel="stylesheet" href="./CSS/styles.css">

  <!-- BOOTSTRAP ICON LINK -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <!-- BOOTSTRAP ICON LINK -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>


  <h2 class="text-center p-5">Welcome back <?= $row["first_name"] . " " . $row["last_name"] ?></h2>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>