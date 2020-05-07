<!DOCTYPE html>
<html>
<head>
	<title>payment user</title>
</head>
<?php
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','labor');
    

    $hiredid=$_POST['hiredid'];
    $customerid=$_POST['customerid'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $method=$_POST['method']; 
    $totalpayment=$_POST['totalpayment'];
      

$qry="insert into payment values(0,'$hiredid','$customerid','$firstname','$lastname','$phone','$address','$pincode','$method','$totalpayment',NOW())";
$res=mysqli_query($con,$qry);
if($res>0)
{
	echo "insert record into payment table";
    header("location:paymentadmin.php");
}		
else
{
	echo "erro not insert payment";
}
}
?>

<body>
<form method="post" enctype="multipart/form-data">
hired id:<input type="text" name="hiredid"><br>
customer id:<input type="text" name="customerid"><br>
First Name:<input type="text" name="firstname"><br>
Last Name:<input type="text" name="lastname"><br>
Phone Number:<input type="text" name="phone"><br>
Address Name:<input type="text" name="address"><br>
Pincode Number:<input type="text" name="pincode"><br>
Payment Method:
<input type="radio" name="method" value="online">online
<input type="radio" name="method" value="cash on delivery">Cash on Delivery<br>
Total Payment: <input type="text" name="totalpayment"><br>
<input type="submit" name="submit"><br>
</form>
</body>
</html>