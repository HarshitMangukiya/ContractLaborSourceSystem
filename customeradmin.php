<!DOCTYPE html>
<html>
<head>
	<title>customer admin</title>
	<?php
		if(isset($_REQUEST['cid']))
		{

			  $path="./customer_img/";

			$con=mysqli_connect("localhost","root","","labor");
			$qry="select * from customer where c_id=".$_REQUEST['cid'];
			$res=mysqli_query($con,$qry);
			while($row=mysqli_fetch_row($res))
			{
				$oldimage=$path.$row[13];
				unlink($oldimage);
			}

			$con=mysqli_connect("localhost","root","","labor");
			$qry="delete from customer where c_id=".$_REQUEST['cid'];
			$res=mysqli_query($con,$qry);
			if($res==1)
			{
				echo "delete record from customer table";
				header("location:customeradmin.php");
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

	$qry="select * from customer";
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
		<td><img src="customer_img/<?php echo $row[13]; ?>" width="100px" height=100></td>
		<td><?php echo $row[14];?></td>
		<td><a href="customeradmin.php?cid=<?php echo $row[0]; ?>">delete</a></td>		
		<td><a href="customerupdate.php?cid=<?php echo $row[0]; ?>">edit</a></td>		

		<?php
		}
?>
</table>
<a href="customerinsert.php" style="font-size:40px">insert New</a>&emsp;
<!-- <button name="logout">logout</button> -->
</form>
</body>
</html>