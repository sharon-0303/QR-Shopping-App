<?php
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">
function val()
{
	if(document.getElementById("textfield").value=="")
	{
		alert("Enter ProductName!");
		document.getElementById("textfield").focus();
    	return false;
 	}
	if(document.getElementById("textfield2").value=="")
	{
		alert("Enter Quantity!");
		document.getElementById("textfield2").focus();
    	return false;
 	}
	if(document.getElementById("textfield3").value=="")
	{
		alert("Enter UsageTime!");
		document.getElementById("textfield3").focus();
    	return false;
 	}
	if(document.getElementById("textfield4").value=="")
	{
		alert("Enter Price(Rs)!");
		document.getElementById("textfield4").focus();
    	return false;
 	}
	if(document.getElementById("textfield7").value=="")
	{
		alert("Enter ProductBrand!");
		document.getElementById("textfield7").focus();
    	return false;
 	}
}
</script>

<body>
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="443" border="0">
    <tr>
      <th colspan="2" scope="row">Product Registration </th>
    </tr>
    <tr>
      <th width="113" scope="row">ProductName</th>
      <td width="320"><label>
        <input type="text" name="textfield" id="textfield"/>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Quantity</th>
      <td><input type="text" name="textfield2" id="textfield2"/></td>
    </tr>
    <tr>
      <th scope="row">UsageTime</th>
      <td><input type="text" name="textfield3" id="textfield3"/>
      <input name="Tt" type="radio" value="Months" />
      Months
      <input name="Tt" type="radio" value="Days" />
      Days</td>
    </tr>
    <tr>
      <th scope="row">Price(Rs)</th>
      <td><input type="text" name="textfield4" id="textfield4"/></td>
    </tr>
    <tr>
      <th scope="row">Mfd</th>
      <td><input type="date" name="textfield5" /></td>
    </tr>
    <tr>
      <th scope="row">Exp.Date</th>
      <td><input type="date" name="textfield6" /></td>
    </tr>
    <tr>
      <th scope="row">ProductType</th>
      <td><label>
        <input name="p" type="radio" value="veg" />
        Veg
        <input name="p" type="radio" value="others" />
Others</label></td>
    </tr>
    <tr>
      <th height="30" scope="row">ProductBrand</th>
      <th height="30" scope="row"><div align="left">
        <input type="text" name="textfield7" id="textfield7"/>
      </div></th>
    </tr>
    <tr>
      <th height="145" colspan="2" scope="row"><label>
        <input type="submit" name="Submit" onclick="return val()" value="Register" />
      </label></th>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include("connect.php");
if(isset($_POST['Submit']))
{
$ProductName=$_POST['textfield'];
$Quantity=$_POST['textfield2'];
$UsagePeriodTime=$_POST['textfield3'];
$utime=$_POST['textfield3'];
$Timetype=$_POST['Tt'];
$totitme=$utime.".".$Timetype;
$Price=$_POST['textfield4'];
$Mfd=$_POST['textfield5'];
$Exp_Date=$_POST['textfield6'];
$ProductType=$_POST['p'];
$ProductBrand=$_POST['textfield7'];

$str1="insert into producttable(P_Name,P_Quantity,UsagePeriodTime,Price,Mfd,Exp_Date,Type,ProductBrand) values ('$ProductName','$Quantity','$totitme','$Price','$Mfd','$Exp_Date','$ProductType','$ProductBrand')";
$i=mysql_query($str1) or die(mysql_error());
if($i>0)
{
?>
<script>
alert("Product Has Been Added");
</script>

<?php
}
}
?>
<?php
include("Footer.php");
?>

