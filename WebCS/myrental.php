<?php
include 'connect.php';
session_start(); 

if (!isset($_SESSION['logged_in'])) {
    echo "<script>alert('Please sign in first!');
    location.replace('signin.html');</script>";
    $conn->close();
}

$edit = false;

if (isset($_POST['edit'])) {
    $edit = true;
    $pickRead1 = $_POST['hiddenPick'];
    $dropRead1 = $_POST['hiddenReturn'];
}

if (isset($_POST['delete'])) {
    $sql = "DELETE FROM `reservation` WHERE id=" . $_POST['delete'];
    $result = $conn->query($sql);
    
    if($result){
        echo "<script>alert('Delete Successful')</script>";
    }else{
        die(mysqli_error($con));
    }
}

if (isset($_POST['update'])) {
    $edit = false;
    $editID = $_POST['update'];
    $editPick = $_POST['pick'];
    $editReturn = $_POST['return'];
  
    $sqlupdate="UPDATE `reservation` SET pickDate='$editPick', returnDate='$editReturn' WHERE id='$editID'";
    $result = $conn->query($sqlupdate);
    
    if($result){
        echo "<script>alert('Update Successful')</script>";
    }else{
        die(mysqli_error($con));
    }
}

if (isset($_POST['cancel'])) {
    $edit = false;
}
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
</head>

<?php 
include 'header.php'; 
?>

<body>
    <div style="padding-top: 11vh;"></div>
    <div
        style="background-image: url('images/myrental.jpg'); width: 100%; height: 89vh; align-items: center; background-repeat: no-repeat; background-size: 100% 100%;">
        <?php
        $userID = $_SESSION['id'];
        $sql = "SELECT * FROM `reservation` WHERE reserveID = '$userID'";
        $result = $conn->query($sql);
        if ($result) {
        $num = $result->num_rows;
        if (mysqli_num_rows($result) > 0) {
            echo '<h1 style="color: cyan; text-align: center; margin-bottom: 2rem;">Reserved Vehicles: '.$num.'</h1><table style="width: 100%; margin-bottom: 2rem;"><tr>';
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $myReserveID = $row['id'];
                $reserveCarState = $row['state'];
                $reserveCarPick = $row["pickDate"];
                $reserveCarReturn = $row["returnDate"];
                $reserveCarID = $row["carID"];
                
                $sqlread = "SELECT * FROM `car` WHERE id=$reserveCarID";
                $resultread = $conn->query($sqlread);
                $rowread = mysqli_fetch_assoc($resultread);
                $imageRead = $rowread["image"];
                $nameRead = $rowread["name"];
                $pickRead = $rowread["startDate"];
                $dropRead = $rowread["endDate"];
                
                if ($i % 3 == 0) {
                    echo "</tr><tr>";
                }
                echo '<td><form method="post"><div class="card mb-5" style="width: 18rem; margin-left: auto; margin-right: auto;">
                        <img class="card-img-top" src="'.$imageRead.'" alt="Card image cap"><div class="card-body">
                        <h5 class="card-title mb-4">'.$nameRead.'</h5><div class="input-box mb-3"><p style="line-height:1px;">Pick-up/Return Place</p>
                        <input type="text" name="state" class="form-control" style="width: 100%;" value="'.$reserveCarState.'" readonly></input>
                        </div><div class="input-box mb-3"><p style="line-height:1px;">Pick-up Date</p><input type="hidden" name="hiddenPick" value="'.$pickRead.'">
                        <input type="date" name="pick" id="pick" class="form-control" style="width: 100%;" value="'.$reserveCarPick.'" onchange="calculateDate()" required ';
                        if ($edit == false) {echo 'readonly';}
                        echo '></input></div><div class="input-box mb-3"><p style="line-height:1px;">Return Date</p><input type="hidden" name="hiddenReturn" value="'.$dropRead.'">
                        <input type="date" name="return" id="return" class="form-control" style="width: 100%;" value="'.$reserveCarReturn.'" onchange="calculateDate()" required ';
                        if ($edit == false) {echo 'readonly';}
                        echo '></input><span class="form-text" style="color: red;" id="remind"></span></div>';
                        if ($edit == false) {
                        echo '<button class="btn btn-primary" type="submit" name="edit">Edit</button>
                        <button class="btn btn-primary" type="submit" name="delete" value="'.$myReserveID.'">Cancel Reserve</button></div></div></form></td>';
                        }else {
                        echo '<button class="btn btn-primary" type="submit" name="update" value="'.$myReserveID.'">Update</button>
                        <button class="btn btn-primary" type="submit" name="cancel">Cancel</button></div></div></form></td>';
                        }

                        echo '<script>
                        function calculateDate() {
                            var pick = new Date(document.getElementById("pick").value);
                            var ret = new Date(document.getElementById("return").value);
                            var today = new Date();
                            var dif = pick - today;
                            var diff = ret - pick;';
                            
                            if (isset($pickRead1)||isset($pickRead2) ){
                            echo 'if (pick.getTime() < new Date("' . $pickRead1 . '").getTime() || ret.getTime() > new Date(
                                    "' . $dropRead1 . '").getTime()) {
                                document.getElementById("remind").innerHTML =
                                    "This car only available from ' . $pickRead1 . ' to ' . $dropRead1 . '";}';
                            }

                            echo 'if (dif < 0) {
                                document.getElementById("remind").innerHTML = "Pick-up date must be after today";
                            } else if (diff < 0) {
                                document.getElementById("remind").innerHTML = "Return date must be after pick-up date";
                            }
                        }
                        </script>';

                        $i++;
                }
                echo '</tr></table>';
            } else {
            echo '<h1 style="color: cyan; text-align: center; margin-bottom: 2rem;">No available vehicles</h1>';
            }
        }
        $conn->close();
        ?>
    </div>
</body>

</html>