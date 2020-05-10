<!DOCTYPE html>
<html>
<head>
	<title>payment display</title>
</head>
<?php
if(isset($_REQUEST['pid']))
{

$con=mysqli_connect("localhost","root","","labor");

$qry="delete from payment where p_id=".$_REQUEST['pid'];
$res=mysqli_query($con,$qry);
if($res==1)
{
	echo "delete record from payment table";
	header("location:paymentadmin.php");
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

$qry="select * from payment";
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

<td><a href="paymentadmin.php?pid=<?php echo $row[0]; ?>">delete</a></td>		
<td><a href="paymentupdate.php?pid=<?php echo $row[0]; ?>">edit</a></td>		

<?php
}
?>
</table>
<a href="paymentinsert.php" style="font-size:40px">insert New</a>&emsp;
</form>
</body>
</html>