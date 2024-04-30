<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lost_found_items_tracking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT *FROM owners WHERE email='$email' AND password='$password'";
$result =$conn->query($sql);
if ($result->num_rows >0) {
  header("Location:index.php");
      exit();
} else {
    echo " invalid credentials";
}

$conn->close();
?>
