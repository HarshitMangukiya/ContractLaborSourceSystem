<!DOCTYPE html>
<html>
<head>
	<title>image display</title>
<!-- Font Awesome Icon Library -->

</style>

</head>
<?php
if(isset($_REQUEST['iid']))
{

  $path="./labor_img/";

		$con=mysqli_connect("localhost","root","","labor");
		$qry="select * from image where i_id=".$_REQUEST['iid'];
		$res=mysqli_query($con,$qry);
		while($row=mysqli_fetch_row($res))
		{
			//$dirpath=$path.$row[0];
			$oldimage=$path.$row[3].'/'.$row[1];
			echo $oldimage;
			unlink($oldimage);
			//echo $dirpath;
			//rmdir($dirpath);
		}


		$con=mysqli_connect("localhost","root","","labor");

		$qry="delete from image where i_id=".$_REQUEST['iid'];
		$res=mysqli_query($con,$qry);
		if($res==1)
		{
			echo "delete record from image table";
			header("location:multiimageadmin.php");
		}
		else
		{
			echo "not delete record";
		}
}
?>

<body>
<form method="post" enctype="multipart/form-data">
<table border="2">
<?php
$con=mysqli_connect("localhost","root","","labor");

$qry="select * from image";
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_row($res))
{
?>
<tr></tr>
<td><?php echo $row[0];?></td>
<td><img src="labor_img/<?php echo $row[3];?>/<?php echo $row[1]; ?>" width="100px" height=100></td>
<td><?php echo $row[2];?></td>
<td><?php echo $row[3];?></td>

<td><a href="multiimageadmin.php?iid=<?php echo $row[0]; ?>">delete</a></td>		
<td><a href="multiimageupdate.php?iid=<?php echo $row[0]; ?>">edit</a></td>		

<?php
}
?>
</table>
<a href="multiimageinsert.php" style="font-size:40px">insert New</a>&emsp;
</form>
</body>
</html>