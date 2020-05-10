<!DOCTYPE html>
<html>
<head>
	<title>state admin</title>
	<?php
		if(isset($_REQUEST['ciid']))
		{
			$con=mysqli_connect("localhost","root","","labor");
			$qry="delete from city where ci_id=".$_REQUEST['ciid'];
			$res=mysqli_query($con,$qry);
			if($res==1)
			{
				echo "delete record from city table";
				header("location:cityadmin.php");

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

	$qry="select * from city";
	$res=mysqli_query($con,$qry);
	while($row=mysqli_fetch_row($res))
		{
		?>
		<tr></tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><a href="cityadmin.php?ciid=<?php echo $row[0]; ?>">delete</a></td>		
		<td><a href="cityupdate.php?ciid=<?php echo $row[0]; ?>">edit</a></td>		

		<?php
		}
?>
</table>
<a href="cityinsert.php" style="font-size:40px">insert New</a>
<!-- <button name="logout">logout</button> -->
</form>
</body>
</html>