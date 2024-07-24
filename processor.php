<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'baskado';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// User registration form
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $nida = $_POST['nida'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $img = $_POST['img'];
    $password = $_POST['password'];

    // Insert data into database
    $sql = "INSERT INTO new (name,address,nida,dob,phone,img,password) VALUES ('$name', '$address', '$nida', '$dob', '$phone', '$img', '$password')";
    $result = $conn->query($sql);

    if (!$result) {
        echo "<script>alert('usajili haujakamilika,tafadhali jaribu tena.')</script>";
        
    } else {
        echo "<script>alert('hongera.usajili umekamilika.')</script>" . $sql. "<br>". $conn->error;
        header("location:login.php");
    }
}

$conn->close();
?>