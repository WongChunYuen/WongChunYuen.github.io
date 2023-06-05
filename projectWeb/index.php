<?php
include 'connect.php';
include 'login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <title>UUM TOUR</title>
    <link rel="icon" href="logo/UUMlogo.png">
    <script src="https://kit.fontawesome.com/4448303201.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<?php
session_start();
unset($_SESSION["profile"]);
include 'header.php'; ?>

<!-- Home page for our website
        the background image already include in css (one) -->
<div id="home" class="zero"></div>
<div class="one">
    <div style="padding-top: 160px;">
        <h1 style="font-size: 500%;color: white">Explore UUM's</h1>
        <h1 style="font-size: 500%;color: white">Unique Locations</h1>
        <h4 style="color: white">From minimarkets to golf.</h4>
    </div>
</div>
<div id="map" class="zero"></div>
<!-- Map page -->
<div class="two">
    <div class="div1">
        <!-- This div is for the tooltip for location point A -->
        <div class="icona" id="loca"><a href="detailsPointA.php"><img src="logo/location icon.png" id="logoa"><img
                    src="logo/location icon 2.png" id="logoaa"></a>
            <div class="tooltiptext">
                <div class="card" style="width: 18rem;">
                    <img src="images/Golf_picture1.jpg" class="card-img-top" id="pica1" width="250px" height="130px">
                    <img src="images/Sport_Centre_picture2.jpg" class="card-img-top" id="pica2" width="250px"
                        height="130px">
                    <img src="images/Hidden_Lake_picture2.jpg" class="card-img-top" id="pica3" width="250px"
                        height="130px">
                    <div class="card-body" style="margin-top: 3.2cm">
                        <div style="margin-bottom: 1cm;">
                            <p class="card-text" id="texta1"><b>Golf</b></p>
                            <p class="card-text" id="texta2"><b>Sport Centre</b></p>
                            <p class="card-text" id="texta3"><b>Hidden Lake</b></p>
                        </div>
                        <img src="logo/golf-icon 2.png" id="loga1" width="50px" height="50px">
                        <img src="logo/sport-centre-icon 2.png" id="loga2" width="50px" height="50px"
                            style="margin-left: 20px;">
                        <img src="logo/hidden-lake-icon 2.png" id="loga3" width="50px" height="50px"
                            style="margin-left: 20px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- location point B (not yet put tooltips) -->
        <div class="iconb" id="locb"><a href="detailsPointB.php"><img src="logo/location icon.png" id="logob"><img
                    src="logo/location icon 2.png" id="logoba"></a>
            <div class="tooltiptext">
                <div class="card" style="width: 18rem;">
                    <img src="images/kayak_picture2.png" class="card-img-top" id="picb1" width="250px" height="130px">
                    <img src="images/Go_Kart_picture2.jpg" class="card-img-top" id="picb2" width="250px" height="130px">
                    <img src="images/Dewan_Muadzam_Shah_picture3.jpg" class="card-img-top" id="picb3" width="250px"
                        height="130px">
                    <div class="card-body" style="margin-top: 3.2cm">
                        <div style="margin-bottom: 1cm;">
                            <p class="card-text" id="textb1"><b>Kayak</b></p>
                            <p class="card-text" id="textb2"><b>Go Kart</b></p>
                            <p class="card-text" id="textb3"><b>Dewan MAS</b></p>
                        </div>
                        <img src="logo/kayak-icon 2.png" id="logb1" width="50px" height="50px">
                        <img src="logo/go-kart-icon 2.png" id="logb2" width="50px" height="50px"
                            style="margin-left: 20px;">
                        <img src="logo/dewan-mas-icon 2.png" id="logb3" width="50px" height="50px"
                            style="margin-left: 20px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- location point C (not yet put tooltips) -->
        <div class="iconc" id="locc"><a href="detailsPointC.php"><img src="logo/location icon.png" id="logoc"><img
                    src="logo/location icon 2.png" id="logoca"></a>
            <div class="tooltiptext">
                <div class="card" style="width: 18rem;">
                    <img src="images/Vmall_picture1.jpg" class="card-img-top" id="picc1" width="250px" height="130px">
                    <img src="images/Taman_burung_Unta_picture1.jpg" class="card-img-top" id="picc2" width="250px"
                        height="130px">
                    <div class="card-body" style="margin-top: 3.2cm">
                        <div style="margin-bottom: 1cm;">
                            <p class="card-text" id="textc1"><b>Vmall</b></p>
                            <p class="card-text" id="textc2"><b>Taman Burung Unta</b></p>
                        </div>
                        <img src="logo/vmall-icon 2.png" id="logc1" width="50px" height="50px">
                        <img src="logo/taman-burung-unta-icon 2.png" id="logc2" width="50px" height="50px"
                            style="margin-left: 20px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Text UUM MAP on the right side of map -->
    <div class="div2">
        <h1 style="font-size: 650%; line-height: 70px;"><b style="color: #1d1f84;">UU</b><b
                style="color: #ffc132;">M</b></h1>
        <h1 style="font-size: 600%;"><b>MAP</b></h1>
        <img src="images/arrow line element.png" style="width: 100%;">

        <!-- Text to let user know what to do -->
        <div id="main">
            <h2 style="text-align: justify;">Hover your cursor over the points <span style="color: #1d1f84;">(A,
                    B,
                    and C)</span> of the map. Unique places will be shown in icons.
                <b style="color: #1d1f84;">Click</b> these locations to get more information!
            </h2 style="text-align: justify;">
        </div>

        <!-- Point A place including logo -->
        <div id="parta" style="opacity: 0;">
            <h5><img src="logo/golf-icon 2.png" class="icon">Golf</h5>
            <br>
            <h5><img src="logo/sport-centre-icon 2.png" class="icon">Sport
                Centre</h5>
            <br>
            <h5><img src="logo/hidden-lake-icon 2.png" class="icon">Hidden Lake
            </h5>
        </div>

        <!-- Point B place including logo -->
        <div id="partb" style="opacity: 0;">
            <h5><img src="logo/kayak-icon 2.png" class="icon">Kayak</h5>
            <br>
            <h5><img src="logo/go-kart-icon 2.png" class="icon">Go Kart</h5>
            <br>
            <h5><img src="logo/dewan-mas-icon 2.png" class="icon">Dewan MAS</h5>
        </div>

        <!-- Point C place including logo -->
        <div id="partc" style="opacity: 0;">
            <h5><img src="logo/vmall-icon 2.png" class="icon">Vmall</h5>
            <br>
            <h5><img src="logo/taman-burung-unta-icon 2.png" class="icon">Taman
                Burung Unta</h5>
        </div>
    </div>
</div>

<!-- show and hide logo on rigtside of map when hover location icon -->
<script src="script.js"></script>

</body>

</html>