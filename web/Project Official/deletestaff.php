<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php

include("connect.php");
$idd=$_GET['id'];

$str="delete from stafftable where sid='$idd'";

$i=mysql_query($str);
if($i>0)
{
?>
<script>
alert("Succesfully Deleted");
window.location="Staffview.php";
</script>

<?php
}
?>
</body>
</html>
