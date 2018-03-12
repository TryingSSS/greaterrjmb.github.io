<?php require_once 'includes/header.php'; ?>

<?php 

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$lowStockSql = "SELECT * FROM product WHERE quantity <= 5 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">

	<div class="col-md-3">
		<div class="card">
		  <div class="cardHeader" style="background-color: #6f5499;">
		    <h1><?php echo date('d'); ?></h1>
		  </div>

		  <div class="cardContainer" style ="color:white;">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div> 
		<br/>

				<div class="card">
		  <div class="cardHeader" style= "background-color: #4CAF50;">
		     <i class="fa fa-camera fa-2x"></i>
		  </div>

		  <div class="cardContainer" style ="background-color: #b5e0b7;">
		   	<a href="product.php" style="text-decoration:none;color:black;">
					Total Product
					<span class="badge badge-success pull pull-right"><?php echo $countProduct; ?></span>	
				</a>
		  </div>
		</div> 


	</div>

	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> Calendar</div>
			<div class="panel-body">
				<div id="calendar"></div>
			</div>	
		</div>
		
	</div>
	
	<div class="col-md-3">

		<br/>

		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
		    <i class="fa fa-list-alt fa-2x"></i>
		  </div>

		  <div class="cardContainer " style ="background-color: #bbccdc;">
		   <a href="orders.php?o=manord" style="text-decoration:none;color:black;">
					Total Supplied Products
					<span class="badge badge-info pull pull-right"><?php echo $countOrder; ?></span>
				</a>
		  </div>
		</div> 
		<br/>
		<div class="card">
		  <div class="cardHeader" style="background-color:#bb6b6b;">
		      <i class="fa fa-tasks fa-2x"></i>
		  </div>

		  <div class="cardContainer" style ="background-color: #ecc1c1;">
		   <a href="stock.php" style="text-decoration:none;color:black;">
					Low Stock
					<span class="badge badge-error pull pull-right"><?php echo $countLowStock; ?></span>	
				</a>
		  </div>
		</div> 

	</div>


	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>

<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        },
		 height: 450
      });

    });
</script>

<?php require_once 'includes/footer.php'; ?>