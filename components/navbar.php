<?php
    echo "
    <nav class='navbar navbar-expand-lg bg-body-tertiary'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='/index.php'>Navbar</a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link user' aria-current='page' href='/home.php'>Home</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link user' aria-current='page' href='/senior.php'>Senior</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='/create.php'>Create</a>
                    </li>";

                    if(isset($_SESSION["user"]) || isset($_SESSION["adm"])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='user/logout.php'>Logout</a>
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
                        <a class='nav-link' href='/user/dashboard.php'>User-Dashboard</a>
                        </li>
                        <li class='nav-item'>
                        <a class='nav-link' href='/product/product_dashboard.php'>Product-Dashboard</a>
                        </li>";
                    }
                echo "</ul>
            </div>
        </div>
    </nav>
    ";