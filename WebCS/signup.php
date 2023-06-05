<?php
include 'connect.php';

if (isset($_POST['signup'])) {
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=sha1($_POST['psw']);
    $rePassword=sha1($_POST['re-psw']);

    if (strcmp($password, $rePassword) !== 0) {
        echo '<script> alert("The passwords do not match!");
        history.back();</script>';
    }else{
        $sqlread = "SELECT email FROM user WHERE email='" . $email . "'";
        $result = $conn->query($sqlread);

        if ($result -> num_rows > 0) {
            echo '<script> alert("Unsuccessful registration !\nEmail: ' . $email . ' already used for registration");
             history.back();</script>';
        } else {
            $sql = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";

            if ($conn->query($sql) === TRUE) {
                echo '<script> alert("Register Successful");
                location.replace("signin.html");</script>';
            } else {
                echo '<script> alert("Register failed");
                history.back();</script>';
            }
        }
    }
}
$conn->close();
?>