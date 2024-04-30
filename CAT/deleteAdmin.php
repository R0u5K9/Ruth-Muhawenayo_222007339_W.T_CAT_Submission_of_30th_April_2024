<?php
if (isset($_GET["admin_id"]) ){
    $id = $_GET["admin_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";          //this is empty because I din't set any password
    $dbname = "lost_found_items_tracking_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$sql = " DELETE FROM admin WHERE admin_id=$id";

$connection->query($sql);
}

header("Location: admin.php");
exit;
?>