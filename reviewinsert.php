<!DOCTYPE html>
<html>
<head>
	<title>review user</title>
</head>
<?php
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','labor');
    
    $customerid=$_POST['customerid'];
    $laborid=$_POST['laborid'];
    $rating=$_POST['rating'];
    $review=$_POST['review'];
   

$qry="insert into review values(0,'$customerid','$laborid','$rating','$review',NOW())";
$res=mysqli_query($con,$qry);
if($res>0)
{
	echo "insert record into review table";
   header("location:reviewadmin.php");
}		
else
{
	echo "erro not insert review";
}
}
?>

<body>
<form method="post" enctype="multipart/form-data">
customer id:<input type="text" name="customerid"><br>
Labor id:<input type="text" name="laborid"><br>
Rating:<input type="text" name="rating"><br>
Review:<input type="text" name="review"><br>
<input type="submit" name="submit"><br>
</form>
</body>
</html>