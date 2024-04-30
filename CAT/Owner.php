<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lost_found_items_tracking_system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>


.button{
    padding: 5px;
background: green;
text-decoration: none;
float: left;
margin-left: 300px;
margin-top: -40px;
border-radius: 5px;
color: #fff;
font-weight: 600;
}
.button2{
    padding: 5px;
background: green;
text-decoration: none;
float: right;
margin-right: 310px;
margin-top: -40px;
border-radius: 5px;
color: #fff;
font-weight: 600;
}
</style>
</head>
<body>
    <div class="container my-5">
        <h2>List of Users</h2>
        <a class="btn btn-primary" href="insertOwners.php" role="button">New user</a>
        <br><br>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>FULLNAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>COUNTRY</th>
                <th>DISTRICT</th>
                <th>SECTOR</th>
                <th>PASSWORD</th>
                <th>CONFIRM PASSWORD</th>
                <th>ACTION</th>
                
</tr>
</thead>
<tbody>
    <tr>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";//this is empty because I din't set any password
    $dbname = "lost_found_items_tracking_system";

    //create connection
    $connection = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($connection->connect_error) {
        die("Connection failed: " .$connection->connect_error);
    }
    //read all row from database table
    $sql= "SELECT * FROM owners";
    $result= $connection->query($sql);
    if(!$result) {
        die("invalid query: " .$connection->error);
    }
    //read data of each row
    while($row = $result->fetch_assoc()){
        echo"
        <tr>
        <td>$row[id]</td>
        <td>$row[fullname]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[country]</td>
        <td>$row[district]</td>
        <td>$row[sector]</td>
        <td>$row[password]</td>
        <td>$row[confirm_password]</td>
        
        <td>
         <a class='btn btn-primary btn-sm' href='ownerupdate.php?id=$row[id]'>Edit</a>
         <a class='btn btn-danger btn-sm' href='deleteowner.php?id=$row[id]' role='button'>delete</a>
       </td>
       </tr>
       ";
    }
    ?>
</tbody>
</table>
</div>
<div class="button">
    <a class='btn' href='tables.html'>Go back</a>
</div>
<div class="button2">
    <a class='btn' href='lost.php'>Next page</a>
</div>
</body>
</html>