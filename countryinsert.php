<!DOCTYPE html>
<html>
<head>
	<title>insert user</title>
</head>
  <?php
    if(isset($_POST['submit']))
    {
      $con=mysqli_connect('localhost','root','','labor');

      $name=$_POST['name'];

      $qry="insert into country values(0,'$name')";
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	echo "insert record into country table";
           header("location:countryadmin.php");
        }		
        else
        {
        	echo "erro not insert country";
        }
    }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
Country Name:<input type="text" name="name"><br>
<input type="submit" name="submit"><br>
</form>

</body>
</html>