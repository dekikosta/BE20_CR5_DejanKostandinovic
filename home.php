<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be20_cr5_animal_adoption_dejankostandinovic";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM animals";
$result = $conn->query($sql);


if ($result) {
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Animals</title>";
    echo "<link rel='stylesheet' href='path/to/bootstrap.min.css'>";
    echo "<style>";
    echo "body { background-color: #f8f9fa; }";
    echo ".card { width: 18rem; margin: 10px; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";

    
    while ($row = $result->fetch_assoc()) {
        echo "<div class='p-2'>";
        echo "<div class='card'style='width:500px;'>";
        echo "<img src='{$row['photo_url']}' class='card-img-top' alt='{$row['name']}' style='max-width: 100%; height: auto;'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$row['name']}</h5>";
        echo "<p class='card-text'><strong>Size:</strong> {$row['size']}</p>";
        echo "<p class='card-text'><strong>Age:</strong> {$row['age']}</p>";
        echo "<p class='card-text'><strong>Gender:</strong> {$row['gender']}</p>";
        echo "<p class='card-text'><strong>Vaccinated:</strong> " . ($row['vaccinated'] ? 'Yes' : 'No') . "</p>";
        echo "<p class='card-text'><strong>Breed:</strong> {$row['breed']}</p>";
        echo "<p class='card-text'><strong>Status:</strong> {$row['status']}</p>";
        echo "<a href='details.php?animalID=$row[id]' 
                    class='btn btn-primary'>Details</a>";
                    echo "<a href='adopt_pet.php?animalID=$row[id]' 
                    class='btn btn-success'>Take me home</a>";
        echo "</div>";
        echo "</div>";
    }

    echo "<script src='path/to/bootstrap.bundle.min.js'></script>";
    
    echo "</body>";
    echo "</html>";
} else {
    echo "<p>No animals found.</p>";
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
