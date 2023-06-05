<?php
include 'connect.php';
session_start(); 

if (!isset($_SESSION['logged_in'])) {
    echo "<script>alert('Please sign in first!');
    location.replace('signin.html');</script>";
    $conn->close();
}

$getID = $_GET['carID'];
$sql = "SELECT * FROM `car` WHERE id=$getID";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$carImage = $row["image"];
$name = $row["name"];
$description = $row["description"];
$seat = $row["seat"];
$gear = $row["gear"];
$luggage = $row["luggage"];
$pickDate = $row["startDate"];
$dropDate = $row["endDate"];
$state = $row["state"];
$bank = $row["bank"];
$bankAccount = $row["bankAccount"];
$price = $row["price"];
$int_price = intval($price);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="icon" href="images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4448303201.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="details.css">
</head>

<?php
include 'header.php'; 
?>

<body>
    <div style="padding-top: 12vh;"></div>
    <div class="card mb-3" style="margin-left: 5rem; margin-right: 5rem; border: 0;">
        <div class="row g-0">
            <div class="col-md-7">
                <img src="<?php echo $carImage; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $name; ?></h3>
                    <hr>
                    <h5>Description</h5>
                    <p class="card-text"><?php echo $description; ?></p>
                    <hr>
                    <h5>Price/day</h5>
                    <p class="card-text">RM <?php echo $price; ?></p>
                    <hr>
                    <h5>Specification</h5>
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="card">
                                    <div class="card-body">
                                        Seat: <?php echo $seat; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card">
                                    <div class="card-body">
                                        Gear: <?php echo $gear; ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="card">
                                    <div class="card-body">
                                        Luggages : <?php echo $luggage; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <h5 class="mb-3">Make Reservation</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-box mb-3">
                            <p style="line-height:1px;">Pick-up/Return Place*</p>
                            <input type="text" name="state" class="form-control" style="width: 50%;"
                                value="<?php echo $state; ?>" readonly></input>
                        </div>
                        <div class="input-box mb-3">
                            <p style="line-height:1px;">Pick-up Date*</p>
                            <input type="date" name="pick" id="pick" class="form-control" style="width: 50%;"
                                onchange="calculatePrice()" required></input>
                        </div>
                        <div class="input-box mb-4">
                            <p style="line-height:1px;">Return Date*</p>
                            <input type="date" name="return" id="return" class="form-control" style="width: 50%;"
                                onchange="calculatePrice()" required></input>
                            <span class="form-text" style="color: red;" id="remind"></span>
                        </div>
                        <div class="mb-4">
                            <b>Total: <span id="total"></span></b>
                        </div>
                        <input type="hidden" name="reserveID" value=" <?php echo $_SESSION['id']; ?> ">
                        <div class="input-box mb-3">
                            <p style="line-height:1px;">Your Name*</p>
                            <input type="text" name="reserveName" class="form-control" style="width: 50%" required></input>
                        </div>
                        <div class="input-box mb-3">
                            <p style="line-height:1px;">Your Phone Number*</p>
                            <input type="text" name="reservePhone" class="form-control" style="width: 50%" required></input>
                        </div>
                        <div class="input-box mb-3">
                            <p style="line-height:1px;">Payment Receipt*</p>
                            <input type="file" name="image" class="form-control" style="width: 65%;" required></input>
                            <div class="form-text">
                                Please make the payment via online banking and upload the payment receipt above.
                            </div>
                            <div class="form-text">Bank: <?php echo $bank; ?></div>
                            <div class="form-text">Account: <?php echo $bankAccount; ?></div>
                        </div>
                        <button type="submit" class="btn" name="reserve">Reserve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
if (isset($_POST['reserve'])) {
    include 'connect.php';
    
    $pick = new DateTime($_POST['pick']);
    $return = new DateTime($_POST['return']);
    $pickAvai = new DateTime($pickDate);
    $returnAvai = new DateTime($dropDate);
    $today = new DateTime();
    $diffToday = $today->diff($pick);
    $diffTwoDate = $pick->diff($return);
    $diffAvai = $pick->diff($return);


    if (!isset($_POST['state'])) {
        echo "<script>alert('Please choose a pick-up/return place');
        location.replace('details.php?carID=".$getID."');</script>";
    } else if ($diffToday->invert == 1) {
        echo "<script>alert('Pick-up date must be after today');
        location.replace('details.php?carID=".$getID."');</script>";
    } else if ($diffTwoDate->invert == 1) {
        echo "<script>alert('Return date must be after pick-up date');
        location.replace('details.php?carID=".$getID."');</script>";
    } else if($pick < $pickAvai || $return > $returnAvai){
        echo "<script>alert('Please ensure you choose the available time');
        location.replace('details.php?carID=".$getID."');</script>";
    } else {
        $reserveState = $_POST['state'];
        $reservePick = $_POST['pick'];
        $reserveReturn = $_POST['return'];
        $reserveID = $_POST['reserveID'];
        $reserveName = $_POST['reserveName'];
        $reservePhone = $_POST['reservePhone'];

        $image = $_FILES["image"];
        $imagefilename = $image['name'];
        $imagefileerror = $image['error'];
        $imagefiletemp = $image['tmp_name'];
        $filename_separate = explode('.', $imagefilename);
        $file_extension = strtolower($filename_separate[1]);
        $extension = array('jpeg', 'jpg', 'png');
        if (in_array($file_extension, $extension)) {
            $upload_image = 'images/' . $imagefilename;
            move_uploaded_file($imagefiletemp, $upload_image);
        }

        $sql = "INSERT INTO `reservation`(`carID`, `state`, `pickDate`, `returnDate`, `reserveID`, `reserveName`, `reservePhone`, `receipt`) VALUES ('$getID','$reserveState','$reservePick','$reserveReturn','$reserveID','$reserveName','$reservePhone', '$upload_image')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Reserve successful');
            location.replace('details.php?carID=".$getID."');</script>";
        } else {
            echo '<script> alert("Register failed");
            history.back();</script>';
        }
    }
    $conn->close();
}
?>

<script>
function calculatePrice() {
    var pick = new Date(document.getElementById("pick").value);
    var ret = new Date(document.getElementById("return").value);
    var today = new Date();
    var dif = pick - today;
    var diff = ret - pick;
    if (pick.getTime() < new Date("<?php echo $pickDate; ?>").getTime() || ret.getTime() > new Date(
            "<?php echo $dropDate; ?>").getTime()) {
        document.getElementById("remind").innerHTML =
            "This car only available from <?php echo $pickDate; ?> to <?php echo $dropDate; ?>";
    }
    if (dif < 0) {
        alert('Pick-up date must be after today');
        location.reload();
    } else if (diff < 0) {
        alert('Return date must be after pick-up date');
        location.reload();
    }
    var daydiff = diff / (1000 * 60 * 60 * 24);
    document.getElementById("total").innerHTML = "RM" + Math.round(daydiff) * <?php echo $int_price ?>;
}
</script>

</html>