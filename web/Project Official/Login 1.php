<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
include("loginh.php");
?>
<body>
<p align="center"><img src="images/login.jpg" width="1000" height="200"></p>
<font color="#FFFFFF">
<form action="" method="post">
  <div align="center">
    <table width="430" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <th colspan="2" scope="row"><h1>LOG IN</h1></th>
      </tr>
      <tr>
        <th height="49" scope="row">UserName</th>
        <td><label>
          <input type="text" name="textfield" />
        </label></td>
      </tr>
      <tr>
        <th height="40" scope="row">Password</th>
        <td>
          <input type="password" name="textfield2" />
        </td>
      </tr>
      <tr>
        <th height="102" colspan="2" scope="row"><label>
          <input name="Login" type="submit" id="Login" value="Login" />
          <a href="Forgotpassword.php"> <br />
          <br />
          Forgot Password ?</a>
        </label></th>
      </tr>
    </table>
  </div>
</form>
</body>
</html>
<?php
if(isset($_POST['Login']))
{
	include("connect.php");
	
	$un=$_POST['textfield'];
	$pn=$_POST['textfield2'];
	
	$str="select * from login where uname='$un' and pname='$pn'";
	$res=mysql_query($str);
	$type="";
	if($res1=mysql_fetch_array($res))
	{
		$type=$res1[3];
		session_start();
		$_SESSION['typ']=$type;
	}
	if($type=="admin")
	{
		header("location:adminhome.php");
	}
	else if($type=="Store")
	{
			header("location:storehome.php");
	}
	else if($type=="Billing")
	{
			header("location:BillHome.php");
	}
	else
	{
		?>
        <script>
		alert("Invalid UserName Or Password");
		</script>
        <?php
	}
}
?>
<?php
include("Footer.php");
?>