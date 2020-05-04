<!DOCTYPE html>
<html>
<head>
	<title></title>
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

}else{

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
<style type="text/css">

.select-boxes{width: 280px;text-align: center;}

select {

background-color: #F5F5F5;

border: 1px double #FB4314;

color: #55BB91;

font-family: Georgia;

font-weight: bold;

font-size: 14px;

height: 39px;

padding: 7px 8px;

width: 250px;

outline: none;

margin: 10px 0 10px 0;

}

select option{

font-family: Georgia;

font-size: 14px;

}

</style>
<?php
if(isset($_POST['submit']))
{
	echo $_POST['country'];
		echo $_POST['state'];
	echo $_POST['city'];


}
?>

<body>

<form method="post" enctype="multipart/form-data">


<div class="select-boxes">

<?php

//Include database configuration file

include('dbConfig.php');

//Get all country data

$query = $con->query("SELECT * FROM country");

//Count total number of rows

$rowCount = $query->num_rows;

?>

<select name="country" id="country">

<option value="">Select Country</option>

<?php

if($rowCount > 0){

while($row = $query->fetch_assoc()){

echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';

}

}else{

echo '<option value="">Country not available</option>';

}

?>

</select>

<select name="state" id="state">

<option value="">Select state first</option>

</select>

<select name="city" id="city">

<option value="">Select state first</option>

</select>

</div>
<input type="submit" name="submit">
</form>
</body>
</html>