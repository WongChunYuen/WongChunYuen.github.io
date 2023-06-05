<?php
include 'connect.php';

session_start(); 
$index = false;
$proID = $_SESSION['id'];

if (isset($_POST['edit'])) {
    $index = true;
}

if (isset($_POST['update'])) {
    $index = false;
    $updateUsername = $_POST['name'];
    $updateEmail = $_POST['email'];
  
    $sqlupdate="UPDATE `user` SET username='$updateUsername', email='$updateEmail' WHERE id='$proID'";
    $result = $conn->query($sqlupdate);
    
    if($result){
        $_SESSION['name'] = $updateUsername;
        $_SESSION['Email'] = $updateEmail;
        echo "<script>alert('Update Successful')</script>";
    }else{
        die(mysqli_error($con));
    }
}

$proName = $_SESSION['name'];
$proEmail = $_SESSION['email'];
$proRegDate = strtotime($_SESSION['dateReg']);
$showDate = date("Y-m-d h:i:sa", $proRegDate);
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
    <link rel="stylesheet" href="profile.css">
</head>

<?php
include 'header.php';
?>

<body>
    <div style="padding-top: 11vh;"></div>
    <div class="div1"></div>
    <div class="div2">
        <h1 style="text-align: center;"><b>Profile</b></h1>
        <br>
        <br>
        <form method="post">
            <div class="container">
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 130px;">ID</span>
                    <input type="text" class="form-control" value="<?php echo $proID;?>" disabled>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 130px;">Username</span>
                    <input type="text" class="form-control" name="name" value="<?php echo $proName; ?>" <?php if ($index == false) {
                          echo 'disabled';} ?>>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 130px;">Email</span>
                    <input type="text" class="form-control" name="email" value="<?php echo $proEmail;?>" <?php if ($index == false) {
                          echo 'disabled';} ?>>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" style="width: 130px;">Register Date</span>
                    <input type="text" class="form-control" value="<?php echo $showDate;?>" disabled>
                </div>
                <div class="d-grid col-2">
                    <?php if ($index == false) {
                          echo '<button type="submit" class="btn btn-primary" name="edit">Edit</button>';}
                          else{echo '<button type="submit" class="btn btn-primary" name="update">Update</button>';} 
                          ?>
                </div>
            </div>
        </form>
    </div>
</body>

</html>