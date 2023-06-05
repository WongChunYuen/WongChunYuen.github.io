<?php
include 'login.php';
?>

<body>
    <!-- navigation bar -->

    <header>
        <nav class="navbar navbar-expand-sm bg-white navbar-white fixed-top" style="border: 1px solid #e7e7e7;">
            <div class="container-fluid">
                <a class="navbar-brand" style="padding-left: 50px;"><img src="logo/UUMlogo.png" alt="UUM logo"
                        width="43" height="53" style="vertical-align:middle"><b
                        style="padding-left: 10px; font-size: 130%;">UUM
                        TOUR</b>
                </a>
                <!-- Click and go to that page -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#map">Map</a>
                    </li>
                </ul>
                <!-- Rigth nav that let user sign in -->
                
                    <?php 
                    if(isset($_SESSION['logged_in'])){
                        
                        if (!isset($_SESSION["profile"])) {
                            echo '<div class="topnav-right"><div class="dropdown">
                        <button role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: 0; background-color: white;">
                        <i class="fa-solid fa-user" style="font-size:24px; padding-right: 5px;"></i>' . $_SESSION['name'] .
                                '</button>
    
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="userProfile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>';
                        }

                //         echo '<div class="menu">
                //         <a href="#" onclick="menu()" style="text-decoration:none; color:black;"> <i
                //                 class="fa-solid fa-user" style="font-size:24px;"></i>' . $_SESSION['name'] .
                //     '</button>
                //     <div id="content" class="dropdown-content">
                //         <a href="userProfile.php" style="text-decoration:none; color:black;">Profile</a>
                //         <a href="logout.php" onclick="logout()" style="text-decoration:none; color:black;">Logout</a>
                //     </div>
                // </div>';

                    }
                    else{
                        echo '<button class="btn btn-primary" type="button" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="margin-right: 5px"><b>Sign in</b></button> ';
                        echo '<button class="btn btn-info" type="button"> <a href="registration.php"
                        style="text-decoration:none; color:black;"><b>Sign up</b></a></button>';
                    }
                ?>

                    <!-- The Modal -->
                    <div id="id01" class="modal">
                        <!-- Modal Content -->
                        <form class="modal-content animate" method="post" action="">
                            <div onclick="document.getElementById('id01').style.display='none'" class="close"
                                title="Close Modal">&times; </div>
                            <div class="container">
                                <h2 class="text-center">Sign in</h2> <br>

                                <label for="Email"><b>Email</b></label>
                                <input type="text" placeholder="Enter Email" name="Email" required>

                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="psw" required>

                                <label>
                                    <input type="checkbox" checked="checked" name="remember"> Remember me
                                </label>
                            </div>

                            <div class="container" style="background-color:#f1f1f1">
                                <span class="psw"><a href="#">Forgot password?</a></span>
                                <span><button class="btn btn-info" type="submit" name="submit"><b>Sign
                                            in</b></button></span>
                            </div>
                        </form>
                    </div>

                    <script src="dropdown.js"></script>
                </div>
        </nav>
    </header>