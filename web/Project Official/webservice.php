<?php
require_once('lib/nusoap.php');
// Create the server instance
$server = new soap_server;
$server->configureWSDL("demo","urn:demo");//create wsdl

$server->register('track',array('lati'=>"xsd:string",'longi'=>"xsd:string"),array('return'=>"xsd:string"));//create method name,parameter,retun value
$server->register('enterpin',array('pincode'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('branchfood',array('branchid'=>"xsd:string"),array('return'=>"xsd:string"));



$server->register('userreg',array('name'=>"xsd:string",'address'=>"xsd:string",'email'=>"xsd:string",'phone'=>"xsd:string",'uname'=>"xsd:string",'pswd'=>"xsd:string"),array('return'=>"xsd:string"));



$server->register('order',array('bank'=>"xsd:string",'atmnumber'=>"xsd:string",'pinnumber'=>"xsd:string",'ccvnumber'=>"xsd:string",'del_date'=>"xsd:string",'del_tim'=>"xsd:string",'uid'=>"xsd:string",'branchid'=>"xsd:string",'ord'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('register',array('fname'=>"xsd:string",'sname'=>"xsd:string",'place'=>"xsd:string",'email'=>"xsd:string",'phone'=>"xsd:string",'uname'=>"xsd:string",'pword'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('login',array('uname'=>"xsd:string",'pname'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('view',array(),array('return'=>"xsd:string"));

$server->register('search',array('type'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('offer',array(),array('return'=>"xsd:string"));

$server->register('rate',array('lid'=>"xsd:string",'r'=>"xsd:string",'fbk'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('viewfeed',array(),array('return'=>"xsd:string"));

$server->register('threshold',array('Qid'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('uploadCart',array('items'=>"xsd:string",'gen'=>"xsd:string",'total'=>"xsd:string",'lid'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('payment',array('amount'=>"xsd:string",'acc'=>"xsd:string",'secu'=>"xsd:string",'lid'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('Username',array('lid'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('amount',array('lid'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('transaction_status',array('gen_code'=>"xsd:string"),array('return'=>"xsd:string"));
$server->register('forgot',array('email'=>"xsd:string",'phone'=>"xsd:string"),array('return'=>"xsd:string"));

$server->register('cart',array('lid'=>"xsd:string"),array('return'=>"xsd:string"));


$c=mysql_connect("localhost","root","");
mysql_select_db("shop",$c);
//create function

function register($fname,$sname,$place,$email,$phone,$uname,$pword)
{
	$res="Success";
	try
	{
		$str="insert into login(uname,pname,utype) values('$uname','$pword','user')";
		mysql_query($str);
		$id=mysql_insert_id();
		
		$str1="insert into customertable(Cus_ID,FirstName,SecondName,Place,Email,Phone,UserName)values('$id','$fname','$sname','$place','$email','$phone','$uname')";
		
		mysql_query($str1);
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $res;
}
function login($uname,$pname)
{
	$re="no";
	try
	{
		$str="select * from login where uname='$uname' and pname='$pname'";
		$res=mysql_query($str);
		if($res1=mysql_fetch_array($res))
		{
			$re=$res1[0];
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}
function view()
{
	
	$re="";
	try
	{
		$str="select  * from producttable";
		$res=mysql_query($str);
		while($res1=mysql_fetch_array($res))
		{
			$re.=$res1[0]."#".$res1[1]."#".$res1[2]."#".$res1[3]."#".$res1[4]."#".$res1[5]."#".$res1[6]."#".$res1[7]."#".$res1[8]."@";
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}
function search($type)
{
	
	$re="";
	try
	{
		$str="select  * from producttable where P_Name like '$type%'";
		$res=mysql_query($str);
		while($res1=mysql_fetch_array($res))
		{
			$re.=$res1[0]."#".$res1[1]."#".$res1[2]."#".$res1[3]."#".$res1[4]."#".$res1[5]."#".$res1[6]."#".$res1[7]."#".$res1[8]."@";
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}
function offer()
{
	
	$re="";
	try
	{
		$str="select offertable.*,producttable.P_Name,ProductBrand,Price from producttable,offertable where producttable.P_ID=offertable.pro_id";
		$res=mysql_query($str);
		while($res1=mysql_fetch_array($res))
		{
			$re.=$res1[0]."#".$res1[1]."#".$res1[2]."#".$res1[3]."#".$res1[4]."#".$res1[5]."#".$res1[6]."#".$res1[7]."#".$res1[8]."#".$res1[9]."#".$res1[10]."@";
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}

function rate($lid,$r,$fbk)
{
	
	$re="Success";
	try
	{
		$str="insert into ratingtable(Rating,uid,date,fdb)values('$r','$lid',curdate(),'$fbk')";
		$res=mysql_query($str);
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}


function viewfeed()
{
	
	$re="";
	try
	{
		$str="select * from ratingtable order by P_ID desc";
		$res=mysql_query($str);
		while($res1=mysql_fetch_array($res))
		{
			$re.=$res1[0]."#".$res1[4]."&";
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}

function threshold($Qid)
{
	
	$re="";
	try
	{
		$str="select offertable.*,producttable.P_Name from offertable,producttable where offertable.pro_id=producttable.P_ID and offertable.pro_id='$Qid'";
		$res=mysql_query($str);
		if($res1=mysql_fetch_array($res))
		{
			$re=$res1[1]."#".$res1[7]."#".$res1[8];
		}
		else
		{
			
			
		$str1="select * from producttable where P_ID='$Qid'";
		$res3=mysql_query($str1);
		if($res4=mysql_fetch_array($res3))
		{
			$re=$res4[0]."#".$res4[4]."#".$res4[1];
		}
		}
	}
	
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}

///////////////////////////////////////////////////////////////////////////////////////////

function amount($lid)
{
	
	$re="";
	try
	{
		$str="select * from billmain where uid='$lid' and status='pending'";
		$res=mysql_query($str);
		while($res1=mysql_fetch_array($res))
		{
			$re=$res1[2];
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function payment($amount,$acc,$secu,$lid)
{
	
	$re="";
	try
	{
		$val1=mysql_query("select * from dummybank where Acc_No='$acc' and security='$secu'");

	if($res1=mysql_fetch_array($val1))

	{

	$amt=$res1[3];

	}

	if($amt<$amount)

	{

	$rs="Not Sufficient Balance";

	}

	else

	{ 

		mysql_query("update dummybank set amount='$amt'-'$amount'  where Acc_No='$acc'");
		mysql_query("update dummybank set amount='$amt'+'$amount'  where Acc_No='122'");
		mysql_query("update billmain set status='paid' where uid='$lid'");

		

		$rs="update";

	}

	

	$rs="success";

	return $rs;
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}


/////////////////////////////////////////////////////////////////////////////////////////
function uploadCart($items,$gen,$total,$lid)
{
	
	$re="Success";
	try
	{
		$str="insert into billmain(uid,total_amount,gen_code,date) values('$lid','$total','$gen',curdate())";
		$res=mysql_query($str);
		$bill_id=mysql_insert_id();
		$rows=explode("$",$items);
		for($i=0;$i<sizeof($rows);$i++){
			
				$s=explode("#",$rows[$i]);
				if(sizeof($s)==2){
				mysql_query("insert into billsub values('$bill_id','$s[0]','$s[1]')");
			}
		}
		
		$re="ok";
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}
	
function track($lait,$longi)
{
$r="welcome ".$lait.$longi;

// write update code in trak table
return $r;
}

function transaction_status($gen_code)
{
	
	$re="";
	try
	{
		$str="select status from billmain where gen_code='$gen_code'";
		$res=mysql_query($str);
		while($res1=mysql_fetch_array($res))
		{
			$re=$res1[0];
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////

function Username($lid)
{
	
	$re="";
	try
	{
		$val1=mysql_query("select FirstName,SecondName from customertable where Cus_ID='$lid'");
if(mysql_num_rows($val1)>0)
{
	while($res1=mysql_fetch_array($val1))
		{
			$re.=$res1[0]." ".$res1[1]."@";
		}

	return $re;
}
return $re;
	}
	catch(Exception $e)
	{
	
	}
	return $re;
}
//
function forgot($email,$phone)
{
	
	$re="";
	try
	{
		$val1=mysql_query("select pname,uname from login,customertable where customertable.Email='$email' and customertable.Phone='$phone' and customertable.Cus_ID=login.lid and login.utype='user'");
if(mysql_num_rows($val1)>0)
{
	$res1=mysql_fetch_array($val1);
	$password=$res1[0];
		////////
		 require("class.phpmailer.php");

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->Username = "project2016mails@gmail.com";  // SMTP username gmail username
		$mail->Password = "messengerforall"; // SMTP password   gmail password
		
		$mail->From = "project2016mails@gmail.com"; // from email address
		$mail->FromName = "Username & Password"; //from name
		   
		$mail->AddAddress($email);        
		
		$mail->WordWrap = 10000;                                 
		$mail->IsHTML(true);                          
		
		$mail->Subject = "Your Password is ".$password;
		$mail->Body    = "Password is $password and username is $res1[1]. ";
		$mail->AltBody = "Secure this!!";
		
		if($mail->Send())
		{
			$re="Success....check your mail";
			
		}
		else
		{
			$re="try again...";
		}
		///////
}
else{
$re="incorrect email or phone";	
}
	}
	catch(Exception $e)
	{
	
	}
	return $re;
}
/////////////////////////////////////////////////////////////////////////////////////////
function cart($lid)
{
	
	$re="error";
	try
	{
		$str="select billmain.*,billsub.* ,producttable.P_Name from billmain,billsub, producttable where billmain.uid='$lid' and billmain.B_ID=billsub. B_ID  and billsub.P_ID=producttable.P_ID order by billmain.B_ID desc";
		$res=mysql_query($str);
		if(mysql_num_rows($res)>0)
		{		
		$re="";
		while($res1=mysql_fetch_array($res))
		{
			$re.=$res1[9]."#".$res1[8]."#".$res1[4]."&";
		}
		}
	}
	catch(Exception $e)
	{
		return "error";
	}
	return $re;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////


$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
