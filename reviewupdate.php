<!DOCTYPE html>
<html>
<head>
	<title>review update</title>
</head>
<?php
	
if(isset($_REQUEST['rid']))
{
echo $_REQUEST['rid'];
$con=mysqli_connect('localhost','root','','labor');
$qry="select * from review where r_id=".$_REQUEST['rid'];
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_row($res))
{
  $rating=$row[3];
  $review=$row[4];
}
}

if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','labor');
  
  $rating=$_POST['rating'];
  $review=$_POST['review'];
    
$qry="update review set r_rating='$rating',r_review='$review' where r_id=".$_REQUEST['rid'];
$res=mysqli_query($con,$qry);
if($res>0)
{
	echo "update record into user table";
   header("location:reviewadmin.php");
}		
else
{
	echo "error not update ";
}
}

?>
<body>

<form method="post" enctype="multipart/form-data">
Rating:<input type="text" name="rating" value="<?php echo $rating; ?>"><br>
Review :<input type="text" name="review" value="<?php echo $review; ?>"><br>
<button type="submit" name="submit">submit</button>
</form>
</body>
</html>