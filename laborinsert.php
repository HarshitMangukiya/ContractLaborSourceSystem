<!DOCTYPE html>
<html>
<head>
	<title>insert labor</title>
  <script src="jquery.js"></script>
  <script type="text/javascript">

$(document).ready(function(){

$('#country').on('change',function(){

var countryID = $(this).val();

  if(countryID){

    $.ajax({

      type:'POST',

      url:'ajaxdata.php',

      data:'country_id='+countryID,

      success:function(html){

      $('#state').html(html);

      $('#city').html('<option value="">Select state first</option>');

    }

    });

  }
  else{

  $('#state').html('<option value="">Select country first</option>');

  $('#city').html('<option value="">Select state first</option>');

  }

  });

$('#state').on('change',function(){

  var stateID = $(this).val();

    if(stateID){

        $.ajax({

        type:'POST',

        url:'ajaxdata.php',

        data:'state_id='+stateID,

        success:function(html){

        $('#city').html(html);

        }

        });

    }else{

    $('#city').html('<option value="">Select state first</option>');

    }

});

});

</script>
</head>
  <?php
    if(isset($_POST['submit']))
    {
      $con=mysqli_connect('localhost','root','','labor');

      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $gender=$_POST['gender'];
      $age=$_POST['age'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $aadharno=$_POST['aadharno']; 
      $address=$_POST['address'];
      $location=$_POST['location'];
      $country=$_POST['country'];
      $state=$_POST['state'];
      $city=$_POST['city'];
      $pincode=$_POST['pincode'];
      $password=$_POST['password'];
      $about=$_POST['about'];
      
          $path="./labor_img/";
         // $foldertitle=$firstname."_".rand(1000,1000000);

          $target_file = $path.basename($_FILES["fimage"]["name"]);
          // Select file type
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          // Valid file extensions
          $extensions_arr = array("jpg","jpeg","png","gif");
          // Check extension
          $imgSize = $_FILES['fimage']['size'];

          if(in_array($imageFileType,$extensions_arr) )
          {
          
          if($imgSize < 5000000)   
          {
           $myimg=$firstname.time().$_FILES['fimage']['name'];
           //echo $myimg;

            if(move_uploaded_file($_FILES['fimage']['tmp_name'],$path.$myimg))
            {
              echo "insert image";
            }

          // if(!is_dir($path.$foldertitle))
          // {
          // mkdir($path.$foldertitle);      
          // $myimg=$firstname.time().$_FILES['fimage']['name'];
          // echo $myimg;

          // $targetpath=$path.$foldertitle."/".$myimg;
          //   if(move_uploaded_file($_FILES['fimage']['tmp_name'],$targetpath))
          //   {
          //     echo "insert image";
          //   }
          // }
           
          }
          else
          {
           echo "Sorry, your file is too large.";
          }
                
          }
          else
          {
            echo "please Select front image file";
          }


      $status=$_POST['status'];
      $charge=$_POST['charge'];
      $category=$_POST['category'];
      $leaderid=$_POST['leaderid'];

      $qry="insert into labor values(0,'$firstname','$lastname','$gender','$age','$email','$phone','$aadharno','$address','$location','$country','$state','$city','$pincode','$password','$about','$myimg','$status','$charge',NOW(),'$category','$leaderid')";
      $res=mysqli_query($con,$qry);
        if($res>0)
        {
        	echo "insert record into customer table";
          header("location:laboradmin.php");
        }		
        else
        {
        	echo "erro not insert customer";
        }
    }
  ?>

<body>
<form method="post" enctype="multipart/form-data">
First Name:<input type="text" name="firstname"><br>
Last Name:<input type="text" name="lastname"><br>
gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male<br>
Age:<input type="text" name="age"><br>
Email:<input type="text" name="email"><br>
Phone number:<input type="text" name="phone"><br>
Aadhar number:<input type="text" name="aadharno"><br>
Address:<input type="text" name="address"><br>
Location:<input type="text" name="location"><br>

<div class="select-boxes">
<?php

//Include database configuration file

include('dbConfig.php');

//Get all country data

$query = $con->query("SELECT * FROM country");

//Count total number of rows

$rowCount = $query->num_rows;

?>
Country Name:
<select name="country" id="country">

<option value="">Select Country</option>

<?php

  if($rowCount > 0){

    while($row = $query->fetch_assoc()){

    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Country not available</option>';
  }

?>

</select>
<br>
State Name:
<select name="state" id="state">

<option value="">Select state first</option>

</select>
<br>
City Name:
<select name="city" id="city">

<option value="">Select state first</option>

</select>

</div>

pincode Name:<input type="text" name="pincode"><br>
password Name:<input type="password" name="password"><br>
about Name:<input type="text" name="about"><br>
Image Name:<input type="file" name="fimage"><br>
status:
<input type="radio" name="status" value="available">available
<input type="radio" name="status" value="unavailable">unavailable<br>
charge :<input type="text" name="charge"><br>

category Name:
<select name="category">
<!-- <option value="">select category</option> -->
    <?php
      $qry="select * from category"; 
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
leader :<input type="text" name="leaderid"><br>

<input type="submit" name="submit"><br>
</form>
</body>
</html>