<?php
require_once 'db_connect.php';
echo "
<nav class='navbar navbar-expand-lg bg-danger'>
    <div class='container-fluid'>
        <a class='navbar-brand' href='/index.php'>
            <img class='logo' src='https://foothillsanimal.org/wp-content/uploads/2021/01/Logo-1.png' alt='Logo'>
        </a>
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                
                ";

if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){

        echo "
        <li class='nav-item'>
                    <a class='nav-link active' aria-current='page' href='/home.php'>Profil</a>
                </li>
        <li class='nav-item'>
            <a class='nav-link' href='/user/logout.php'>Logout</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='/user/update.php'>Update user</a>
        </li>
        ";
    
}
else{
    echo "<li class='nav-item'>
        <a class='nav-link' href='/user/register.php'>Register</a>
    </li>
    <li class='nav-item'>
        <a class='nav-link' href='/user/login.php'>Login</a>
    </li>";
}
if(isset($_SESSION["adm"])){
    echo "
    <li class='nav-item'>
                    <a class='nav-link' href='/product/create.php'>Create</a>
                </li>
    <li class='nav-item'>
    <a class='nav-link' href='/user/dashboard.php'>User-Dashboard</a>
    </li>
    <li class='nav-item'>
    <a class='nav-link' href='/product/product_dashboard.php'>Product-Dashboard</a>
    </li>"; } 
    
    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){

   $id = $_SESSION["user"] ?? $_SESSION["adm"];
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0){
 $user = mysqli_fetch_assoc($result);
        $profilePicture = $user['picture'];
        $username = $user['first_name'];
        $email = $user['email'];

        // Display profile picture
        echo "
        <li class='nav-item ml-auto'> 
           <p> $username</p>
        </li>
        <li class='nav-item ml-auto'> 
           <p> $email</p>
        </li>
        <li class='nav-item ml-auto'> 
            <img src='$profilePicture' alt='Profile Picture' class='nav-link profile-picture' style='width: 50px; height: 50px;'>
        </li>
        
        " ;

    }
       
    }

 
         
echo "
</ul>
</div>
</div>
</nav>
";
?>

<!-- 
if(isset($_SESSION["user"]) || isset($_SESSION["adm"]))
    $id = $_SESSION["user"] ?? $_SESSION["adm"];
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if($result && mysqli_num_rows($result) > 0) 
        $user = mysqli_fetch_assoc($result);
        $profilePicture = $user['picture'];
        $username = $user['email'];

        // Display profile picture
        echo "
        <li class='nav-item ml-auto'> 
           <p> $username</p>
        </li>
        <li class='nav-item ml-auto'> 
            <img src='$profilePicture' alt='Profile Picture' class='nav-link profile-picture' style='width: 50px; height: 50px;'>
        </li>
        " 
        ;    -->