<?php

$servername = "localhost";
$username = "root";
$password = "";//this is empty because I din't set any password
 $dbname = "lost_found_items_tracking_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$Iid="";
$Iname="";
$desc="";
$locat="";
$fdate="";

$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //GET METHOD: show the data of item

   if ( !isset($_GET["item_id"]) ){

   header("Location: found.php");
    exit;
   }

    $Iid = $_GET["item_id"];

     //read the data of item selected from database table
   $sql = "SELECT * FROM found_items WHERE item_id=$Iid";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   if (!$row) {

    header("Location: found.php");
    exit;
   }

    $Iname = $row["item_name"];
    $desc = $row["description"];
    $locat = $row["location_lost"];
    $fdate = $row["found_date"];
}
   else{
    //POST METHOD: update the data of item

    $Iid = $_POST["item_id"];
    $Iname = $_POST["item_name"];
    $desc = $_POST["description"];
    $locat = $_POST["location_lost"];
    $fdate = $_POST["found_date"];

    do {

       if  ( empty($Iid) || empty($Iname) || empty($desc) ||  empty($locat) ||  empty($fdate) ) {
            $errorMessage = "All fields are required";
            break;
       }

       $sql = "UPDATE found_items SET item_name='$Iname', description='$desc', location_lost='$locat', found_date='$fdate' WHERE item_id= $Iid";
    $result = $connection->query($sql);

    if (!$result){
        $errorMessage = "Invalid query: .$connection->error";
        break;
    }
    $successMessage = "item updated successfully";
    header("Location: found.php");
    exit;
    
    } while (false);

   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>lost_found_items_tracking_system</title>

  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
    body{
    margin: 0;
                padding: 0;
                font-family: "roboto", sans-serif;
                margin-left: 0px;
    background: url("img/images.jpeg") no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
    font-size: 25px;
    font-weight: 600;
    color:lightseagreen;
}
    </style>
</head>
<body>
<div class="container my-5">
  <h2> Update item</h2>

  <?php
if (!empty($errorMessage) ) {
  echo"
  <div class='alert alert-warning  alert-dismissible fade show' role='alert'>
  <strong>$errorMessage</strong>
  <button type='button' class='btn-close' data-bs-dismiss='alert aria-label='Close'></button>
  </div>
  ";
}
?>

<form method="post">
    <input type="hidden" name="item_id" value="<?php echo $Iid; ?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Item name</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="item_name" value="<?php echo $Iname; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> description</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="description" value="<?php echo $desc; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Location where item was found</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="location_lost" value="<?php echo $locat; ?>">
          </div>
        </div>
        
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Date of found</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="found_date" value="<?php echo $fdate; ?>">
          </div>
        </div>
        

        <?php
        if (!empty($successMessage) ){
            echo"
            <div class='row mb-3>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>  
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            </div>
            </div>
            ";
        }
        ?>

        <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

        <div class="col-sm-3 d-grid">
        <a class='btn btn-outline-primary btn-sm' href="found.php" role="button">cancel</a>
      </div>
        </div>
       
</form>
</div> 
</body>
</html> 
