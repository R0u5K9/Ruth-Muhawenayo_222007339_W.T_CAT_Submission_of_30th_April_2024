<?php

$servername = "localhost";
$username = "root";
$password = "";//this is empty because I din't set any password
 $dbname = "lost_found_items_tracking_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);

$id="";
$fname="";
$em="";
$phn="";
$count="";
$dist="";
$sect="";
$pass="";
$confpass="";

$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //GET METHOD: show the data of item

   if ( !isset($_GET["id"]) ){

   header("Location: Owner.php");
    exit;
   }

    $id = $_GET["id"];

     //read the data of item selected from database table
   $sql = "SELECT * FROM owners WHERE id=$id";
   $result = $connection->query($sql);
   $row = $result->fetch_assoc();

   if (!$row) {

    header("Location: Owner.php");
    exit;
   }

    $fname = $row["fullname"];
    $em = $row["email"];
    $phn = $row["phone"];
    $count = $row["country"];
    $dist = $row["district"];
    $sect = $row["sector"];
    $pass = $row["password"];
    $confpass = $row["confirm_password"];
}
   else{
    //POST METHOD: update the data of item

    $id = $_POST["id"];
    $fname = $_POST["fullname"];
    $em = $_POST["email"];
    $phn = $_POST["phone"];
    $count = $_POST["country"];
    $dist = $_POST["district"];
    $sect = $_POST["sector"];
    $pass = $_POST["password"];
    $confpass = $_POST["confirm_password"];

    do {

       if  ( empty($id) || empty($fname) || empty($em) ||  empty($phn) ||  empty($count) || empty($dist) || empty($sect) ||  empty($pass) ||  empty($confpass) ) {
            $errorMessage = "All fields are required";
            break;
       }
       
     
       $sql = "UPDATE owners SET fullname = '$fname', email = '$em', phone = '$phn', country = '$count', district = '$dist', sector = '$sect', password = '$pass', confirm_password = '$confpass' WHERE id = $id";
    $result = $connection->query($sql);

    if (!$result){
        $errorMessage = "Invalid query: .$connection->error";
        break;
    }
    $successMessage = "item updated successfully";
    header("Location: Owner.php");
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
  <h2> Update user</h2>

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
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Fullname</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="fullname" value="<?php echo $fname; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Email</label>
        <div class="col-sm-6">
            <input type="email" class="form-control" name="email" value="<?php echo $em; ?>">
          </div>
        </div>
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Phone</label>
        <div class="col-sm-6">
            <input type="number" class="form-control" name="phone" value="<?php echo $phn; ?>">
          </div>
        </div>
        
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Country</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="country" value="<?php echo $count; ?>">
          </div>
        </div>
        
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> District</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="district" value="<?php echo $dist; ?>">
          </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Sector</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="sector" value="<?php echo $sect; ?>">
          </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Password</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="password" value="<?php echo $pass; ?>">
          </div>
        </div>

        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Confirm password</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="confirm_password" value="<?php echo $confpass; ?>">
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
        <a class='btn btn-outline-primary btn-sm' href="Owner.php" role="button">cancel</a>
      </div>
        </div>
       
</form>
</div> 
</body>
</html> 