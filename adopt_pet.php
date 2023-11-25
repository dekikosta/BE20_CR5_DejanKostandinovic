<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "be20_cr5_animal_adoption_dejankostandinovic";


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}


function adoptPet($user_id, $pet_id) {
    global $pdo;

    try {
       
        $stmt = $pdo->prepare("
            INSERT INTO pet_adoption (user_id, pet_id)
            VALUES (:user_id, :pet_id)
        ");

        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':pet_id', $pet_id);

        $stmt->execute();

        echo "Pet adopted successfully!";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $user_id = $_POST['user_id'];
    $pet_id = $_POST['pet_id'];

    
    adoptPet($user_id, $pet_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet</title>
</head>
<body>
    <h2>Adopt a Pet</h2>
    <form method="post" action="">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" required>

        <label for="pet_id">Pet ID:</label>
        <input type="text" name="pet_id" required>

        <button type="submit">Adopt</button>
    </form>
</body>
</html>
