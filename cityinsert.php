<!DOCTYPE html>
  <html>
<head>
	<title>state insert</title>
</head>
  <?php

    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $state=$_POST['state'];
       //echo $state;
     
      $con=mysqli_connect('localhost','root','','labor');
      $qry="insert into city values(0,'$name','$state')";
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	echo "insert record into city table";
          header("location:cityadmin.php");
        }		
        else
        {
        	echo "erro not insert city";
        }
    }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
city Name:<input type="text" name="name"><br>

State Name:
<select name="state">
    <?php
      $qry="select * from state"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {
      ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php
      }
    ?>
</select>
<br>
<input type="submit" name="submit">
</form>
</body>
</html>