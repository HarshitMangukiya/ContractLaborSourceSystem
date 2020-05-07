<!DOCTYPE html>
<html>
<head>
	<title>payment update</title>
</head>
<?php
	
if(isset($_REQUEST['pid']))
{
echo $_REQUEST['pid'];
$con=mysqli_connect('localhost','root','','labor');
$qry="select * from payment where p_id=".$_REQUEST['pid'];
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_row($res))
{
 // $customerid=$row[1];
 $method=$row[8];
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
  $method=$_POST['method'];
  // $firstname=$_POST['firstname'];
  // $lastname=$_POST['lastname'];
  // $totallabor=$_POST['totallabor']; 
  // $totalcharge=$_POST['totalcharge'];
      
  

$qry="update payment set p_method='$method' where p_id=".$_REQUEST['pid'];
$res=mysqli_query($con,$qry);
if($res>0)
{
	echo "update record into payment table";
   header("location:paymentadmin.php");
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
Labor id:<input type="text" name="laborid" value="<?php echo $laborid; ?>"><br>
 --><!-- First Name:<input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
Last Name:<input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
Total Labor:<input type="text" name="totallabor" value="<?php echo $totallabor; ?>"><br>
Total Charge: <input type="text" name="totalcharge" value="<?php echo $totalcharge; ?>"><br>
 -->
Payment Method:
<input type="radio" name="method" value="online" 
<?php if (isset($method) && $method=="online") echo "checked";?> >online
<input type="radio" name="method" value="cash on delivery"
<?php if (isset($method) && $method=="cash on delivery") echo "checked";?>>Cash on Delivery<br>

 <button type="submit" name="submit">submit</button>
</form>
</body>
</html>