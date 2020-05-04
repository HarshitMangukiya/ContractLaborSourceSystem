<!DOCTYPE html>
<html>
<head>
	<title>state update</title>
</head>
  <?php

    if(isset($_REQUEST['sid']))
      {
        echo $_REQUEST['sid'];
        $con=mysqli_connect('localhost','root','','labor');
        $qry="select * from state where s_id=".$_REQUEST['sid'];
        $res=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($res))
        {
         $sname=$row[1];
         $countryid=$row[2];
        }
      
      }
    if(isset($_POST['submit']))
    {
      // $con=mysqli_connect('localhost','root','','labor');

      $state=$_POST['name'];
      $country=$_POST['country'];

      $qry="update state set s_name='$state',s_cid='$country' where s_id=".$_REQUEST['sid'];
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	echo "update record into state table";
          header("location:stateadmin.php");
        }		
        else
        {
        	echo "erro not update state";
        }
    }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
state Name:<input type="text" name="name" value="<?php echo $sname; ?>"><br>
country Name:
<select name="country">
    
     <?php
      $qry="select * from country"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {
        if($countryid==$row[0])
        {
        ?>
        <option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>     
        <?php
        }
        else
        {
      ?>
        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
      <?php
        }
      }
    ?>
</select>
<input type="submit" name="submit"><br>
</form>

</body>
</html>