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
	<a href="view.php" class="btn btn-primary">View</a>
	<a href="add.php" class="btn btn-primary pull-right">Add Student</a>
<form method="post">
	<table class="table">
		<thead>
			<tr>
				
             <th>Name</th>
             <th>Father Name</th>
             <th>Email</th>
             <th>Attendance</th>
			</tr>

		</thead>

		<tbody>
         <!--  5 query for lin database ------>
           <?php

                  $query="select * from student";
                  $result=$link->query($query);
                  while ($show=$result->fetch_assoc()) {
                  	# code...

           ?>
<!-- 6 insert column name -->
		<tr>
				
           <td><?php echo $show['name']; ?></td>
           <td><?php echo $show['fname']; ?></td>
           <td><?php echo $show['email']; ?></td>

           <td>
           	
            Present<input required type="radio" name="attendance[<?php echo $show['student_id'] ?>]" value="Present"
            >Absent<input required type="radio"  name="attendance[<?php echo $show['student_id']; ?>]" value="Absent" type="text">

           </td>

			</tr>

		<?php } ?>

		

		</tbody>
		

        <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
        	$att=$_POST['attendance'];
          $date=date('d-m-y');

          $query="select distinct date from atten";
          $result=$link->query($query);
          $b=false;
          if($result->num_rows>0){
          	while($check=$result->fetch_assoc()){

          		if($date==$check['date']){
               $b=true;
               echo "<div class='alert alert-danger'>

                Attendance already taken today!!!;

           </div>";
           }
          	}
          }

             if(!$b){

             	  foreach ($att as $key => $value) {
                   
                   if($value=="Present"){

                   	$query="insert into atten(value,student_id,date) values ('Present',$key,'$date')";
                   	$insertResult=$link->query($query);

                   }



                   else{

                   	$query="insert into atten(value,student_id,date) values ('Absent',$key,'$date')";
                   	$insertResult=$link->query($query);


                   }

             	  	
             	  }


               if($insertResult){
                echo "<div class='alert alert-success'>
 
                 Attendance taken Successfully!!!;
  
                </div>";




               }



             }



        
    

        }

?>

	</table>
	<input class="btn btn-primary" type="submit" value="Take Attendance">
	</form>

	 
</div>	

<div class="panel-footer">
	
<p style="text-align: center;" style="font-size: 40px;"> Copyright by Sharjeel khan!</p>

</div>
	



</div>



</body>