<?php
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<script language="javascript" type="text/javascript">
function val()
{
	if(document.getElementById("textfield2").value=="")
	{
		alert("Enter Brand Offer !");
		document.getElementById("textfield2").focus();
    	return false;
 	}
	if(document.getElementById("textfield3").value=="")
	{
		alert("Enter Our Offer  !");
		document.getElementById("textfield3").focus();
    	return false;
 	}
	if(document.getElementById("textfield4").value=="")
	{
		alert("Enter Discription !");
		document.getElementById("textfield4").focus();
    	return false;
 	}
	if(document.getElementById("textfield5").value=="")
	{
		alert("Enter Offer Starts  !");
		document.getElementById("textfield5").focus();
    	return false;
 	}
	if(document.getElementById("textfield6").value=="")
	{
		alert("Enter Offer Ends  !");
		document.getElementById("textfield6").focus();
    	return false;
 	}
	if(document.getElementById("dis").value=="")
	{
		alert("Enter Discount  !");
		document.getElementById("dis").focus();
    	return false;
 	}
}
            var xmlHttp;
            function showss(mid){
				//alert(mid);
                if (typeof XMLHttpRequest != "undefined"){
                xmlHttp= new XMLHttpRequest();
                }
                else if (window.ActiveXObject){
                    xmlHttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                if (xmlHttp==null){
                    alert("Browser does not support XMLHTTP Request")
                    return;
                }
                var url="view_price.php"
                url +="?c=" +mid
                xmlHttp.onreadystatechange = stateChange;
                xmlHttp.open("GET", url, true);
                xmlHttp.send(null);
            }
            
            function stateChange(){
                if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
                    document.getElementById("pri").innerHTML=xmlHttp.responseText 
                    //document.getElementById("price").value=xmlHttp.responseText 
					//alert(xmlHttp.responseText);
                }
            }
			
			function cal1()
			{
				//alert("kkkkkkkkk");
				var a=document.pro.price.value;
				//alert(a);
				var b=document.pro.dis.value;
				//alert(b);
				var temp=(a/100);
				var temp1=(a-(b*temp));
				var c=temp1;
				document.pro.textfield.value=c+"";
			}
			</script>

<body>
<font color="#FFFFFF">
<form id="form1" name="pro" method="post" action="">
  <table width="577" height="353" border="0">
    <tr>
      <th colspan="2" scope="row">Your Offers</th>
    </tr>
    <tr>
      <th height="47" scope="row">Products</th>
      <td><label>
        <select name="select" size="1" onchange="showss(this.value)">
          <option value="select">Select Your Item</option>
		  <?php
		  include("connect.php");
		  $str="select * from producttable";
		  $res=mysql_query($str);
		  while($res1=mysql_fetch_array($res))
		  {
		  ?>
		  <option value="<?php echo $res1[0] ?>"><?php echo $res1[1] ?></option><?php }?>
        
        </select>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Price</th>
      <th scope="row"><label for="textfield"></label>
        <div align="left">
          <div id="pri"> <input type="text" name="price" id="price" /></div>
      </div></th>
    </tr>
    <tr>
      <th scope="row">Brand Offer </th>
      <td><textarea name="textfield2" id="textfield2"></textarea></td>
    </tr>
    <tr>
      <th scope="row">Our Offer </th>
      <td><textarea name="textfield3" id="textfield3"></textarea></td>
    </tr>
    <tr>
      <th scope="row">Discription</th>
      <td><textarea name="textfield4" id="textfield4"></textarea></td>
    </tr>
    <tr>
      <th scope="row">Offer Starts </th>
      <td><input type="date" name="textfield5" id="textfield5" /></td>
    </tr>
    <tr>
      <th scope="row">Offer Ends </th>
      <td><input type="date" name="textfield6" id="textfield6"/></td>
    </tr>
    <tr>
      <th scope="row">Discount</th>
      <td><label for="textfield2"></label>
      <input type="text" name="dis" id="dis"  /></td>
    </tr>
    <tr>
      <th scope="row">Total Price</th>
      <th scope="row"><label for="textfield"></label>
        <div align="left">
          <input type="text" name="textfield" id="textfield" onclick="return cal1()"/>
      </div></th>
    </tr>
    <tr>
      <th colspan="2" scope="row"><label>
        <input type="submit" name="Submit" value="AddOffer" onclick="return val()" />
      </label></th>
    </tr>
  </table>
</form>
</body>
</html>
<?php

if(isset($_POST['Submit']))
{
$Products=$_POST['select'];
$P_Offer =$_POST['textfield2'];
$Sp_Offer=$_POST['textfield3'];
$Discrip=$_POST['textfield4'];
$From_Date=$_POST['textfield5'];
$End_Date=$_POST['textfield6'];
$Total_Price=$_POST['textfield'];
$str1="insert into offertable(pro_id,P_Offer,Sp_Offer,Discrip,From_Date,End_Date,Total_Price)values ('$Products','$P_Offer','$Sp_Offer','$Discrip','$From_Date','$End_Date','$Total_Price')";
$i=mysql_query($str1) or die(mysql_error());
if($i>0)
{
?>
<script>
alert("Offer Succesfully Added");
</script>

<?php
}
}
?>
<?php
include("Footer.php");
?>