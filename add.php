<!-- 4 add include file for database -->
<?php include_once ("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
  <!-- 2 ADD BOOSTRAP LIBARRY. -->

             <link rel= "stylesheet" href="BootStrap/css/bootstrap.min.css">
  <script src="Bootstrap/js/jquery.min.js"></script>
  <script src="BootStrap/js/popper.min.js"></script>
  <script src="BootStrap/js/bootstrap.min.js"></script>
        


</head>
<body>
<!-- 3 Work in body and make table . -->
	
<div class = "panel panel-default container-fluid">

<div class = "panel-heading">

<h1 style="text-align: center;"> Attendance Management System</h1>	
</div>

<div class="panel-body">
<!--- 8 insert data into databse -->
<?php

     if($_SERVER['REQUEST_METHOD']=='POST'){

        $name=$_POST['name'];
        $fname=$_POST['fname'];
        $email=$_POST['email'];

        if($name=="" || $fname==""|| $email==""){

           echo "<div class='alert alert-danger'>

                 Fields must not be empty!!!;

           </div>";
        }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

         echo "<div class='alert alert-danger'>

                Invalid email format!!!;

           </div>";

        }

     else{
        $query="insert into student(name,fname,email) values ('$name','$fname','$email')";
        $result=$link->query($query);
        if($result){

           echo "<div class='alert alert-success'>

                Data inserted successfully;

           </div>";
        }

}
     }

?>







<!-- 6 - change the botton name and add file index.php  -->
<form method="post">
	<a href="#" class="btn btn-primary">View</a>
	<a href="index.php" class="btn btn-primary pull-right">Back</a>

<!-- Make add student form  -->
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control">    
  </div>

  
   <div class="form-group">
    <label for="name">Father Name:</label>
    <input type="text" name="fname" class="form-control">    
  </div>



   <div class="form-group">
    <label for="name">Email:</label>
    <input type="text" name="email" class="form-control">    
  </div>
	
  <input type="submit" class="btn btn-primary">
	 </form>
</div>	

<div class="panel-footer">
	


</div>
	



</div>



</body>