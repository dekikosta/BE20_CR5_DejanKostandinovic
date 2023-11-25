<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be20_cr5_animal_adoption_dejankostandinovic";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET['animalID'])) {
    $animalId = $_GET['animalID'];

    
    $sql = "SELECT * FROM animals WHERE id = $animalId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
           echo "<div class='p-2'>";
           echo "<div class='card'style='width:500px;'>";
           echo "<img src='{$row['photo_url']}' class='card-img-top' alt='{$row['name']}'>";
           echo "<h5 class='card-title'>{$row['name']}</h5>";
           echo "<p class='card-text'><strong>Size:</strong> {$row['size']}</p>";
           echo "<p class='card-text'><strong>Age:</strong> {$row['age']}</p>";
           echo "<p class='card-text'><strong>Gender:</strong> {$row['gender']}</p>";
           echo "<p class='card-text'><strong>Vaccinated:</strong> " . ($row['vaccinated'] ? 'Yes' : 'No') . "</p>";
           echo "<p class='card-text'><strong>Breed:</strong> {$row['breed']}</p>";
           echo "<p class='card-text'><strong>Status:</strong> {$row['status']}</p>";
           echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
           echo '<p><strong>Location:</strong> ' . $row['location'] . '</p>';
            
        }
    } else {
        echo "Animal not found";
    }
} else {
    echo "Invalid request";
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalis Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>