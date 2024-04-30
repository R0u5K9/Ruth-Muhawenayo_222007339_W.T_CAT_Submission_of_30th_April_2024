<?php
if (isset($_GET["item_id"]) ){
    $Iid = $_GET["item_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";          //this is empty because I din't set any password
    $dbname = "lost_found_items_tracking_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$sql = " DELETE FROM found_items WHERE item_id=$Iid";

$connection->query($sql);
}

header("Location: found.php");
exit;
?>