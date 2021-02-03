<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
 
<?php
  include("connect.php");
$id=$_GET['c'];
$str="select * from producttable where P_ID='$id'";
$str1=mysql_query($str);
if($str2=mysql_fetch_array($str1))
{
?>

            <td><input type="text" name="price"  value="<?php echo $str2[4] ?>" /></td> 
            
         
		  <?php }?>
</body>
</html>
