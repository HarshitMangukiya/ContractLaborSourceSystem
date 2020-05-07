<!DOCTYPE html>
<html>
<head>
	<title>image user</title>
</head>
<?php
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','labor');
      
      $filetype=$_POST['filetype'];
      $laborid=$_POST['laborid'];
      
      if(isset($_FILES["workimage"]))
      {
          $path="./labor_img/";
          $foldername=$_POST['laborid'];

          
           $myFile = $_FILES['workimage'];
            $fileCount = count($myFile["name"]);

                for ($i = 0; $i < $fileCount; $i++) {

                  $target_file = $path.basename($_FILES["workimage"]["name"][$i]);
                  //Select file type
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                  //Valid file extensions
                  $extensions_arr = array("jpg","jpeg","png","gif");
                  //Check extension
                  $imgSize = $_FILES['workimage']['size'][$i];

 
                  if(in_array($imageFileType,$extensions_arr) )
                  {
                  
                    if($imgSize < 5000000)   
                    {
                      $myimg=time().$_FILES['workimage']["name"][$i];
                      //echo $myimg;
                      
                      $qry="insert into image values(0,'$myimg','$filetype','$laborid')";
                      //echo $qry;
                      $res=mysqli_query($con,$qry);
                      if($res>0)
                      {
                        echo "insert record into image table";
                        header("location:multiimageadmin.php");
                      }   
                      else
                      {
                        echo "erro not insert image";
                      }


                      $targetpath=$path.$foldername."/".$myimg;
                      if(move_uploaded_file($_FILES['workimage']['tmp_name'][$i],$targetpath))
                      {
                        echo "insert multi image";
                      }

                    }
                    else
                    {
                      echo "file size too large";
                    }
                  }
                  else
                  {
                    echo "please Select valid extention front image file";
                  }

                    ?>
                        <p>File #<?= $i+1 ?>:</p>
                         <p>
                            Name: <?= $_FILES['workimage']["name"][$i] ?><br>
                            Temporary file: <?= $_FILES['workimage']["tmp_name"][$i] ?><br>
                            Type: <?= $_FILES['workimage']["type"][$i] ?><br>
                            Size: <?= $_FILES['workimage']["size"][$i] ?><br>
                            Error: <?= $_FILES['workimage']["error"][$i] ?><br>
                        
                        </p>
                    <?php
                }
        }
        else
        {
          echo "please Select image file";
        }

}
?>

<body>
<form method="post" enctype="multipart/form-data">
labor id:<input type="text" name="laborid"><br>
file type:
<input type="radio" name="filetype" value="1">image
<input type="radio" name="filetype" value="2">Video<br>
workimage:<input type="file" name="workimage[]" multiple><br>
<input type="submit" name="submit"><br>
</form>
</body>
</html>