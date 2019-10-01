<?php 
include('connection.php');
extract($_REQUEST);
if(isset($save))
{
	$query="select * from users where email='$e' ";
	$sql=mysqli_query($con,$query);
	
	//select record
	$row=mysqli_num_rows($sql);	
	if($row==1)
	{
		echo "<h3 style='color:red;margin-left:100px'>This email alredy exists</h3>";
	}
	else
	{
			
		
	//encrypt
	$pass=md5($pass);
	
	//image
	$image=$_FILES['pic']['name'];
	
	
	//qualification
	$qua=implode(",",$chk);
	
	
	$query="insert into users values('','$n','$e','$pass','$m','$adds','$gen','$qua','$state','$dob','$image',now())";
	
	//upload image
	mkdir("image/$e");
	move_uploaded_file($_FILES['pic']['tmp_name'],"image/$e/".$_FILES['pic']['name']);
	
	
	if(mysqli_query($con,$query))
	{
	echo "<h3 style='color:blue;margin-left:100px'>Records Saved Successfully <br></h3>";	
	}
	else
	{
		echo "Some error while executing query";
		
	}
	
		

	}
	
}




?>
<html>
	<head>
		<title>Registration Form</title>
		<script>
			function deleteRecord(x)
			{
				if(confirm("You want to delete  ?"))
				{
				window.location.href='delete.php?Stu_id='+x;	
					
				}					
			}
		</script>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			<table border="1" style='width:40%;float:left;margin-left:5%'>
				<tr>
					<td>Enter Your Name</tD>
					<td><input type="text" name="n"/></td>
				</tR>
				<tr>
					<td>Enter Your Email</tD>
					<td><input type="email" name="e"/></td>
				</tR>
				<tr>
					<td>Enter Your Password</tD>
					<td><input type="password" name="pass"/></td>
				</tR>
				<tr>
					<td>Enter Your Mobile</tD>
					<td><input type="number" name="m"/></td>
				</tR>
				<tr>
					<td>Enter Your Address</tD>
					<td><textarea name="adds"></textarea></td>
				</tR>
				<tr>
					<td>Select your gender</tD>
					<td>
					Male<input type="radio" value="m" name="gen"/>
					Female<input type="radio" value="f" name="gen"/>
					</td>
				</tR>
				<tr>
					<td>Your Qualification</tD>
					<td>
					MCA<input type="checkbox" value="mca" name="chk[]"/>
					BCA<input type="checkbox" value="bca" name="chk[]"/>
					MBA<input type="checkbox" value="mba" name="chk[]"/>
					BBA<input type="checkbox" value="bba" name="chk[]"/>
					</td>
				</tR>
				<tr>
					<td>Select Your State</tD>
					<td>
					
					<select name="state">
						<option value="">Select  State</option>
						<option>Delhi</option>
						<option>UP</option>
						<option>Bihar</option>
					</select>
					</td>
				</tR>
				<tr>
					<td>Select Your DOB</tD>
					<td><input type="date" name="dob"></td>
				</tR>
				<tr>
					<td>Upload Your profile pic</tD>
					<td><input type="file" name="pic"></td>
				</tR>
				<tr>
			<td align="center" colspan="2">
				<input type="submit" name="save" value="Save Data"/>
				</td>
				</tR>
			</table>
		</form>
	</body>
</html>

<?php 
//display All records
	echo "<table border='1' style='width:40%;float:left;margin-left:2%'>";
	echo "<Tr><th>Sr.No</th><th>Name</th><th>Email</th>
	<th>Mobile</th><th>Image</th><th>Update</th><th>Delete</th></tR>";
	
	$sql=mysqli_query($con,"select * from users");
	$i=1;
	while($res=mysqli_fetch_assoc($sql))
	{
	$id=$res['user_id'];	
	$email=$res['email'];
	$img=$res['pic'];	
	
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$res['name']."</td>";
	echo "<td>".$email."</td>";
	echo "<td>".$res['mobile']."</td>";
	echo "<td><img src='image/$email/$img'
	width='100px'/></td>";
	
	echo "<td><a href='update.php?id=$id'>Update</a></td>";
	echo "<td><a href='#' onclick='deleteRecord(".$id.")'>Delete</a></td>";
	
	echo "</tr>";
	$i++;
	}
	echo "</table>";
?>