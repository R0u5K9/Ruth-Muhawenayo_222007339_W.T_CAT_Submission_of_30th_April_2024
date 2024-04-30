<?php
if (isset($_GET["id"]) ){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";          //this is empty because I din't set any password
    $dbname = "lost_found_items_tracking_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$sql = " DELETE FROM owners WHERE id=$id";

$connection->query($sql);
}

header("Location: Owner.php");
exit;
?>
