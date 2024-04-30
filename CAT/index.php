<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="viewport">
        <title>home</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
            }
header{
    position: fixed;
    background: rgb(35, 35, 52);
    padding: 50px;
    width: 100%;
    height: 30px;
    top: 0;
    
}
.left-area h3{
    color: #fff;
    margin: 0;
    font-size: 22px;
    font-weight: 900;

}
.left-area span{
    color: lightseagreen;
}
.logout-btn{
    padding: 5px;
    background: lightseagreen;
    text-decoration: none;
    float: right;
    margin-right: +50px;
    margin-top: -30px;
    border-radius: 2px;
    color: #fff;
    font-weight: 600;
}
.logout-btn:hover{
    background: darkgreen;
}
.head{
    padding: 10px;
    text-decoration: none;
    float: right;
    margin-right: 300px;
    margin-top: -30px;
    border-radius: 2px;
    color: #fff;

}
.head > a {
  display: inline-block;
  margin-right: 20px;
  text-decoration: none;
  color: #fff;
  padding: 5px 10px;
  border-radius: 5px;
  background-color: #077287;
  transition: background-color 0.3s ease;
}
.head > a:hover {
  background-color: #003d80;
}

.sidebar{
    background: rgb(45, 45, 45);
    margin-top: 80px;
    padding-top: 40px;
    position: fixed;
    left: 0;
    width: 250px;
    height: 100%;
    transition: 0.5s;
    transition-property: left ;
}
.sidebar a{
    color: #fff;
    display: block;
    width: 100%;
    line-height: 70px;
   padding-left: 30px;
    text-decoration: none;
    box-sizing: border-box;
    transition: 0.5s;
    transition-property: background;
}
.sidebar a:hover{
    background: rgb(226, 216, 11);
}
.sidebar i{
    padding-right: 10px;

}
label #sidebar-btn{
    z-index: 1;
    color: #fff;
    position: fixed;
    cursor: pointer;
     top: -40;
    left: 650px;
    font-size: 20px;
    margin: 5px 0;
    transition: 0.5s;
    transition-property: color ;
}
label #sidebar-btn:hover{
    color:yellowgreen ;
}
#check:checked ~ .sidebar{
    left: -200px;
}
#check:checked ~ .sidebar a span{
    display: none;
}
#check:checked ~ .sidebar a{
    font-size: 20px;
    margin-left: 170px;
    width: 80px;
}

   
.content .body{
    margin-left:115px;
    font-style: "roboto", sans-serif;
    color: #e4e4e4;
    font-weight: 600;
    margin-top: 100px;
    display: flex-end;
    justify-content: space-between;
    

}
.content .body .p1 {
    font-family: "roboto", sans-serif;
    font-size: 30px;

}
.content .body .p2 {
    font-family: "roboto", sans-serif;
    font-size: 30px;

}
.p1 span{
    font-size: 50px;
    color: lightseagreen; 
}



</style>
        </head>
        <body>
            <input type="checkbox" id="check">
            <header>
                <label for="check">
                    <i class="fa-sharp fa-solid fa-bars" id="sidebar-btn"></i>
                </label>
                <div class="left-area">
                <h3>LOST AND FOUND ITEMS <span>TRACKING SYSTEM</span></h3>
                </div>
        
            </header>
            <!--header area end -->
             <!--sidebar starts-->

             <div class="sidebar">
                
        <a href="index.php"><i class="fa-solid fa-home"></i><span>Home</span></a>
        <a href="tables.html"><a href="adminform.html"><i class="fa-solid fa-table"></i><span>tables</span></a>
        <a href="about.html"><i class="fa-solid fa-info-circle"></i><span>about</span></a>
        <a href="contact.html"><i class="fa-solid fa-phone"></i><span>contact us</span></a>
        <a href="mainhome.php"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>logout</span></a>
</div>
             <center>
             <div class="content">
<div class="body">
<section>
<p class="p1"> <span>welcome again to our website!</span> <br><br><br><br>
 where your dreams may come true<br>
and what you have lost come back to you.
</p>
</section>
<br><br><br><br><br>


<section>
<p class="p2"> have you asked yourself if you will ever get to see what you have lost once?<br><br>
Congratulations! i want to tell you that it is possible to get back what you have lost once.<br><br><br>
you want to report what you have lost?<a href="lostreport.php"> Click here!</a></p>
</section>

</div>
</div>

    </body>
</html>

