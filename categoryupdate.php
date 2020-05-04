<!DOCTYPE html>
<html>
<head>
	<title>insert user</title>
</head>
  <?php

    if(isset($_REQUEST['caid']))
      {
        echo $_REQUEST['caid'];
        $con=mysqli_connect('localhost','root','','labor');
        $qry="select * from category where ca_id=".$_REQUEST['caid'];
        $res=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($res))
        {
         $caname=$row[1];
        }
      }
    if(isset($_POST['submit']))
    {
      // $con=mysqli_connect('localhost','root','','labor');

      $name=$_POST['name'];

      $qry="update category set ca_name='$name' where ca_id=".$_REQUEST['caid'];
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	echo "update record into category table";
          header("location:categoryadmin.php");
        }		
        else
        {
        	echo "erro not update category";
        }
    }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
Country Name:<input type="text" name="name" value="<?php echo $caname; ?>"><br>
<input type="submit" name="submit"><br>
</form>
</body>
</html>