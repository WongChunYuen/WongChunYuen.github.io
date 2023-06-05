<?php
include 'connect.php';
session_start();
unset($_SESSION["profile"]);
if (isset($_SESSION['logged_in'])) {
    $userReviewID = $_SESSION['id'];
    $reviewName = $_SESSION['name'];
}

// golf submit post
if (isset($_POST['golfsubmit'])) {

    $golfreview = $_POST['golfreview'];

    if(!isset($_POST['golfrate'])){
        echo '<script> alert("Please complete the form")</script>';
    }else{
        $golfstar = $_POST['golfrate'];
        $sql = "INSERT INTO `golfreview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$golfstar', '$golfreview')";
        $result1 = $conn->query($sql);
    }
}

//sport centre submit post
if (isset($_POST['sportsubmit'])) {

    $sportreview = $_POST['sportreview'];

    if(!isset($_POST['sportrate'])){
        echo '<script> alert("Please complete the form")</script>';
    } else {
        $sportstar = $_POST['sportrate'];
        $sql = "INSERT INTO `sportreview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$sportstar', '$sportreview')";
        $result1 = $conn->query($sql);
    }
}

// //hidden lake submit post
if (isset($_POST['lakesubmit'])) {

    $lakereview = $_POST['lakereview'];

    if(!isset($_POST['lakerate'])){
        echo '<script> alert("Please complete the form")</script>';
    } else {
        $lakestar = $_POST['lakerate'];
        $sql = "INSERT INTO `lakereview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$lakestar', '$lakereview')";
        $result1 = $conn->query($sql);
    }
}

//golf delete & update
if (isset($_POST['golfdelete'])) {
    $sql = "DELETE FROM `golfreview` WHERE review_ID=" . $_POST['golfdelete'];
    $conn->query($sql);
}

if (isset($_POST["golfupdate"])) {
    $golfID = $_POST["golfupdate"];
    $golfupdateReview = $_POST["golfeditreview"];

    $sqlupdate = "UPDATE `golfreview` set review ='$golfupdateReview' where review_ID='$golfID' ";
    $conn->query($sqlupdate);

}

// sport centre delete & update
if (isset($_POST['sportdelete'])) {
    $sql = "DELETE FROM `sportreview` WHERE review_ID=" . $_POST['sportdelete'];
    $conn->query($sql);
}

if (isset($_POST["sportupdate"])) {
    $sportID = $_POST["sportupdate"];
    $sportupdateReview = $_POST["sporteditreview"];

    $sqlupdate = "UPDATE `sportreview` set review ='$sportupdateReview' where review_ID='$sportID' ";
    $conn->query($sqlupdate);
}

// // Hidden lake delete & update
if (isset($_POST['lakedelete'])) {
    $sql = "DELETE FROM `lakereview` WHERE review_ID=" . $_POST['lakedelete'];
    $conn->query($sql);
}

if (isset($_POST["lakeupdate"])) {
    $lakeID = $_POST["lakeupdate"];
    $lakeupdateReview = $_POST["lakeeditreview"];

    $sqlupdate = "UPDATE `lakereview` set review ='$lakeupdateReview' where review_ID='$lakeID' ";
    $conn->query($sqlupdate);
}

if (isset($_POST["mytab"])) {
    $_SESSION['indexA'] = $_POST["mytab"];
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
            <button class="nav-link <?php if (isset($_SESSION['indexA'])) {if ($_SESSION['indexA'] == 1) {
                echo 'active';}} elseif(!isset($_SESSION['indexA'])){echo 'active';} ?> " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="submit" role="tab" aria-controls="v-pills-home" aria-selected="true" name="mytab" value="1"><img
                    src="logo/golf-icon 2.png" width="80px" height="80px">Golf</button>
            <button class="nav-link <?php if (isset($_SESSION['indexA'])) {if ($_SESSION['indexA'] == 2) {
                echo 'active';}} ?> " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="submit" role="tab" aria-controls="v-pills-profile" aria-selected="false" name="mytab" value="2"><img
                    src="logo/sport-centre-icon 2.png" width="80px" height="80px">Sport Centre</button>
            <button class="nav-link <?php if (isset($_SESSION['indexA'])) {if ($_SESSION['indexA'] == 3) {
                echo 'active';}} ?>" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                type="submit" role="tab" aria-controls="v-pills-messages" aria-selected="false" name="mytab" value="3"><img
                    src="logo/hidden-lake-icon 2.png" width="80px" height="80px">Hidden Lake</button>
        </div></form>

        <div class="tab-content" id="v-pills-tabContent" style="padding-left: 30px;">

            <!-- First tab -->
            <div class="tab-pane fade <?php if (isset($_SESSION['indexA'])) {if ($_SESSION['indexA'] == 1) {
                echo 'show active';}} elseif(!isset($_SESSION['indexA'])){echo 'show active';} ?> " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                tabindex="0">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Golf_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Golf_picture2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Golf_picture3.jpeg" height="380px" width="100%" class="d-block w-100" alt="...">
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

                        <h1 class="card-title">About Kelab Golf Universiti Utara Malaysia </h1><br>
                        <p class="card-text" style="text-align: justify;">UUM has been selected as a Pusat Kecemerlangan Sukan Golf by Kementerian Pengajian Tinggi. Now the process of upgrading the UUM Golf Course from 9 holes to 18 holes is being done and funded by the Kementerian Pengajian Tinggi. Recently there is a new program offered by UUM to golf athletes for theory 
                        and training courses on the UUM campus. Among the facilities provided are ‘buggy track’ and ‘halfway drinking hut’. This golf course also has a covered driving range and a clubhouse with a coffee house.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="golfrate" value="5" id="golf5"><label for="golf5">☆</label>
                                            <input type="radio" name="golfrate" value="4" id="golf4"><label for="golf4">☆</label>
                                            <input type="radio" name="golfrate" value="3" id="golf3"><label for="golf3">☆</label>
                                            <input type="radio" name="golfrate" value="2" id="golf2"><label for="golf2">☆</label>
                                            <input type="radio" name="golfrate" value="1" id="golf1"><label for="golf1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="golfreview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="golfsubmit">Send
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
                                    $sqlread = "SELECT * FROM `golfreview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $golfreviewuserid = $row['user_ID'];
                                    $golfreviewid = $row['review_ID'];
                                    $golfreviewname = $row["name"];
                                    $golfreviewstar = $row["star"];
                                    $golfReview = $row["review"];
                                    $golfreviewtime = strtotime($row["timestamp"]);
                                    $golfshowTime = date("Y/m/d", $golfreviewtime);

                                    //display from database
                                    echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $golfreviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $golfreviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="golfedit" value="' . $golfreviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="golfdelete" value="' . $golfreviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $golfreviewstar . ' star(s)     ' . $golfshowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $golfReview . '</p>
                                            </div>';
                                    if (isset($_POST["golfedit"])) {
                                        if ($_POST["golfedit"] == $golfreviewid) {
                                            $sqledit = "SELECT * FROM `golfreview` WHERE review_ID=" . $_POST['golfedit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='golfeditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='golfupdate' value='$golfreviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";

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
            <div class="tab-pane fade <?php if (isset($_SESSION['indexA'])) {if ($_SESSION['indexA'] == 2) {
                echo 'show active';}} ?> " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                tabindex="1">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Sport_Centre_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Sport_Centre_picture2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Sport_Centre_picture3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Sport_Centre_picture4.jpg" class="d-block w-100" alt="...">
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
                        <h1 class="card-title">About Sport Complex UUM</h1><br>
                        <p class="card-text" style="text-align: justify;">University Utara Malaysia Sports Centre is a centre under the jurisdiction of the Deputy Vice-Chancellor (Student Affairs & Alumni) was given the mandate and responsibility to manage, 
                        organize and regulate all sports and recreation programmes for university students and staff. 
                        This comprehensive and self-contained sports complex covers an area of 74 acres and provides 28 types of sports and recreation activities for students, staffs and outsiders.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="sportrate" value="5" id="sport5"><label for="sport5">☆</label>
                                            <input type="radio" name="sportrate" value="4" id="sport4"><label for="sport4">☆</label>
                                            <input type="radio" name="sportrate" value="3" id="sport3"><label for="sport3">☆</label>
                                            <input type="radio" name="sportrate" value="2" id="sport2"><label for="sport2">☆</label>
                                            <input type="radio" name="sportrate" value="1" id="sport1"><label for="sport1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="sportreview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="sportsubmit">Send
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
                                    $sqlread = "SELECT * FROM `sportreview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sportreviewuserid = $row['user_ID'];
                                        $sportreviewid = $row['review_ID'];
                                        $sportreviewname = $row["name"];
                                        $sportreviewstar = $row["star"];
                                        $sportReview = $row["review"];
                                        $sportreviewtime = strtotime($row["timestamp"]);
                                        $sportshowTime = date("Y/m/d", $sportreviewtime);

                                        //display from database
                                        echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $sportreviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $sportreviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="sportedit" value="' . $sportreviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="sportdelete" value="' . $sportreviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $sportreviewstar . ' star(s)     ' . $sportshowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $sportReview . '</p>
                                            </div>';
                                    if (isset($_POST["sportedit"])) {
                                        if ($_POST["sportedit"] == $sportreviewid) {
                                            $sqledit = "SELECT * FROM `sportreview` WHERE review_ID=" . $_POST['sportedit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='sporteditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='sportupdate' value='$sportreviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";
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

            <!-- Third tab -->
            <div class="tab-pane fade <?php if (isset($_SESSION['indexA'])) {if ($_SESSION['indexA'] == 3) {
                echo 'show active';}} ?> " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                tabindex="2">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Hidden_Lake_picture4.jpg" height="380px" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Hidden_Lake_picture2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Hidden_Lake_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <!-- Left right button to change image -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls3"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls3"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <!-- Description -->
                <div style="padding-left: 700px; padding-right: 100px; align-items: center;">
                    <div class="container1">
                        <h1 class="card-title">About Hidden Lake</h1><br>
                        <p class="card-text" style="text-align: justify;">The Hidden Lake of UUM is a natural lake that exists within the university area. This lake was given the name ‘Hidden Lake’ due to its hidden position from the public. 
                        This lake is also located in the middle of the Sintok forest and is protected by hills. Natural lakes or artificial lakes are usually found in sloping land areas and close to streams. 
                        However, it is different for 'Hidden Lake'. The lake is located on top of a hill and is far from streams or water sources. It’s clear and clean water coupled with the sight of dead trees adds to the uniqueness of this lake.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="lakerate" value="5" id="lake5"><label for="lake5">☆</label>
                                            <input type="radio" name="lakerate" value="4" id="lake4"><label for="lake4">☆</label>
                                            <input type="radio" name="lakerate" value="3" id="lake3"><label for="lake3">☆</label>
                                            <input type="radio" name="lakerate" value="2" id="lake2"><label for="lake2">☆</label>
                                            <input type="radio" name="lakerate" value="1" id="lake1"><label for="lake1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="lakereview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="lakesubmit">Send
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
                                    $sqlread = "SELECT * FROM `lakereview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $lakereviewuserid = $row['user_ID'];
                                        $lakereviewid = $row['review_ID'];
                                        $lakereviewname = $row["name"];
                                        $lakereviewstar = $row["star"];
                                        $lakeReview = $row["review"];
                                        $lakereviewtime = strtotime($row["timestamp"]);
                                        $lakeshowTime = date("Y/m/d", $lakereviewtime);

                                        //display from database
                                        echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $lakereviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $lakereviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="lakeedit" value="' . $lakereviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="lakedelete" value="' . $lakereviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $lakereviewstar . ' star(s)     ' . $lakeshowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $lakeReview . '</p>
                                            </div>';
                                    if (isset($_POST["lakeedit"])) {
                                        if ($_POST["lakeedit"] == $lakereviewid) {
                                            $sqledit = "SELECT * FROM `lakereview` WHERE review_ID=" . $_POST['lakeedit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='lakeeditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='lakeupdate' value='$lakereviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";
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
        </div>
</section>
</body>

</html>