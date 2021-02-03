<?php
include("Header.php");
?>
<body>
<font color="#FFFFFF">
 <?php 
 include("connect.php");
 if(isset($_POST['aa']))
 {
	  $re=mysql_query("select  status from billmain where B_ID in (select max(B_ID) from billmain)");
	  $b=mysql_fetch_array($re);
	   ?>
      <script>
	
	  
	  </script>
      
      <?php
      }
	  ?>
      


<script type="text/javascript">

function printSelection(node){

  var content=node.innerHTML
  var pwin=window.open('','print_content','width=800,height=800');

  pwin.document.open();
  pwin.document.write('<html><body onload="window.print()">'+content+'</body></html>');
  pwin.document.close();
  
   setTimeout(function(){pwin.close();},1000);
}
function aa(){

  
}
</script>
<form name="form1" method="post" action="BillHome.php">
  <p>
  <img src="Images\refresh.png"   width="50" height="50" onClick='aa();'/ />
  
    <input type="submit"  value="Get Status" name="aa" id="aa"/>
  </p>
  <div id="test">
  <?php 
$id=$_GET['gen'];
$totamt=0;
$po=0;
$so=0;

?>
  <table width="1047" height="365" border="1">
    <tr>
      <th height="48" colspan="9" scope="row"><h1>Shop-Own</h1>
      <h3>Bill For The User</h3></th>
    </tr>
    <?php 
	  $re=mysql_query("select  customertable.*,billmain.* from customertable,billmain where customertable.Cus_ID=billmain.uid and billmain.gen_code='$id'");
	  if($b=mysql_fetch_array($re))
	  {
	  ?>
    <tr>
      <th height="49" colspan="4" align="center" scope="row">User : <?php echo $b[1]." ".$b[2]; ?>
      </th>
      <th height="49" colspan="2" align="center" scope="row">Date : <?php echo $b['date'] ?></th>
      <th height="49" colspan="2" align="center" scope="row">Status : <?php echo $b['status'] ?></th>
    </tr>
    <?php } ?>
    <tr>
      <th width="42" height="49" scope="row" align="right">Sl.No</th>
      <td width="124">ProductName</td>
     
      <td width="66">Price</td>
      <td width="82">Mfd.Date</td>
      <td width="105">Exp.Date</td>
      <td width="96">Product Offer </td>
      <td width="92">Shop Offer </td>
      <td width="111">Total Price</td>
    </tr>
    <?php
	
	$str="select * from billmain,billsub,producttable where billmain.gen_code='$id' and billmain.B_ID=billsub.B_ID and billsub.P_ID=producttable.P_ID";
	$res=mysql_query($str);
	$i=1;
	while($res1=mysql_fetch_array($res))
	{
		$totamt=$res1[2];
		
		$of=mysql_query("select * from offertable where pro_id='$res1[7]'");
		if(mysql_num_rows($of)>0){
			$row1=mysql_fetch_array($of);
			$po=$row1[2];
			$so=$row1[3];
			}else{
				$po=0;
				$so=0;
				}
	?>
    <tr>
      <th height="106" scope="row"><div align="center"><?php echo $i?></div></th>
      <td><div align="center"><?php echo $res1[10] ?></div></td>
    
      <td><div align="center"><?php echo $res1[8] ?></div></td>
      <td><div align="center"><?php echo $res1[14] ?></div></td>
      <td><div align="center"><?php echo $res1[15] ?></div></td>
      <td><div align="center"><?php echo $po ?></div></td>
      <td><div align="center"><?php echo $so ?></div></td>
      <td><div align="center"><?php echo $res1[8] ?></div></td>
    </tr>
    <?php $i++; }?>
  </table>
&nbsp;
<table border="0" align="center">
  <tr>
    <th colspan="6" scope="row">Total Amount </th>
    <th colspan="3" scope="row"><label>
      <input type="text" name="textfield" value="<?php echo $totamt ?>" />
    </label></th>
  </tr>
  </table>
  </div>
  <table border="0" align="center">
  <tr>
    <th width="153" colspan="9" scope="row"> </label>
      <div align="center">
        <input type="button" value ="Print" onClick="printSelection(document.getElementById('test'));return false">
        <input type="submit" value ="Go Home" name="button1"/>
      </div></th>
  </tr>
  </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
<?php

if(isset($_POST['button1']))
{
header("loaction:BillHome.php");	
}


include("Footer.php");
?>
</body>