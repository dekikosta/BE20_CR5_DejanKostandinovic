<?php
    session_start();

    if((!isset($_SESSION["user"]) && !isset($_SESSION["adm"])) || isset($_SESSION["user"])){
        header("Location: /index.php");
    }
    
    require_once '../components/db_connect.php';

    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id = $_GET["id"];
        $sql = "SELECT * FROM `products` WHERE `id` = $id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
       
        $sql = "DELETE FROM `products` WHERE `id` = $id";
        mysqli_query($conn, $sql);

        mysqli_close($conn);
        header("Location: ../index.php");
    }
    else{
        mysqli_close($conn);
        header("Location: ../index.php");
    }