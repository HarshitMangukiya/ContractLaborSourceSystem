<!DOCTYPE html>
<html>
<head>
	<title>labor admin</title>
	<?php
		if(isset($_REQUEST['lid']))
		{

			  $path="./labor_img/";

			$con=mysqli_connect("localhost","root","","labor");
			$qry="select * from labor where l_id=".$_REQUEST['lid'];
			$res=mysqli_query($con,$qry);
			while($row=mysqli_fetch_row($res))
			{
				$oldimage=$path.$row[15];
				unlink($oldimage);
			}

			//$con=mysqli_connect("localhost","root","","labor");
			$qry="delete from labor where l_id=".$_REQUEST['lid'];
			$res=mysqli_query($con,$qry);
			if($res==1)
			{
				echo "delete record from labor table";
				header("location:laboradmin.php");
			}
			else
			{
				echo "not delete";
			}
		}
	?>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<table border="2">
<?php

	$con=mysqli_connect("localhost","root","","labor");

	$qry="select * from labor";
	$res=mysqli_query($con,$qry);
	while($row=mysqli_fetch_row($res))
		{
		?>
		<tr></tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><?php echo $row[2];?></td>
		<td><?php echo $row[3];?></td>
		<td><?php echo $row[4];?></td>
		<td><?php echo $row[5];?></td>
		<td><?php echo $row[6];?></td>
		<td><?php echo $row[7];?></td>
		<td><?php echo $row[8];?></td>
		<td><?php echo $row[9];?></td>
		<td><?php echo $row[10];?></td>
		<td><?php echo $row[11];?></td>
		<td><?php echo $row[12];?></td>
		<td><?php echo $row[14];?></td>
		<td><?php echo $row[15];?></td>
		<td><img src="labor_img/<?php echo $row[16]; ?>" width="100px" height=100></td>
		<td><?php echo $row[17];?></td>
		<td><?php echo $row[18];?></td>
		<td><?php echo $row[19];?></td>
		<td><?php echo $row[20];?></td>
		<td><?php echo $row[21];?></td>

		<td><a href="laboradmin.php?lid=<?php echo $row[0]; ?>">delete</a></td>		
		<td><a href="laborupdate.php?lid=<?php echo $row[0]; ?>">edit</a></td>		

		<?php
		}
?>
</table>
<a href="laborinsert.php" style="font-size:40px">insert New</a>&emsp;
<!-- <button name="logout">logout</button> -->
</form>
</body>
</html>