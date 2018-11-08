<?php

// first make connection with database
$host= "localhost";
$dbName ="st_attendance";
$user = "root";
$pass="";

$link=new mysqli($host,$user,$pass,$dbName);

  if($link){
     echo "";

  }else{

  	echo "error";
  }

?>