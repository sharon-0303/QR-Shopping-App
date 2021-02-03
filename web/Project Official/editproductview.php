<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php 
include("connect.php");
$idd=$_GET['id'];
$str="select * from Producttable where P_id='$idd'";
$res=mysql_query($str);
if($res1=mysql_fetch_array($res))
{
?>
<body>
<form id="form1" name="form1" method="post" action="">
<input type="hidden" value="<?php echo $idd ?>" name="id1"/>
  <table width="443" border="0">
    <tr>
      <th colspan="2" scope="row">Product Registration </th>
    </tr>
    <tr>
      <th width="91" scope="row">ProductName</th>
      <td width="342"><label>
        <input type="text" name="textfield" value="<?php echo $res1[1]?>"/>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Quantity</th>
      <td><input type="text" name="textfield2"  value="<?php echo $res1[2]?>"/>
        <label>
        </td>
    </tr>
    <tr>
      <th scope="row">UsageTime</th>
      <td><input type="text" name="textfield3"  value="<?php echo $res1[3]?>"/>
      <input name="Tt" type="radio" checked="checked" value="Months"/>
      Months
      <input name="Tt" type="radio" value="Days" />
      Days</td>
    </tr>
    <tr>
      <th scope="row">Price(Rs)</th>
      <td><input type="text" name="textfield4" value="<?php echo $res1[4]?>" /></td>
    </tr>
    <tr>
      <th scope="row">Mfd</th>
      <td><input type="text" name="textfield5" value="<?php echo $res1[5]?>"/></td>
    </tr>
    <tr>
      <th scope="row">Exp.Date</th>
      <td><input type="text" name="textfield6" value="<?php echo $res1[6]?>" /></td>
    </tr>
    <tr>
      <th scope="row">ProductType</th>
      <td><label>
        <input name="p" type="radio" checked="checked" value="veg"  <?php if($res1[7]=="veg"){ ?> checked="checked"<?php }?> />
        Veg
        <input name="p" type="radio" value="others" <?php if($res1[7]=="others"){ ?> checked="checked"<?php }?>  />Others</td>
         <tr>
      <th scope="row">ProductBrand</th>
      <td><input type="text" name="textfield7" value="<?php echo $res1[8]?>" /></td>
    </tr>
</label></td>
    </tr>
	<?php }?>
    <tr>
      <th colspan="2" scope="row"><label>
        <input type="submit" name="Submit" value="Register" />
      </label></th>
    </tr>
  </table>
</form>
<?php
include("connect.php");
if(isset($_POST['Submit']))
{
$ProductName=$_POST['textfield'];
$Quantity=$_POST['textfield2'];
$UsagePeriodTime=$_POST['textfield3'];
$utime=$_POST['textfield3'];
$Timetype=$_POST['Tt'];
$tottime=$utime.".".$Timetype;
$Price=$_POST['textfield4'];
$Mfd=$_POST['textfield5'];
$Exp_Date=$_POST['textfield6'];
$ProductType=$_POST['p'];
$ProductBrand=$_POST['textfield7'];
$pid=$_POST['id1'];
$str="update producttable set P_Name='$ProductName',P_Quantity='$Quantity',UsagePeriodTime='$tottime',Price='$Price',Mfd='$Mfd',Exp_Date='$Exp_Date',type='$ProductType',ProductBrand='$ProductBrand' where P_id='$pid' ";
$i=mysql_query($str);
if($i>0)
{
?>

<script>
alert("Succesfully Edited");
window.location="ProductRegView.php";
</script>

<?php
}
}
?>

</body>
</html>

