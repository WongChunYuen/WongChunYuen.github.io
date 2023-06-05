<header style="">
    <nav class="navbar navbar-expand-sm bg-white navbar-white fixed-top" style="border: 1px solid #e7e7e7;">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand" style="padding-left: 50px;"><img src="images/logo.png" alt="logo"
                    width="50" height="50"><b style="padding-left: 10px; font-size: 130%;">Car Rental System</b>
            </a>
            <div class="topnav-right">
                <div class="dropdown">
                    <button role="button" data-bs-toggle="dropdown" aria-expanded="false"
                        style="border: 0; background-color: white;">
                        <i class="fa-solid fa-user"
                            style="font-size:24px; padding-right: 5px;"></i><?php echo $_SESSION['name']?></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="myrental.php">My Rental</a></li>
                        <li><a class="dropdown-item" href="signout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
    </nav>
</header>