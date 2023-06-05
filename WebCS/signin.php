<?php
include 'connect.php';

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = sha1($_POST['psw']);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row["username"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['dateReg'] = $row["datereg"];

        echo "<script>alert('Login Successful')</script>";
        header("Location: index.php");
    } else {
        echo "<script>alert('Your email or password is incorrect.')
            history.back();</script>";
    }
}
$conn->close();
?>