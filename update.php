<?php 
include('connection.php');
$x=$_REQUEST['id'];

$query=mysqli_query($con,"select * from users where user_id='$x'");
$res=mysqli_fetch_assoc($query);

print_r($res);



extract($res);

extract($_REQUEST);
if(isset($update))
{
$img=$_FILES['pic']['name'];	
$qua=implode(",",$chk);	

	if($img=="")
	{	
	$query="update users SET name='$n',email='$e',password='$pass',mobile='$m',address='$adds',gender='$gen',qualificaction='$qua',state='$state',dob='$dob' where user_id='$x'";
	mysqli_query($con,$query);	
	}
	else
	{
	//delete old pic 
	unlink("image/$email/$pic");
	move_uploaded_file($_FILES['pic']['tmp_name'],"image/$email/".$_FILES['pic']['name']);	
	
	$query="update users SET name='$n',email='$e',password='$pass',mobile='$m',address='$adds',gender='$gen',qualificaction='$qua',state='$state',dob='$dob',pic='$img' where user_id='$x'";
	mysqli_query($con,$query);	
	
	}
	header( "refresh:2;url=index.php" ); 
	echo '<h3>Records updated successfully</h3>'; 

}

?>
<html>
	<head>
		<title>Update</title>
		
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			<table border="1" style='width:500px;'>
				<tr>
					<td>Enter Your Name</tD>
					<td><input type="text" value="<?php echo $name; ?>" name="n"/></td>
				</tR>
				<tr>
					<td>Enter Your Email</tD>
					<td><input type="email" readonly="readonly"  value="<?php echo $email; ?>" name="e"/></td>
				</tR>
				<tr>
					<td>Enter Your Password</tD>
					<td><input type="password" value="<?php echo $password; ?>" name="pass"/></td>
				</tR>
				<tr>
					<td>Enter Your Mobile</tD>
					<td><input type="number" value="<?php echo $mobile; ?>" name="m"/></td>
				</tR>
				<tr>
					<td>Enter Your Address</tD>
					<td><textarea name="adds"><?php echo $address; ?></textarea></td>
				</tR>
				<tr>
					<td>Select your gender</tD>
					<td>
					
					Male<input type="radio" <?php if($gender=="m"){echo "checked";}	?> value="m" name="gen"/>
					Female<input type="radio" <?php if($gender=="f"){echo "checked";}	?> value="f" name="gen"/>
					</td>
				</tR>
				<tr>
					<td>Your Qualification</tD>
					<td>
					<?php 
					$arr=explode(",",$qualificaction);
					?>
MCA<input type="checkbox" <?php if(in_array("mca",$arr)){echo "checked";} ?> value="mca" name="chk[]"/>
BCA<input type="checkbox" <?php if(in_array("bca",$arr)){echo "checked";} ?> value="bca" name="chk[]"/>
MBA<input type="checkbox" <?php if(in_array("mba",$arr)){echo "checked";} ?> value="mba" name="chk[]"/>
BBA<input type="checkbox" <?php if(in_array("bba",$arr)){echo "checked";} ?> value="bba" name="chk[]"/>
					</td>
				</tR>
				<tr>
					<td>Select Your State</tD>
					<td>
					
					<select name="state">
						<option <?php if($state=="Delhi"){echo "selected";} ?>>Delhi</option>
						<option <?php if($state=="UP"){echo "selected";} ?> >UP</option>
						<option <?php if($state=="Bihar"){echo "selected";} ?>>Bihar</option>
					</select>
					</td>
				</tR>
				<tr>
					<td>Select Your DOB</tD>
					<td><input type="date" value="<?php echo $dob; ?>" name="dob"></td>
				</tR>
				<tr>
					<td>Upload Your profile pic</tD>
					<td>
					<?php $path="image/$email/$pic"; ?>
					<input type="file" name="pic">					
					<img src="<?php echo $path; ?>" width="50px" height="50px"/>
					</td>
				</tR>
				<tr>
			<td align="center" colspan="2">
				<input type="submit" name="update" value="Update"/>
				</td>
				</tR>
			</table>
		</form>
	</body>
</html>