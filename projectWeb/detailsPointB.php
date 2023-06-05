<?php
include 'connect.php';
session_start();
unset($_SESSION["profile"]);
if (isset($_SESSION['logged_in'])) {
    $userReviewID = $_SESSION['id'];
    $reviewName = $_SESSION['name'];
}

if (isset($_POST['ksubmit'])) {

    $kreview = $_POST['kreview'];
    
    if(!isset($_POST['krate'])){
        echo '<script> alert("Please complete the form")</script>';
    }else{
        $kstar = $_POST['krate'];
        $sql = "INSERT INTO `kayakreview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$kstar', '$kreview')";
        $result1 = $conn->query($sql);
    }
}

if (isset($_POST['gsubmit'])) {

    $greview = $_POST['greview'];

    if(!isset($_POST['grate'])){
        echo '<script> alert("Please complete the form")</script>';
    } else {
        $gstar = $_POST['grate'];
        $sql = "INSERT INTO `gokartreview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$gstar', '$greview')";
        $result1 = $conn->query($sql);
    }
}

if (isset($_POST['dsubmit'])) {

    $dreview = $_POST['dreview'];

    if(!isset($_POST['drate'])){
        echo '<script> alert("Please complete the form")</script>';
    } else {
        $dstar = $_POST['drate'];
        $sql = "INSERT INTO `dewanmasreview`(`user_ID`, `name`, `star`, `review`) VALUES ('$userReviewID' ,'$reviewName', '$dstar', '$dreview')";
        $result1 = $conn->query($sql);
    }
}

if (isset($_POST['kdelete'])) {
    $sql = "DELETE FROM `kayakreview` WHERE review_ID=" . $_POST['kdelete'];
    $conn->query($sql);
}

if (isset($_POST["kupdate"])) {
    $kID = $_POST["kupdate"];
    $kupdateReview = $_POST["keditreview"];

    $sqlupdate = "UPDATE `kayakreview` set review ='$kupdateReview' where review_ID='$kID' ";
    $conn->query($sqlupdate);

}

if (isset($_POST['gdelete'])) {
    $sql = "DELETE FROM `gokartreview` WHERE review_ID=" . $_POST['gdelete'];
    $conn->query($sql);
}

if (isset($_POST["gupdate"])) {
    $gID = $_POST["gupdate"];
    $gupdateReview = $_POST["geditreview"];

    $sqlupdate = "UPDATE `gokartreview` set review ='$gupdateReview' where review_ID='$gID' ";
    $conn->query($sqlupdate);
}

if (isset($_POST['ddelete'])) {
    $sql = "DELETE FROM `dewanmasreview` WHERE review_ID=" . $_POST['ddelete'];
    $conn->query($sql);
}

if (isset($_POST["dupdate"])) {
    $dID = $_POST["dupdate"];
    $dupdateReview = $_POST["deditreview"];

    $sqlupdate = "UPDATE `dewanmasreview` set review ='$dupdateReview' where review_ID='$dID' ";
    $conn->query($sqlupdate);
}

if (isset($_POST["mytab"])) {
    $_SESSION['indexB'] = $_POST["mytab"];
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
    <form method="post"><div class="d-flex align-items-start">
        <!-- Three logo at left side to let user press -->
        <form method="post"><div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link <?php if (isset($_SESSION['indexB'])) {if ($_SESSION['indexB'] == 1) {
                echo 'active';}} elseif(!isset($_SESSION['indexB'])){echo 'active';} ?> " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="submit" role="tab" aria-controls="v-pills-home" aria-selected="true" name="mytab" value="1"><img
                    src="logo/kayak-icon 2.png" width="80px" height="80px">Kayak</button>
            <button class="nav-link <?php if (isset($_SESSION['indexB'])) {if ($_SESSION['indexB'] == 2) {
                echo 'active';}} ?> " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="submit" role="tab" aria-controls="v-pills-profile" aria-selected="false" name="mytab" value="2"><img
                    src="logo/go-kart-icon 2.png" width="80px" height="80px">Go Kart</button>
            <button class="nav-link <?php if (isset($_SESSION['indexB'])) {if ($_SESSION['indexB'] == 3) {
                echo 'active';}} ?> " id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                type="submit" role="tab" aria-controls="v-pills-messages" aria-selected="false" name="mytab" value="3"><img
                    src="logo/dewan-mas-icon 2.png" width="80px" height="80px">Dewan</button>
        </div></form>

        <div class="tab-content" id="v-pills-tabContent" style="padding-left: 30px;">

            <!-- First tab -->
            <div class="tab-pane fade <?php if (isset($_SESSION['indexB'])) {if ($_SESSION['indexB'] == 1) {
                echo 'show active';}} elseif(!isset($_SESSION['indexB'])){echo 'show active';} ?> " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                tabindex="0">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Kayak_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Kayak_picture2.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Kayak_picture3.jpg" height="380px" class="d-block w-100" alt="...">
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

                        <h1 class="card-title">About Kayaking</h1><br>
                        <p class="card-text" style="text-align: justify;">Kayak at the UUM recreational lake.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="krate" value="5" id="k5"><label for="k5">☆</label>
                                            <input type="radio" name="krate" value="4" id="k4"><label for="k4">☆</label>
                                            <input type="radio" name="krate" value="3" id="k3"><label for="k3">☆</label>
                                            <input type="radio" name="krate" value="2" id="k2"><label for="k2">☆</label>
                                            <input type="radio" name="krate" value="1" id="k1"><label for="k1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="kreview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="ksubmit">Send
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
                                    $sqlread = "SELECT * FROM `kayakreview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $kreviewuserid = $row['user_ID'];
                                    $kreviewid = $row['review_ID'];
                                    $kreviewname = $row["name"];
                                    $kreviewstar = $row["star"];
                                    $kReview = $row["review"];
                                    $kreviewtime = strtotime($row["timestamp"]);
                                    $kshowTime = date("Y/m/d", $kreviewtime);

                                    //display from database
                                    echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $kreviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $kreviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="kedit" value="' . $kreviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="kdelete" value="' . $kreviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $kreviewstar . ' star(s)     ' . $kshowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $kReview . '</p>
                                            </div>';
                                    if (isset($_POST["kedit"])) {
                                        if ($_POST["kedit"] == $kreviewid) {
                                            $sqledit = "SELECT * FROM `kayakreview` WHERE review_ID=" . $_POST['kedit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='keditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='kupdate' value='$kreviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";

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
            <div class="tab-pane fade <?php if (isset($_SESSION['indexB'])) {if ($_SESSION['indexB'] == 2) {
                echo 'show active';}} ?> " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                tabindex="1">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Go_Kart_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Go_Kart_picture2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Go_Kart_picture3.jpg" class="d-block w-100" alt="...">
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
                        <h1 class="card-title">About Go Kart</h1><br>
                        <p class="card-text" style="text-align: justify;">Litar Go-Kart UUM is the first in the world to
                            be built on campus. Uniquely, Litar Go-Kart UUM built against the clock is the fourth such
                            circuit built in the world and recognized by the Malaysian Automobile Federation. All
                            students can participate with a fee of RM5 for 5 rounds. Interested outsiders can also join
                            with a fee of RM30 for 5 rounds.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="grate" value="5" id="g5"><label for="g5">☆</label>
                                            <input type="radio" name="grate" value="4" id="g4"><label for="g4">☆</label>
                                            <input type="radio" name="grate" value="3" id="g3"><label for="g3">☆</label>
                                            <input type="radio" name="grate" value="2" id="g2"><label for="g2">☆</label>
                                            <input type="radio" name="grate" value="1" id="g1"><label for="g1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="greview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="gsubmit">Send
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
                                    $sqlread = "SELECT * FROM `gokartreview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $greviewuserid = $row['user_ID'];
                                        $greviewid = $row['review_ID'];
                                        $greviewname = $row["name"];
                                        $greviewstar = $row["star"];
                                        $gReview = $row["review"];
                                        $greviewtime = strtotime($row["timestamp"]);
                                        $gshowTime = date("Y/m/d", $greviewtime);

                                        //display from database
                                        echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $greviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $greviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="gedit" value="' . $greviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="gdelete" value="' . $greviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $greviewstar . ' star(s)     ' . $gshowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $gReview . '</p>
                                            </div>';
                                    if (isset($_POST["gedit"])) {
                                        if ($_POST["gedit"] == $greviewid) {
                                            $sqledit = "SELECT * FROM `gokartreview` WHERE review_ID=" . $_POST['gedit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='geditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='gupdate' value='$greviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";
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
            <div class="tab-pane fade <?php if (isset($_SESSION['indexB'])) {if ($_SESSION['indexB'] == 3) {
                echo 'show active';}} ?> " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                tabindex="2">

                <!-- Div that make picture can slide -->
                <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel"
                    style="float: left; height: 450px;width: 660px;">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Dewan_Muadzam_Shah_picture1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Dewan_Muadzam_Shah_picture2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Dewan_Muadzam_Shah_picture3.jpg" class="d-block w-100" alt="...">
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
                        <h1 class="card-title">About Dewan MAS</h1><br>
                        <p class="card-text" style="text-align: justify;">Biggest hall in UUM.
                        </p>

                        <?php 
                        if(isset($_SESSION['logged_in'])){
                            echo '<form method="post">
                            <div class="row">
                                <div class="col-10">
                                    <div class="comment-box ml-2">
                                        <h4>Write a review</h4>
                                        <div class="rating">
                                            <input type="radio" name="drate" value="5" id="d5"><label for="d5">☆</label>
                                            <input type="radio" name="drate" value="4" id="d4"><label for="d4">☆</label>
                                            <input type="radio" name="drate" value="3" id="d3"><label for="d3">☆</label>
                                            <input type="radio" name="drate" value="2" id="d2"><label for="d2">☆</label>
                                            <input type="radio" name="drate" value="1" id="d1"><label for="d1">☆</label>
                                        </div>
                                        <div class="comment-area">
                                            <textarea class="form-control" placeholder="What is your view?" rows="4"
                                                name="dreview" required></textarea>
                                        </div>
                                        <div class="comment-btns mt-2">
                                            <div class="row">
                                                <div class="col-6">
                                                        <button class="btn btn-success send btn-sm" type="submit"
                                                            name="dsubmit">Send
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
                                    $sqlread = "SELECT * FROM `dewanmasreview` WHERE 1";
                                    $result = $conn->query($sqlread);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $dreviewuserid = $row['user_ID'];
                                        $dreviewid = $row['review_ID'];
                                        $dreviewname = $row["name"];
                                        $dreviewstar = $row["star"];
                                        $dReview = $row["review"];
                                        $dreviewtime = strtotime($row["timestamp"]);
                                        $dshowTime = date("Y/m/d", $dreviewtime);

                                        //display from database
                                        echo '<div class="card">
                                            <div class="row d-flex">
                                                <div class="d-flex flex-column">
                                                    <h5 class="mt-2 mb-0">' . $dreviewname;
                                    if (isset($_SESSION['logged_in'])) {
                                        if ($userReviewID == $dreviewuserid) {
                                            echo '<button class="dropdown" data-bs-toggle="dropdown" aria-expanded="false" width="15px" height="15px" style="float: right; border: 0; background-color: white;">
                                                        <img src="logo/option.png" width="15px" height="15px" style="float: right;">
                                                        </button>
                                                        <form method="post"><ul class="dropdown-menu">
                                                          <li><button class="dropdown-item" type="submit" name="dedit" value="' . $dreviewid . '">Edit</button></li>
                                                          <li><button class="dropdown-item" type="submit" name="ddelete" value="' . $dreviewid . '">Delete</button></li>
                                                        </ul></form>';
                                        }
                                    }
                                    echo '</h5><div>
                                                        <p class="text-left"><span class="text-muted">' . $dreviewstar . ' star(s)     ' . $dshowTime . '</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row text-left">
                                                <p class="content">' . $dReview . '</p>
                                            </div>';
                                    if (isset($_POST["dedit"])) {
                                        if ($_POST["dedit"] == $dreviewid) {
                                            $sqledit = "SELECT * FROM `dewanmasreview` WHERE review_ID=" . $_POST['dedit'];
                                            $re = $conn->query($sqledit);
                                            while ($row = mysqli_fetch_assoc($re)) {
                                                echo '<b>Edit above review</b>';
                                                echo " <form method='POST'><input type='text' class='form-control' name='deditreview' value='" . $row["review"] . "' required>";
                                                echo "<button class='btn btn-primary' type='submit' name='dupdate' value='$dreviewid'>Submit</button><span style='padding: 10px;'></span><button class='btn btn-light'><a href=' '></a>Cancel</button></form></center><br>";
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