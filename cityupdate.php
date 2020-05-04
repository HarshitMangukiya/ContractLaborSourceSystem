<!DOCTYPE html>
<html>
<head>
	<title>state update</title>
</head>
  <?php

    if(isset($_REQUEST['ciid']))
      {
        echo $_REQUEST['ciid'];
        $con=mysqli_connect('localhost','root','','labor');
        $qry="select * from city where ci_id=".$_REQUEST['ciid'];
        $res=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($res))
        {
         $ciname=$row[1];
         $cisid=$row[2];
        }

        $qry="select * from state where s_id='$cisid'"; 
        $res=mysqli_query($con,$qry);
        while($row=mysqli_fetch_row($res))
        {
          $statename=$row[1];
          //echo $statename;
        }
      
      }
    if(isset($_POST['submit']))
    {
      // $con=mysqli_connect('localhost','root','','labor');

      $city=$_POST['name'];
      $state=$_POST['state'];

      $qry="update city set ci_name='$city',ci_sid='$state' where ci_id=".$_REQUEST['ciid'];
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	echo "update record into state table";
          header("location:cityadmin.php");
        }		
        else
        {
        	echo "erro not update state";
        }
    }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
city Name:<input type="text" name="name" value="<?php echo $ciname; ?>"><br>
state Name: 
<select name="state">
    
     <?php
      $qry="select * from state"; 
      $res=mysqli_query($con,$qry);
      while($row=mysqli_fetch_row($res))
      {
        if($statename==$row[1])
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