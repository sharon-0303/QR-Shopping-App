<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>About ShopOwn</title>
	<link rel="stylesheet" href="css/style1.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="wrapper clearfix">
			<div id="logo">
				<a href="index.html"><img src="images/logoIcon.png" alt="LOGO"></a>
			</div>
            <?php
			session_start();
		$typ=$_SESSION['typ'];
		if($typ=="admin")
		{
			?>
            
			<ul id="navigation">
				<li>
					<a href="adminhome.php">Home</a>
				</li>
				<li>
					<a href="Login 1.php">Logout</a>
				</li>
			</ul>
            
             <?php
			
		}
		if($typ=="Billing")
		{
		?>
        
       <ul id="navigation">
				<li>
					<a href="BillHome.php">Home</a>
				</li>
				<li>
					<a href="Login 1.php">Logout</a>
				</li>
			</ul>
        
         <?php
			
		}
		if($typ=="Store")
		{
		?>
       <ul id="navigation">
				<li>
					<a href="StoreHome.php">Home</a>
				</li>
				<li>
					<a href="Login 1.php">Logout</a>
				</li>
			</ul>
        
        <?php
		}
		?>
            
            
		</div>
	</div>
	<div id="contents">
		<div class="wrapper clearfix">
        
        <?php
		
		if($typ=="admin")
		{
		?>
<div id="sidebar">
  <ul>
					<li> <a href="StaffRegn.php" class="btn2">Add Staff</a> </li>
					<li> <a href="StaffView.php" class="btn2">View Staff</a> </li>
                    <li> <a href="ProRegister.php" class="btn2">Add Products</a> </li>
                    <li> <a href="ProductRegView.php" class="btn2">View Products</a> </li>
                    <li> <a href="ViewBillReport.php" class="btn2">View Bill Report</a> </li>
                    <li> <a href="ViewRating.php" class="btn2">View Rating</a> </li>
                    <li> <a href="Offers.php" class="btn2">Provide Offers</a> </li>
                    <li> <a href="Offersview.php" class="btn2">View Offers</a> </li>
                    <li> <a href="StockAdmin.php" class="btn2">View Stock</a> </li>
                    <li> <a href="Customerview.php" class="btn2">Customers</a> </li>
	</ul>				
  </div>
            
            <?php
			
		}
		if($typ=="Billing")
		{
		?>
<div id="sidebar">
				<ul>
					<li> <a href="Verifycodeentry.php" class="btn2">Billing</a> </li>
					<li> <a href="ViewReports.php" class="btn2">View Reports</a> </li>
                    <li> <a href="StockView.php" class="btn2">View Stock Items</a> </li>
				</ul>				
			</div>
         
         
           <?php
			
		}
		if($typ=="Store")
		{
		?>
        <div id="sidebar">
				<ul>
					<li> <a href="storestock.php" class="btn2">Stock Update</a> </li>
					<li> <a href="StockView.php" class="btn2">Stock View</a> </li>
                    <li> <a href="AlertView.php" class="btn2">Out Of Stock Products</a> </li>
                    <li> <a href="QR-CodeGeneration.php" class="btn2">QR-Code Generation</a> </li>
                    <li> <a href="viewQR.php" class="btn2">View QR-Code With Details</a> </li>
                    
				</ul>				
			</div>
        
        <?php
		
		}
		?>
            
			<div class="main">