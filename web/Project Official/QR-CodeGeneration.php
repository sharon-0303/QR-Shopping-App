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
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="564" height="384" border="1">
      <tr>
        <td colspan="2"><div align="center">QR-Code Generation</div></td>
      </tr>
      <tr>
        <td width="218"><div align="center">Product Name</div></td>
        <td width="330"><label for="textfield"></label>
          <label for="select"></label>
          <div align="center">
            <select name="select" size="1" id="select">
              <option>SelectProduct</option>
              <?php
		  include("connect.php");
$str="select * from producttable";
$res=mysql_query($str);
while($res1=mysql_fetch_array($res))
{
		  ?>
              <option value="<?php echo $res1[0] ?>"><?php echo $res1[1] ?></option>
              <?php
}
		  ?>
            </select>
        </div></td>
      </tr>
      <tr>
        <td height="99" colspan="2"><div align="center">
          <input type="submit" name="button" id="button" value="QR-Code Generate" />
        </div></td>
      </tr>
      
    </table>
  </div>
</form>
<?php
if(isset($_POST['button'])){
	$id=$_POST['select'];
include('libs/qrlib.php');

		QRcode::png('hai');


		$tempDir = "qrCode/";

		$codeContents =$id;

		$fileName = $id.'.png';

		$pngAbsoluteFilePath = $tempDir.$fileName;
		$urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName;
		QRcode::png($codeContents, $pngAbsoluteFilePath); 
		header("location:QR-CodeGeneration.php");
}
?>
</body>
</html>
<?php
include("Footer.php");
?>