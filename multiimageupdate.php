<!DOCTYPE html>
<html>
<head>
	<title>image update</title>
</head>
<?php
	
if(isset($_REQUEST['iid']))
{
echo $_REQUEST['iid'];
$con=mysqli_connect('localhost','root','','labor');
$qry="select * from image where i_id=".$_REQUEST['iid'];
$res=mysqli_query($con,$qry);
while($row=mysqli_fetch_row($res))
{
  $workimage=$row[1];
  $filetype=$row[2];
  $foldername=$row[3];
}
}

if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','labor');

   if($_FILES["workimage"]["name"]!=null)
      {

        $path="./labor_img/";
        $oldimage=$path.$foldername.'/'.$workimage;
        unlink($oldimage);

        $target_file = $path.basename($_FILES["workimage"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");
        // Check extension  
        $imgSize = $_FILES['workimage']['size'];
        
        if(in_array($imageFileType,$extensions_arr) )
        {
            if($imgSize < 5000000)   
            {

            	$myimg=time().$_FILES['workimage']['name'];
    		    	echo $myimg;

    		    	$targetpath=$path.$foldername."/".$myimg;
        			if(move_uploaded_file($_FILES['workimage']['tmp_name'],$targetpath))
        			{
        				echo "insert image";
        			}
             
            }
            else{
              echo "Sorry, your file is too large.";
            }
              
        }
        else
        {
          echo "please Select front image file";
        }
      }
      else
      { 
        $flag=1;
      }
      $filetype=$_POST['filetype'];

  if($flag==1)
  {
    $qry="update image set i_flag='$filetype' where i_id=".$_REQUEST['iid'];
    $flag=0;
  }
  else
  {
    $qry="update image set i_name='$myimg',i_flag='$filetype' where i_id=".$_REQUEST['iid'];  
  }

  $res=mysqli_query($con,$qry);
  if($res>0)
  {
  	echo "update record into user table";
    header("location:multiimageadmin.php");
  }		
  else
  {
  	echo "error not update ";
  }
}

?>
<body>

<form method="post" enctype="multipart/form-data">
file type:
<input type="radio" name="filetype" value="1" 
<?php if (isset($filetype) && $filetype=="1") echo "checked";?>>image
<input type="radio" name="filetype" value="2"
<?php if (isset($filetype) && $filetype=="2") echo "checked";?>>Video<br>
Image Name:<input type="file" name="workimage"><br>
<button type="submit" name="submit">submit</button>
</form>
</body>
</html>