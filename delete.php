<?php 
include('connection.php');
$x=$_REQUEST['Stu_id'];


$query=mysqli_query($con,"select * from users where user_id='$x'");
$res=mysqli_fetch_assoc($query);
$img=$res['pic'];
$email=$res['email'];
		

//delete image
unlink("image/$email/$img");

//delete users directory
rmdir("image/$email");
		
mysqli_query($con,"delete from users where user_id='$x'");

header( "refresh:3;url=index.php" ); 
echo 'Records deleted successfully <br>You\'ll be redirected in about 3 secs.'; 


?>