<!DOCTYPE html>
<html lang="en">
<?php
include 'connect.php';

// For Sign up form
if(isset($_POST['signup'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=sha1($_POST['psw']);
  $rPassword=sha1($_POST['psw-repeat']);

  $sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
        //Strcmp is for comparing two variable (password and rPassword)
        if (strcmp($password, $rPassword)!== 0){
            echo '<script> alert("The passwords do not match!")</script>';
            header("Refresh:0");
        } else{
            $conn->query($sql); 
            echo '<script> alert("Register Successfully")</script>';
            header("Location: index.php");
        }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UUM TOUR</title>
    <link rel="icon" href="logo/UUMlogo.png">
    <script src="https://kit.fontawesome.com/4448303201.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <style>
    * {
        box-sizing: border-box
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #797be4;
        margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .registerbtn {
        background-color: #797be4;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }
    </style>

</head>

<?php
session_start();
unset($_SESSION["profile"]);
include 'header.php'; ?>

    <div id="home" style="padding-top: 11vh;"></div>
    <section>
        <form action="" method="post">
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to sign up.</p>
                <hr>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                <hr>

                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button type="submit" class="registerbtn" name="signup">Sign Up</button>
            </div>

            <div class="container signin">
            <p>Already have an account? <a href="#" onclick="document.getElementById('id01').style.display='block'" >Sign in</a>.</p>

            </div>
        </form>
    </section>                    
</body>
</html>