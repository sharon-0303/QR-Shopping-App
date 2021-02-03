 <?php 
 include("connect.php");
 if(isset($_POST['button']))
 {
	 
	
	 $uname=$_POST['textfield5'];
	 $qry="select Email,pname from stafftable,login where stafftable.sid=login.lid and uname='$uname'";
	 $res= mysql_query($qry);
	
	 if(mysql_num_rows($res)>0)
	 {
		 $qq= mysql_fetch_array($res);
	 
	 $email= $qq['Email'];
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
		
		$mail->Subject = "Your Password is".$qq['pname'];
		$mail->Body    = "Password is".$qq['pname']." and username is $uname ";
		$mail->AltBody = "Secure this!!";
		
		if(!$mail->Send())
		{
		   ?>
		   <script type="text/javascript">
		   alert("email id not varified,please Enter with correct email..");
		   </script>
		   <?php
		}
		else
		{
			 ?>
		   <script type="text/javascript">
		   alert("please check your mail for your password");
		   </script>
		   
		   <?php
		}}}?>



<form name="form1" method="post" action="">
  <table width="413" height="134" border="0">
    <tr>
      <td colspan="2"><div align="center">Forgot Password ?</div></td>
    </tr>
    <tr>
      <td width="201"><div align="center">User Name</div></td>
      <td width="196"><label for="textfield5"></label>
        <div align="center">
          <input type="text" name="textfield5" id="textfield5">
      </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="button" id="button" value="Continue">
      </div></td>
    </tr>
  </table>
</form>

