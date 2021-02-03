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
<form id="form1" name="form1" method="get" action="transactioncashentry.php">
  <div align="center">
    <table width="586" height="163" border="0">
      <tr>
        <th colspan="2" scope="row">Verify PurchaseCode </th>
      </tr>
      <tr>
        <th width="289" scope="row">User Code </th>
        <td width="287"><label>
          <div align="center">
            <input type="text" name="textfield" />
          </div>
        </label></td>
      </tr>
      <tr>
        <th colspan="2" scope="row"><input type="submit" name="Submit" value="Enter" /></th>
      </tr>
    </table>
  </div>
  <label></label>
</form>
</body>
</html>
<?php
include("Footer.php");
?>
