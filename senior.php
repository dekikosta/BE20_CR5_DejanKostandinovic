<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be20_cr5_animal_adoption_dejankostandinovic";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM animals WHERE age > 8";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
        echo "<div class='p-2'>";
        echo "<div class='card' style='width:500px;'>";
        echo "<h2>{$row['name']}</h2>";
        echo "<img src='{$row['photo_url']}' alt='{$row['name']}'>";
        echo "<p><strong>Size:</strong> {$row['size']}</p>";
        echo "<p><strong>Age:</strong> {$row['age']}</p>";
        echo "<p><strong>Gender:</strong> {$row['gender']}</p>"; 
        echo "<p><strong>Vaccinated:</strong> " . ($row['vaccinated'] ? 'Yes' : 'No') . "</p>";
        echo "<p><strong>Breed:</strong> {$row['breed']}</p>";
        echo "<p><strong>Status:</strong> {$row['status']}</p>";
        echo "<a href='details.php?animalID=$row[id]' 
                    class='btn btn-primary'>Details</a>";
                   echo" <a href='adopt_pet.php?animalID=$row[id]' 
                    class='btn btn-success'>Take me home</a>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<p>No senior animals found.</p>";
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
