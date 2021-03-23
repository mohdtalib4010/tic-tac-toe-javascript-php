<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "mygame";

$con = mysqli_connect("$host","$user","$pass","$db");

if($con){
}
else {
  echo "failed";
}
?>