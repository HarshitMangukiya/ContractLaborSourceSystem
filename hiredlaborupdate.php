<!DOCTYPE html>
<html>
<head>
	<title>hiredlabor update</title>
</head>
<?php
	
if(isset($_REQUEST['hid']))
{
echo $_REQUEST['hid'];
$con=mysqli_connect('localhost','root','','labor');
$qry="select * from hiredlabor where h_id=".$_REQUEST['hid'];
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_row($res))
{
 // $customerid=$row[1];
 $laborid=$row[2];
 // $firstname=$row[3];
 // $lastname=$row[4];
 // $totallabor=$row[5];
 // $totalcharge=$row[6];
}
}

if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','labor');
  
  // $customerid=$_POST['customerid'];
  $laborid=$_POST['laborid'];
  // $firstname=$_POST['firstname'];
  // $lastname=$_POST['lastname'];
  // $totallabor=$_POST['totallabor']; 
  // $totalcharge=$_POST['totalcharge'];
      
  

$qry="update hiredlabor set h_laborid='$laborid' where h_id=".$_REQUEST['hid'];
$res=mysqli_query($con,$qry);
if($res>0)
{
	echo "update record into user table";
   header("location:hiredlaboradmin.php");
}		
else
{
	echo "error not update ";
}
}

?>
<body>

<form method="post" enctype="multipart/form-data">
<!-- customer id:<input type="text" name="customerid" value="<?php echo $customerid; ?>"><br>
 -->Labor id:<input type="text" name="laborid" value="<?php echo $laborid; ?>"><br>
<!-- First Name:<input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
Last Name:<input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
Total Labor:<input type="text" name="totallabor" value="<?php echo $totallabor; ?>"><br>
Total Charge: <input type="text" name="totalcharge" value="<?php echo $totalcharge; ?>"><br>
 --><button type="submit" name="submit">submit</button>
</form>
</body>
</html>