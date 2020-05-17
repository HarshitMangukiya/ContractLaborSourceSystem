<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<script type="text/javascript">
    function ShowHideDiv(chkPassport) {
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkPassport.checked ? "block" : "none";
    }
</script>
</head>
<body>
<label for="chkPassport">
    <input type="checkbox" id="chkPassport" onclick="ShowHideDiv(this)" />
    Do you have Passport?
</label>
<hr>
<div id="dvPassport" style="display: none">
    Passport Number:
    <input type="text" name="leaderid" />
</div>
</body>
</html>