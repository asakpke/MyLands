<!DOCTYPE html>
<html>
<head>
	<title>Reports - Mylands.pk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<h1>Land Reports</h1>
	<p class="text-danger" style="font-size: 16px;">Here you can see the reports of your lands on daily/ monthly and yearly basis.</p>
	<div class="container">
		<div class="actions columns col-lg-2 col-md-3">
			<label for="reports">Choose a Date:</label>
			<?= $this->Form->create('reports',['type'=>'post']) ?>
				<select name="reports" style="width: 100px; text-align: center;">
				  <option value="">Select</option>
				  <option value="Today">Today</option>
				  <option value="Yesterday">Yesterday</option>
				  <option value="This Month">This Month</option>
				  <option value="This Year">This Year</option>
				  <option value="Last Year">Last Year</option>
				  <option value="Custom">Custom</option>
				</select><br><br>
				<button class="btn btn-success">Submit</button> 
			<?=$this->Form->end();?>
	  	</div>
	</div>
	<?php
	// echo "test";
	// foreach ($reports as $report) {

	// 	echo $report->created;
	// 	echo "<br>";

	// }

	if (isset($_POST['reports'])) {
		
		$date=$_POST['reports'];

		if ($date == 'Today') {
			
		// 	foreach ($times as $report) {
				
		// 		echo $report;
		// 	}
		// }

			//Connect to MySQL with the PDO object.
$pdo = new PDO("mysql:host=localhost;dbname=cakephp", 'root', '');
 
//Today's date in a YYYY-MM-DD format.
$date = date("Y-m-d", strtotime("today"));;
// date("Y-m-d", strtotime("yesterday"));
 
//Our SQL statement.
$sql = "SELECT * FROM lands WHERE DATE(date_posted) = ?";
 
//Prepare our SQL statement.
$stmt = $pdo->prepare($sql);
 
//Execute.
$stmt->execute(array($date));
 
//Fetch the rows from today.
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//var_dump today's result set
var_dump($rows);
		
		echo '<h4 class="text-danger">'."The selected date is: ".$date;
	}

	//yesterday----------------------------------------------

	elseif ($date == 'Yesterday') {
			
		// 	foreach ($times as $report) {
				
		// 		echo $report;
		// 	}
		// }

			//Connect to MySQL with the PDO object.
$pdo = new PDO("mysql:host=localhost;dbname=cakephp", 'root', '');
 
//Today's date in a YYYY-MM-DD format.
$date = date("Y-m-d", strtotime("yesterday"));;
// date("Y-m-d", strtotime("yesterday"));
 
//Our SQL statement.
$sql = "SELECT * FROM lands WHERE DATE(date_posted) = ?";
 
//Prepare our SQL statement.
$stmt = $pdo->prepare($sql);
 
//Execute.
$stmt->execute(array($date));
 
//Fetch the rows from today.
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
//var_dump today's result set
var_dump($rows);
		
		echo '<h4 class="text-danger">'."The selected date is: ".$date;
	}
	else
	{
		echo '<h4 class="text-danger">'."Please select date</h4>";
	}
}
	
	?>

	<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy'
    });
});
  </script> -->
</body>
</html>