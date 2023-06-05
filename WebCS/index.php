<?php
include 'connect.php';
session_start(); 

if (!isset($_SESSION['logged_in'])) {
    echo "<script>alert('Please sign in first!');
    location.replace('signin.html');</script>";
    $conn->close();
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
    <link rel="stylesheet" href="index.css">
</head>

<?php 
include 'header.php'; 
?>

<body>
    <div style="padding-top: 11vh;"></div>
    <section class="home">
        <div class="text">
            <h2>Welcome, Yuenwong.</h2><br>
            <h1><span>Looking </span>to<br>rent a car</h1>
        </div>
        <div class="div1"></div>

        <div class="form-container">
            <form method="post" action="">
                <div class="input-box">
                    <span>Pick-up/Return Place</span>
                    <select name="state">
                        <div>
                            <option disabled selected>Choose...</option>
                            <option value="Johor">Johor</option>
                            <option value="Kedah">Kedah</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="Malacca">Malacca</option>
                            <option value="Negeri Sembilan">Negeri Sembilan</option>
                            <option value="Pahang">Pahang</option>
                            <option value="Penang">Penang</option>
                            <option value="Perak">Perak</option>
                            <option value="Perlis">Perlis</option>
                            <option value="Sabah">Sabah</option>
                            <option value="Sarawak">Sarawak</option>
                            <option value="Selangor">Selangor</option>
                            <option value="Terengganu">Terengganu</option>
                        </div>
                    </select>
                </div>
                <div class="input-box">
                    <span>Pick-up Date</span>
                    <input type="date" name="pick" required></input>
                </div>
                <div class="input-box">
                    <span>Return Date</span>
                    <input type="date" name="drop" required></input>
                </div>
                <button type="submit" class="btn" name="search">Search</button>
            </form>
        </div>
    </section>

    <section id="results">
    <?php 
    if (isset($_POST['search'])) {
        $pickDate = $_POST['pick'];
        $dropDate = $_POST['drop'];
        $pick = new DateTime($_POST['pick']);
        $drop = new DateTime($_POST['drop']);
        $today = new DateTime();
        $diffToday = $today->diff($pick);
        $diffTwoDate = $pick->diff($drop);

        if (!isset($_POST['state'])) {
            echo "<script>alert('Please choose a pick-up/return place');
            location.replace('index.php');</script>";
        }else if($diffToday->invert == 1){
            echo "<script>alert('Pick-up date must be after today');
            location.replace('index.php');</script>";
        }else if($diffTwoDate->invert == 1){
            echo "<script>alert('Return date must be after pick-up date');
            location.replace('index.php');</script>";
        }else{
            $state = $_POST['state'];
            $sql = "SELECT * FROM `car` WHERE state LIKE '%$state%' AND '$pickDate' BETWEEN startDate AND endDate AND '$dropDate' BETWEEN startDate AND endDate";
            $result = $conn->query($sql);
            if ($result) {
                $num = $result->num_rows;
                if (mysqli_num_rows($result) > 0) {
                    echo '<h1 style="text-align: center; margin-bottom: 2rem;">Available Vehicles: '.$num.'</h1><table style="width: 100%; margin-bottom: 2rem;"><tr>';
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $carID = $row['id'];
                        $carImage = $row['image'];
                        $carName = $row["name"];
                        $carDes = $row["description"];
                        
                        if ($i % 3 == 0) {
                            echo "</tr><tr>";
                        }
                        echo '<td><div class="card mb-5" style="width: 18rem; margin-left: auto; margin-right: auto;">
                                <img class="card-img-top" src="'.$carImage.'" alt="Card image cap"><div class="card-body">
                                <h5 class="card-title">'.$carName.'</h5><p class="card-text">'.$carDes.'</p>
                                <a href="details.php?carID='.$carID.'" class="btn btn-primary">Details</a></div></div></td>';

                                $i++;
                        }
                        echo '</tr></table>';
                    } else {
                    echo '<h1 style="text-align: center; margin-bottom: 2rem;">No available vehicles</h1>';
                    }
            }
        }    
    }
    $conn->close();
    ?>
    </section>
</body>

</html>