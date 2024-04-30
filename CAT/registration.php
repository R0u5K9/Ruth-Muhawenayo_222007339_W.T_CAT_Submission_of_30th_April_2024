<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lost_found_items_tracking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$district= $_POST['district'];
$sector = $_POST['sector'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$sql = "INSERT INTO owners (fullname, email, phone, country, district, sector, password, confirm_password) VALUES ('$fullname','$email','$phone','$country','$district','$sector','$password', '$confirm_password')";
if ($conn->query($sql) === TRUE) {
    echo "successfully registered!";
    header("Location: login1.html");
    exit();

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
