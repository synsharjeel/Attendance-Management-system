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
<!-- 7 add file add.php -->
	<a href="#" class="btn btn-primary">View</a>
	<a href="add.php" class="btn btn-primary pull-right">Add</a>
<form method="post">
	<table class="table">
		<thead>
			<tr>
				
             <th>Sr No.</th>
             <th>Name</th>
             <th>Father Name</th>

             <th>Email</th>
             <th>Attendance</th>
             
			</tr>

		</thead>


    <?php 

if($_GET['date']){
    $date=$_GET['date'];


    $query="SELECT student.*,atten.*
     from atten 
    inner join student on atten.student_id = student.student_id and atten.date=
    '$date'";
    $result=$link->query($query);

    if($result->num_rows>0){

        $i=0;
        while($val=$result->fetch_assoc()){

          $i++;
  
    ?>

		<tr>
    
<td><?php echo $i; ?></td>

<td><?php echo $val['name']; ?></td>
<td><?php echo $val['fname']; ?></td>
<td><?php echo $val['email']; ?></td>

<td>
  Present <input type="radio" name=""
     value="Present" 

     <?php 

     if($val['value']=='Present')
        echo "checked";
?>
  >


Absent <input type="radio" name=""
     value="Absent" 

     <?php 

     if($val['value']=='Absent')
        echo "checked";
?>
  >






</td>


    </tr>

<?php  }} }?>
		

	
	 
</div>	

<div class="panel-footer">
	
<p style="text-align: center;" style="font-size: 40px;"> Copyright by Sharjeel khan!</p>

</div>
	



</div>



</body>