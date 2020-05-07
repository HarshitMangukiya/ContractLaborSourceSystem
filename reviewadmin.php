<!DOCTYPE html>
<html>
<head>
	<title>review display</title>
<!-- Font Awesome Icon Library -->

</style>

</head>
<?php
if(isset($_REQUEST['rid']))
{

$con=mysqli_connect("localhost","root","","labor");

$qry="delete from review where r_id=".$_REQUEST['rid'];
$res=mysqli_query($con,$qry);
if($res==1)
{
	echo "delete record from review table";
	header("location:reviewadmin.php");
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

$qry="select * from review";
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

<td><a href="reviewadmin.php?rid=<?php echo $row[0]; ?>">delete</a></td>		
<td><a href="reviewupdate.php?rid=<?php echo $row[0]; ?>">edit</a></td>		

<?php
}
?>
</table>
<a href="reviewinsert.php" style="font-size:40px">insert New</a>&emsp;
</form>
</body>
</html>