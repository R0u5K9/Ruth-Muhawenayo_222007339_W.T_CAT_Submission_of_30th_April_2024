<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lost_found_items_tracking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT *FROM admin WHERE username='$username' AND password='$password'";
$result =$conn->query($sql);
if ($result->num_rows >0) {
  header("Location:tables.html");
      exit();
} else {
    echo " invalid credentials";
}

$conn->close();
?>
