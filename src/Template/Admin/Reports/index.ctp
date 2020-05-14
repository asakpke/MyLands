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
				<select name="reports">
				  <option value="Today">Today</option>
				  <option value="Yesterday">Yesterday</option>
				  <option value="This Month">This Month</option>
				  <option value="This Year">This Year</option>
				  <option value="Last Year">Last Year</option>
				  <option value="Custom">Custom</option>
				</select><br><br>
				<input type="submit" name="submit" value="Submit">
			<?=$this->Form->end();?>
	  	</div>
	</div>
	<?php
	echo "test";
	foreach ($allLands as $report) {

		echo $report->created;
		echo "<br>";

	}
	// if (isset($_POST['submit'])) {
		
	// 	$date=$_POST['reports'];
	// 	echo "The selected date is: ".$date;
	// }
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