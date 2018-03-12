<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Online Supply Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css?newversion">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
	<meta http-equiv="pragma" content="no-cache"  charset="UTF-8" />

</head>
<body style ="background-color : #2b3e50 !important;">


	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
	<a class="navbar-brand" href=""><img src="assests/images/logo.png" alt="Greater RJ"></a>
      <ul class="nav navbar-nav navbar-right">        
		
      	<li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>  Dashboard</a></li>
		<?php if($_SESSION['role'] == 1): ?>
		<li id="navSupplier"><a href="supplier.php"><i class="glyphicon glyphicon-tree-deciduous"></i>Manufacturer</a></li>   
           <li id="navSupplier"><a href="branch.php"><i class="glyphicon glyphicon-tree-deciduous"></i>Branches</a></li> 		
        
        <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-btc"></i>  Brand</a></li>              
			<?php endif; ?>
        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li>     
		<li id="navStock"><a href="stock.php"> <i class="glyphicon glyphicon-star"></i> Stocks</a></li>  
        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Transaction <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Supply</a></li>            
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Supply</a></li>            
          </ul>
        </li> 
		
		  <li class="dropdown" id="navReport">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-check"></i> Report<span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i>Delivery Report</a></li>            
            <li id="navReportSupplier"><a href="purchase.php"> <i class="glyphicon glyphicon-check"></i>Supplier Order Report</a></li>            
          </ul>
        </li> 
		<?php if($_SESSION['role'] == 1): ?>
		<li id="navHistory"><a href="history.php"> <i class="glyphicon glyphicon-bookmark"></i> History </a></li>
		<?php endif; ?>	
        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">  
            <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li> 
			<?php if($_SESSION['role'] == 1): ?>
			<li id="topNavUser"><a href="user.php"> <i class="glyphicon glyphicon-user"></i> Users</a></li> 
			<?php endif; ?>		
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>        
               
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">