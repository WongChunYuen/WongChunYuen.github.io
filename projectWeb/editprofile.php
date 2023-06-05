<?php
include 'connect.php';

$getID = $_GET['id'];
$query = "SELECT * FROM user WHERE id='$getID'";
$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$editName = $row["username"];
$email = $row["email"];
$dateReg = strtotime($row["datereg"]);
$showDate = date("Y-m-d h:i:sa", $dateReg);

if(isset($_POST['update'])){
  
  $updateUsername = $_POST['Name'];
  $updateEmail = $_POST['Email'];
    session_start();
  $_SESSION['name'] = $updateUsername;
  $_SESSION['Email'] = $updateEmail;
  
    $sqlupdate="UPDATE `user` SET username='$updateUsername', email='$updateEmail' WHERE id='$getID'";
        
    $result = $conn->query($sqlupdate);
    if($result){
        echo '<div class="alert alert-success" role="alert"><strong>Success</Strong> Data inserted successfully</div>';
        header('location: userProfile.php');
    }else{
        die(mysqli_error($con));
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="userprofile.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</head>

<?php
session_start();
$_SESSION["profile"] = true;
include 'header.php'; ?>

    <div class="container">
        <h2 class="text-center"><b> Update Profile </b></h2>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="id">ID</label>
                </div>
                <div class="col-75">
                    <input type="text" class="form-control-plaintext" name="id" autocomplte="off"
                        value="<?php echo $id;?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="username">Username</label>
                </div>
                <div class="col-75">
                    <input type="text" class="form-control" placeholder="Username" name="Name" autocomplte="off"
                        value="<?php echo $editName;?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input type="email" class="form-control" placeholder="Email" name="Email" autocomplte="off"
                        value="<?php echo $email;?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Date of Registration</label>
                </div>
                <div class="col-75">
                    <input type="text" class="form-control-plaintext" name="dateReg" autocomplte="off"
                        value="<?php echo $showDate ?>" readonly>
                </div>
            </div>
            <div class="row">
                <button onclick="proUpdate()" type="submit" class="btn btn-info" name='update'>Update</button>
            </div>
        </form>
    </div>

</body>

</html>