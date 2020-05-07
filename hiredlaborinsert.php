<!DOCTYPE html>
<html>
<head>
	<title>hiredlabor user</title>
</head>
<?php
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','labor');
    
    $customerid=$_POST['customerid'];
    $laborid=$_POST['laborid'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $totallabor=$_POST['totallabor']; 
    $totalcharge=$_POST['totalcharge'];
      

$qry="insert into hiredlabor values(0,'$customerid','$laborid','$firstname','$lastname','$totallabor','$totalcharge',NOW())";
$res=mysqli_query($con,$qry);
if($res>0)
{
	echo "insert record into hiredlabor table";
   header("location:hiredlaboradmin.php");
}		
else
{
	echo "erro not insert hiredlabor";
}
}
?>

<body>
<form method="post" enctype="multipart/form-data">
customer id:<input type="text" name="customerid"><br>
Labor id:<input type="text" name="laborid"><br>
First Name:<input type="text" name="firstname"><br>
Last Name:<input type="text" name="lastname"><br>
Total Labor:<input type="text" name="totallabor"><br>
Total Charge: <input type="text" name="totalcharge"><br>
<input type="submit" name="submit"><br>
</form>
</body>
</html>