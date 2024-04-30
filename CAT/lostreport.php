<?php

$servername = "localhost";
    $username = "root";
    $password = "";//this is empty because I din't set any password
    $dbname = "lost_found_items_tracking_system";

      //create connection
      $connection = new mysqli($servername, $username, $password, $dbname);


$Iname="";
$desc="";
$locat="";
$ldate="";

$errorMessage ="";
$successMessage ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Iname = $_POST["item_name"];
$desc = $_POST["description"];
$locat = $_POST["location"];
$ldate = $_POST["lost_date"];

do {
  
if (empty($Iname) ||  empty($desc) ||  empty($locat) ||  empty($ldate) ) {
  $errorMessage = "All fields are required";
  break;
}
// add new item to database

$sql = "INSERT INTO lost_items(item_name, description, location, lost_date) " . "VALUES('$Iname', '$desc', '$locat', '$ldate')";
$result= $connection->query($sql);

if (!$result) {
  $errorMessage = " invalid query: ". $connection->error;
  break;

}

$Iname="";
$desc="";
$locat="";
$ldate="";

$successMessage ="Item added correctly";



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
    background: url("img/comp.jpg") no-repeat;
    background-position: center;
    background-size: cover;
    height: 100vh;
    font-size: 25px;
    font-weight: 600;
    color:lightseagreen;
}
h2{
    font-size: 40px;
    font-weight: 700;
    color: white;
}
.button{
    padding: 5px;
background: green;
text-decoration: none;
float: left;
margin-left: 5px;
margin-top: 100px;
border-radius: 5px;
color: #fff;
font-weight: 600;
}
    </style>
</head>
<body>
<div class="container my-5">
  <h2> New lost item</h2>
  <br>
  <br>
  

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
        <label class="col-sm-3 col-form-label"> Location where item was lost</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="location" value="<?php echo $locat; ?>">
          </div>
        </div>
        
        <div class="row mb-3">
        <label class="col-sm-3 col-form-label"> Date of lost</label>
        <div class="col-sm-6">
            <input type="date" class="form-control" name="lost_date" value="<?php echo $ldate; ?>">
          </div>
        </div>
        <div class="button">
    <a class='btn' href='index.php'>Go back</a>
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
        <a href="lostreport.php" id="cancel" name="cancel" class="btn btn-danger">Cancel</a>
      </div>
        </div>
       
</form>
</div> 
</body>
</html> 