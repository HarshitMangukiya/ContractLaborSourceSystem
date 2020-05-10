<!DOCTYPE html>
<html>
<head>
	<title>category admin</title>
	<?php
		if(isset($_REQUEST['caid']))
		{
			$con=mysqli_connect("localhost","root","","labor");
			$qry="delete from category where ca_id=".$_REQUEST['caid'];
			$res=mysqli_query($con,$qry);
			if($res==1)
			{
				echo "delete record from category table";
				header("location:categoryadmin.php");

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

	$qry="select * from category";
	$res=mysqli_query($con,$qry);
	while($row=mysqli_fetch_row($res))
		{
		?>
		<tr></tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
		<td><a href="categoryadmin.php?caid=<?php echo $row[0]; ?>">delete</a></td>		
		<td><a href="categoryupdate.php?caid=<?php echo $row[0]; ?>">edit</a></td>		

		<?php
		}
?>
</table>
<a href="categoryinsert.php" style="font-size:40px">insert New</a>&emsp;
<!-- <button name="logout">logout</button> -->
</form>
</body>
</html>