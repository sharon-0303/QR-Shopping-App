<?php
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<font color="#FFFFFF">
<?php 
include("connect.php");
$idd=$_GET['id'];
$str="select * from producttable where P_id='$idd'";
$res=mysql_query($str);
if($res1=mysql_fetch_array($res))
{
?>


<form id="form1" name="form1" method="post" action="">
  <table width="453" height="277" border="0">
    <tr>
      <td colspan="2"><div align="center">Add into Stock</div></td>
    </tr>
    <tr>
      <td width="139"><div align="center">Product Name</div></td>
      <td width="288"><label for="textfield"></label>
        <div align="center">
          <input type="text" name="textfield" disabled="disabled" id="textfield" value="<?php echo $res1[1]?>" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center">Quantity</div></td>
      <td><div align="center">
        <input type="text" name="textfield2" id="textfield2" />
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="button" id="button" value="Add" />
      </div></td>
    </tr>
  </table>
  <?php } ?>
</form>
</body>
</html>
<?php
if(isset($_POST['button']))
{
    $quantity=$_POST['textfield2'];
	$str=mysql_query("select * from stocktable where P_id='$idd'");
	if(mysql_num_rows($str)>0)
	{
	$i=mysql_query("update stocktable set Stk_qty=Stk_qty+'$quantity' where P_id='$idd'");
	}else{
	
	$i=mysql_query("insert into stocktable (P_id,Stk_qty) values('$idd','$quantity')");
	}
	if($i)
	{
		?>
		<script>
        alert("Successfully Added")
        </script>
		<?php
	}
	
}
?>
<?php
include("Footer.php");
?>