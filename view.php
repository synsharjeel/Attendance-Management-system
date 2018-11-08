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
             <th>Date</th>
             <th>View</th>
             
			</tr>

		</thead>


    <?php 
    $query="select distinct date from atten";
    $result=$link->query($query);

    if($result->num_rows>0){

        $i=0;
        while($val=$result->fetch_assoc()){

          $i++;
  
    ?>

		<tr>
    
<td><?php echo $i; ?></td>

<td><?php echo $val['date']; ?></td>

<td><a href="viewp.php?date=<?php echo $val['date']?>" class="btn btn-primary">View</a></td>

    </tr>

<?php  }} ?>
		

	
	 
</div>	

<div class="panel-footer">
	
<p style="text-align: center;" style="font-size: 40px;"> Copyright by Sharjeel khan!</p>

</div>
	



</div>



</body>