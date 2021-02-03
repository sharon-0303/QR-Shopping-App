<?php
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<font color="#FFFFFF">
<form id="form1" name="form1" method="post" action="">
  <table width="676" height="97" border="1">
    <tr>
      <th colspan="6" scope="row"><label for="select"></label>
        <select name="select" id="select">
         <option value="select">--Select--</option>
        <?php
		include("connect.php");
		$str="select distinct(date) from billmain";
		$res=mysql_query($str);
		while($res1=mysql_fetch_array($res))
		{
		?>
        <option value="<?php echo $res1[0]?>"><?php echo $res1[0]?></option><?php }?>
      </select>
      <input type="submit" name="button" id="button" value="Submit" /></th>
    </tr>
    <tr>
      <th width="47" scope="row">Sl.No</th>
      <td width="118">Product Name </td>
      <td width="121">ProductAmount</td>
      <td width="106">PurchaseDate</td>
   
     
    </tr>
    <?php
	if(isset($_POST['button']))
	{
		$r1=$_POST['select'];
		$str="select billmain.*,billsub.*,producttable.* from billmain,billsub,producttable where billmain.B_ID=billsub.B_ID  and billsub.P_ID=producttable.P_ID and billmain.date='$r1'
";
		$re=mysql_query($str);
		$i=1;
		while($re1=mysql_fetch_array($re))
		{
	?>
    <tr>
      <th scope="row"><?php  echo $i?></th>
      <td><?php  echo $re1[10]?></td>
      <td><?php  echo $re1[8]?></td>
      <td><?php  echo $re1[4]?></td>
          </tr>
    <?php $i++; }}?>
  </table>
</form>
</body>
</html>
<?php
include("Footer.php");
?>