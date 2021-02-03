<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php 
include("connect.php");
$idd=$_GET['id'];
$str="select * from stafftable where sid='$idd'";
$res=mysql_query($str);
if($res1=mysql_fetch_array($res))
{
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="439" height="277" border="0">
    <tr>
      <th colspan="2" scope="row">Staff Register </th>
    </tr>
    <tr>
      <th width="225" scope="row">Name</th>
      <td width="204"><label>
        <input type="text" name="textfield" value="<?php echo $res1[1]?>"/>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Gender</th>
      <td><label>
        <input name="gen" type="radio" value="Male" value="Male" <?php if($res1[6]=="Male"){ ?> checked="checked"<?php }?> />
        Male
      </label>
        <label>
        <input name="gen" type="radio" value="Female" <?php if($res1[6]=="Female"){ ?> checked="checked"<?php }?> />
      Female
      <input name="gen" type="radio" value="Others" <?php if($res1[6]=="Others"){ ?> checked="checked"<?php }?> />
      Others</label></td>
    </tr>
    <tr>
      <th scope="row">DOB</th>
      <td><input name="textfield3" type="text" value="<?php echo $res1[3]?>" /></td>
    </tr>
    <tr>
      <th scope="row">Place</th>
      <td><input type="text" name="textfield4"  value="<?php echo $res1[2]?>"/></td>
    </tr>
    <tr>
      <th scope="row">Qualification</th>
      <td><textarea name="textfield5"><?php echo $res1[4]?></textarea></td>
    </tr>
    <tr>
      <th scope="row">Designation</th>
      <td><select name="desi">
	  <option value="Select">Select</option>
	   <option value="Billing" <?php if($res1[7]=="Billing"){ ?> selected="selected"<?php }?> >Billing</option>
	    <option value="Store"  <?php if($res1[7]=="Store"){ ?> selected="selected"<?php }?> >Store</option>
	  </select></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><input type="text" name="textfield7"  value="<?php echo $res1[5]?>" /></td>
    </tr>
	 <?php }?>
    <tr>
      <th colspan="2" scope="row"><label>
        <input type="submit" name="Submit" value="Register" />
      </label></th>
    </tr>
  </table>
</form>
</body>
</html>
<?php

if(isset($_POST['Submit']))
{
$name=$_POST['textfield'];
$gender=$_POST['gen'];
$dob=$_POST['textfield3'];
$place=$_POST['textfield4'];
$qua=$_POST['textfield5'];
$designation=$_POST['desi'];
$Email=$_POST['textfield7'];
$str="update stafftable set Name='$name',Place='$place',DOB='$dob',Qualification='$qua',Email='$Email',Gender='$gender',Designation='$designation' where sid='$idd'";
mysql_query("update login set utype='$designation' where lid='$idd'");
$i=mysql_query($str);

if($i>0)
{
?>
<script>
alert("Succesfully Registered");
window.location="Staffview.php";
</script>

<?php
}
}
?>


