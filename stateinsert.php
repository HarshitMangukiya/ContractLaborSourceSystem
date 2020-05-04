<!DOCTYPE html>
<html>
<head>
	<title>state insert</title>
</head>
  <?php
    
      $con=mysqli_connect('localhost','root','','labor');

    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $country=$_POST['country'];
      //echo $country;
      $qry="insert into state values(0,'$name','$country')";
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	echo "insert record into country table";
           header("location:stateadmin.php");
        }		
        else
        {
        	echo "erro not insert state";
        }
    }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
State Name:<input type="text" name="name"><br>

country Name:
<select name="country">
    <?php
      $qry="select * from country"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {

      ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php
      }
    ?>
</select>
<input type="submit" name="submit"><br>
</form>

</body>
</html>