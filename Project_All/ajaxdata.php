<?php

include('Labor/dbConfig.php'); //Include database configuration file

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){

//Get all state data

$query = $con->query("SELECT * FROM state WHERE s_cid = ".$_POST['country_id']." ");

//Count total number of rows

$rowCount = $query->num_rows;

//Display states list

if($rowCount > 0){

echo '<option value="">Select state</option>';

while($row = $query->fetch_assoc()){

echo '<option value="'.$row['s_id'].'">'.$row['s_name'].'</option>';

}

}else{

echo '<option value="">State not available</option>';

}

}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){

//Get all city data

$query = $con->query("SELECT * FROM city WHERE ci_sid = ".$_POST['state_id']." ");

//Count total number of rows

$rowCount = $query->num_rows;

//Display cities list

if($rowCount > 0){

echo '<option value="">Select city</option>';

while($row = $query->fetch_assoc()){

echo '<option value="'.$row['ci_id'].'">'.$row['ci_name'].'</option>';

}

}else{

echo '<option value="">City not available</option>';

}

}

?>