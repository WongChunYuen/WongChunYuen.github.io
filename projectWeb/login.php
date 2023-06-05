<?php
include 'connect.php';
// check if the form has been submitted
if (isset($_POST['submit'])) {
    // check if the username and password fields are not empty
    if (!empty($_POST['Email']) && !empty($_POST['psw'])) {
      // get the username and password from the form
      $email = $_POST['Email'];
      $password = sha1($_POST['psw']);
  
      // check if the username and password are correct
      $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
      $result = $conn->query($query);
  
      // if the username and password are correct
      if (mysqli_num_rows($result) == 1) {
        $read = "SELECT * FROM user WHERE email='$email'";
        $resultRead = $conn->query($read);
        $row = mysqli_fetch_assoc($resultRead);
        $saveID = $row['id'];
        $saveName = $row["username"];
        $saveEmail = $row["email"];
        $saveDateReg = $row["datereg"];

            session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['id'] = $saveID;
        $_SESSION['name'] = $saveName;
        $_SESSION['Email'] = $email;
        $_SESSION['dateReg'] = $saveDateReg;
        
        $previous_page = $_SERVER['HTTP_REFERER'];
        header("Location: $previous_page");
      } else {
        // if the username or password is incorrect, display an error message
        echo "<script>alert('Incorrect email or password')</script>";
  
      }
    } else {
      // if the username or password field is empty, display an error message
      echo "<script>alert('Please enter a email and password')</script>";
    }
  }
?>