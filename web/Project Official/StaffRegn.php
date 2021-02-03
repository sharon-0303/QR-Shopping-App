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
		alert("Enter Name!");
		document.getElementById("textfield").focus();
    	return false;
 	}
	if(/[^a-z\s]/gi.test(document.getElementById("textfield").value))
	{
		alert("Special characters are not allowed in name");
		document.getElementById("textfield").focus();
		return false;
	}
	if(document.getElementById("textfield3").value=="")
	{
		alert("Enter DOB!");
		document.getElementById("textfield3").focus();
    	return false;
 	}
	if(document.getElementById("textfield4").value=="")
	{
		alert("Enter Place!");
		document.getElementById("textfield4").focus();
    	return false;
 	}
	if(document.getElementById("textfield5").value=="")
	{
		alert("Enter Qualification!");
		document.getElementById("textfield5").focus();
    	return false;
 	}
	if(document.getElementById("textfield7").value=="")
	{
		alert("Enter Email!");
		document.getElementById("textfield7").focus();
    	return false;
 	}
	if(document.getElementById("textfield7").value=="")
	{
		alert("Enter your E-mail ID");
		document.getElementById("textfield7").focus();
		return false;
	}
	var emailPat =/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	var emailid=document.getElementById("textfield7").value;
	var matchArray = emailid.match(emailPat);
	if (matchArray == null)
	{
		alert("Your Email ID seems incorrect. Enter Correct Email ID.");
		document.getElementById("textfield7").focus();
		return false;
	}
	if(document.getElementById("pass").value=="")
	{
		alert("Enter Password!");
		document.getElementById("pass").focus();
    	return false;
 	}
	if(document.getElementById("pass").value.length<6)
	{
		alert("Password is too short..Password should be atleast 6 characters...");
		document.getElementById("pass").focus();
    	return false;
	}
}
	</script>
    
<body>
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="439" height="277" border="0">
    <tr>
      <th colspan="2" scope="row">Staff Register </th>
    </tr>
    <tr>
      <th width="225" scope="row">Name</th>
      <td width="204"><label>
        <input type="text" name="textfield" id="textfield"/>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Gender</th>
      <td><label>
        <input name="gen" checked="checked" type="radio" value="Male" />
        Male
      </label>
        <label>
        <input name="gen" type="radio" value="Female" />
      Female
      <input name="gen" type="radio" value="Others" />
      Others</label></td>
    </tr>
    <tr>
      <th scope="row">DOB</th>
      <td><input name="textfield3" type="date" value="" id="textfield3" /></td>
    </tr>
    <tr>
      <th scope="row">Place</th>
      <td><input type="text" name="textfield4" id="textfield4"/></td>
    </tr>
    <tr>
      <th scope="row">Qualification</th>
      <td><textarea name="textfield5" id="textfield5"></textarea></td>
    </tr>
    <tr>
      <th scope="row">Designation</th>
      <td><select name="desi">
	  <option value="Select">Select</option>
	   <option value="Billing">Billing</option>
	    <option value="Store">Store</option>
	  </select></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><input type="text" name="textfield7" id="textfield7"/></td>
    </tr>
	  <tr>
      <th scope="row">Password</th>
      <td><input type="password" name="pass" id="pass"/></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><label>
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
$name=$_POST['textfield'];
$gender=$_POST['radio'];
$dob=$_POST['textfield3'];
$place=$_POST['textfield4'];
$qua=$_POST['textfield5'];
$designation=$_POST['desi'];
$Email=$_POST['textfield7'];
$pass=$_POST['pass'];
$str="insert into login(uname,pname,utype) values('$Email','$pass','$designation')";
mysql_query($str);
$id=mysql_insert_id();
$str1="insert into stafftable(sid,Name,Place,DOB,Qualification,Email,Gender,Designation) values('$id','$name','$place','$dob','$qua','$Email','$gender','$designation')";
$i=mysql_query($str1);
if($i>0)
{
?>
<script>
alert("Succesfully Registered");
</script>

<?php
}
}
?>
<?php
include("Footer.php");
?>

