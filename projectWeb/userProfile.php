<?php
include 'connect.php';

session_start();
$_SESSION["profile"] = true;
$dateReg = strtotime($_SESSION['dateReg']);
$showDate = date("Y-m-d h:i:sa", $dateReg);

if(isset($_POST['edit'])){
  header('Location: editprofile.php?id='.$_SESSION['id']);
}
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
    <link rel="stylesheet" href="userprofile.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<?php 
include 'header.php'; 
?>

<div class="container">
    <h2 class="text-center"><b> Profile </b></h2>
    <form method="post">
        <div class="row">
            <div class="col-25">
                <label for="id">ID</label>
            </div>
            <div class="col-75">
                <?php echo "<p>: " .$_SESSION['id']. "</p>";?>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="username">Username</label>
            </div>
            <div class="col-75">
                <?php echo "<p>: " .$_SESSION['name']. "</p>"; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="email">Email</label>
            </div>
            <div class="col-75">
                <?php echo "<p>: ".$_SESSION['Email']. "</p>"?>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="dateReg">Date of Registration</label>
            </div>
            <div class="col-75">
                <?php echo "<p>: " .$showDate. "</p>"?>
            </div>
        </div>

        <div class="row">
            <button class="btn btn-info" type="submit" name="edit">Edit</button>
        </div>
    </form>
</div>
<script src="script.js"></script>
</body>

</html>