<?php
include 'connect.php';
session_start();
unset($_SESSION["profile"]);
if (isset($_SESSION['logged_in'])) {
    $userReviewID = $_SESSION['id'];
    $reviewName = $_SESSION['name'];
}

// vmall submit post
if (isset($_POST['vmallsubmit'])) {

    $vmallreview = $_POST['vmallreview'];

    if(!isset($_POST['vmallrate'])){
        echo '<script> alert("Please complete the form")</script>';
    }else{
        $vmallstar = $_POST['vmallrate'];
        $sql = "INSERT INTO `vmallreview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$vmallstar', '$vmallreview')";
        $result1 = $conn->query($sql);
    }
}

// unta submit post
if (isset($_POST['untasubmit'])) {

    $untareview = $_POST['untareview'];

    if(!isset($_POST['untarate'])){
        echo '<script> alert("Please complete the form")</script>';
    } else {
        $untastar = $_POST['untarate'];
        $sql = "INSERT INTO `untareview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$untastar', '$untareview')";
        $result1 = $conn->query($sql);
    }
}

// vmall delete & update
if (isset($_POST['vmalldelete'])) {
    $sql = "DELETE FROM `vmallreview` WHERE review_ID=" . $_POST['vmalldelete'];
    $conn->query($sql);
}

if (isset($_POST["vmallupdate"])) {
    $vmallID = $_POST["vmallupdate"];
    $vmallupdateReview = $_POST["vmalleditreview"];

    $sqlupdate = "UPDATE `vmallreview` set review ='$vmallupdateReview' where review_ID='$vmallID' ";
    $conn->query($sqlupdate);

}

// unta delete & update
if (isset($_POST['untadelete'])) {
    $sql = "DELETE FROM `untareview` WHERE review_ID=" . $_POST['untadelete'];
    $conn->query($sql);
}

if (isset($_POST["untaupdate"])) {
    $untaID = $_POST["untaupdate"];
    $untaupdateReview = $_POST["untaeditreview"];

    $sqlupdate = "UPDATE `untareview` set review ='$untaupdateReview' where review_ID='$untaID' ";
    $conn->query($sqlupdate);

}

if (isset($_POST["mytab"])) {
    $_SESSION['indexC'] = $_POST["mytab"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UUM TOUR</title>
    <link rel="icon" href="logo/UUMlogo.png">
    <script src="https://kit.fontawesome.com/4448303201.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="review.css">
    <link rel="stylesheet" href="login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<?php include 'header.php'; ?>

<section>
    <div class="d-flex align-items-start">
        <!-- Three logo at left side to let user press -->
        <form method="post"><div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link <?php if (isset($_SESSION['indexC'])) {if ($_SESSION['indexC'] == 1) {
                echo 'active';}} elseif(!isset($_SESSION['indexC'])){echo 'active';} ?> " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="submit" role="tab" aria-controls="v-pills-home" aria-selected="true" name="mytab" value="1"><img
                    src="logo/vmall-icon 2.png" width="80px" height="80px">Vmall</button>
            <button class="nav-link <?php if (isset($_SESSION['indexC'])) {if ($_SESSION['indexC'] == 2) {
                echo 'active';}} ?> " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="submit" role="tab" aria-controls="v-pills-profile" aria-selected="false" name="mytab" value="2"><img
                    src="logo/taman-burung-unta-icon 2.png" width="80px" height="80px">Taman Burung Unta</button>
        </div></form>

        <div class="tab-content" id="v-pills-tabContent" style="padding-left: 30px;">

            <!-- First tab -->
            <div class="tab-pane fade <?php if (isset($_SESSION['indexC'])) {if ($_SESSION['indexC'] == 1) {
                echo 'show active';}} elseif(!isset($_SESSION['indexC'])){echo 'show active';} ?> " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                tabindex="0">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Vmall_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Vmall_picture2.jpeg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Vmall_picture3.jpg" height="380px" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <!-- Left right button to change image -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Description -->
                <div style="padding-left: 700px; padding-right: 100px; align-items: center;">
                    <div class="container1">

                        <h1 class="card-title">About Vmall </h1><br>
                        <p class="card-text" style="text-align: justify;">Most of the modern-day essential facilities are located centrally at the Varsity Mall. These facilities include banking, a Cooperative Bookshop, and restaurant, which can accommodate up to 350 people at a time. 
                        The mall also has a mini- market that supplies stationary, toiletries, groceries and other goods at affordable prices. 
                        The Varsity Mall is the hub, which houses all the basic amenities. Both for its facilities and the services it provides, the Varsity Mall has become an integral and important part of the UUM campus experience.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="vmallrate" value="5" id="vmall5"><label for="vmall5">☆</label>
                                            <input type="radio" name="vmallrate" value="4" id="vmall4"><label for="vmall4">☆</label>
                                            <input type="radio" name="vmallrate" value="3" id="vmall3"><label for="vmall3">☆</label>
                                            <input type="radio" name="vmallrate" value="2" id="vmall2"><label for="vmall2">☆</label>
                                            <input type="radio" name="vmallrate" value="1" id="vmall1"><label for="vmall1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="vmallreview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="vmallsubmit">Send
                                                            </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>';
                        }
                        ?>

                        <div class="container-fluid px-1  mx-auto">
                            <div class="row justify-content-center">
                                <h4>Ratings and reviews</h4>
                                <?php
                                    $sqlread = "SELECT * FROM `vmallreview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $vmallreviewuserid = $row['user_ID'];
                                    $vmallreviewid = $row['review_ID'];
                                    $vmallreviewname = $row["name"];
                                    $vmallreviewstar = $row["star"];
                                    $vmallReview = $row["review"];
                                    $vmallreviewtime = strtotime($row["timestamp"]);
                                    $vmallshowTime = date("Y/m/d", $vmallreviewtime);

                                    //display from database
                                    echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $vmallreviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $vmallreviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="vmalledit" value="' . $vmallreviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="vmalldelete" value="' . $vmallreviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $vmallreviewstar . ' star(s)     ' . $vmallshowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $vmallReview . '</p>
                                            </div>';
                                    if (isset($_POST["vmalledit"])) {
                                        if ($_POST["vmalledit"] == $vmallreviewid) {
                                            $sqledit = "SELECT * FROM `vmallreview` WHERE review_ID=" . $_POST['vmalledit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='vmalleditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='vmallupdate' value='$vmallreviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";

                                            }
                                        }
                                    }
                                    echo '</div><hr>';
                                }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second tab -->
            <div class="tab-pane fade <?php if (isset($_SESSION['indexC'])) {if ($_SESSION['indexC'] == 2) {
                echo 'show active';}} ?> " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                tabindex="1">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Taman_burung_Unta_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Taman_burung_Unta_picture2.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <!-- Left right button to change image -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Description -->
                <div style="padding-left: 700px; padding-right: 100px; align-items: center;">
                    <div class="container1">
                        <h1 class="card-title">About Taman Burung Unta</h1><br>
                        <p class="card-text" style="text-align: justify;">There are 3 ostriches in Taman Burung Unta, 2 males and 1 female. Taman Burung Unta is located opposite Inasis Mas.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="untarate" value="5" id="unta5"><label for="unta5">☆</label>
                                            <input type="radio" name="untarate" value="4" id="unta4"><label for="unta4">☆</label>
                                            <input type="radio" name="untarate" value="3" id="unta3"><label for="unta3">☆</label>
                                            <input type="radio" name="untarate" value="2" id="unta2"><label for="unta2">☆</label>
                                            <input type="radio" name="untarate" value="1" id="unta1"><label for="unta1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="untareview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="untasubmit">Send
                                                            </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <br>';
                        }
                        ?>

                        <!--display from database-->
                        <div class="container-fluid px-1 mx-auto">
                            <div class="row justify-content-center">
                            <h4>Ratings and reviews</h4>
                                <?php
                                    $sqlread = "SELECT * FROM `untareview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $untareviewuserid = $row['user_ID'];
                                        $untareviewid = $row['review_ID'];
                                        $untareviewname = $row["name"];
                                        $untareviewstar = $row["star"];
                                        $untaReview = $row["review"];
                                        $untareviewtime = strtotime($row["timestamp"]);
                                        $untashowTime = date("Y/m/d", $untareviewtime);

                                        //display from database
                                        echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $untareviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $untareviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="untaedit" value="' . $untareviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="untadelete" value="' . $untareviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $untareviewstar . ' star(s)     ' . $untashowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $untaReview . '</p>
                                            </div>';
                                    if (isset($_POST["untaedit"])) {
                                        if ($_POST["untaedit"] == $untareviewid) {
                                            $sqledit = "SELECT * FROM `untareview` WHERE review_ID=" . $_POST['untaedit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='untaeditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='untaupdate' value='$untareviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";
                                            }
                                        }
                                    }
                                    echo '</div><hr>';
                                }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>