
<h1>Land Reports</h1>
<p class="text-danger" style="font-size: 16px;">Here you can see the reports ofyour lands on daily/ monthly and yearly basis.</p>
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
	if (isset($_POST['reports'])) {
		
	$date=$_POST['reports'];

	switch ($date) {

		case 'Today':
				echo '<h4 class="text-danger">'."The selected date is: ".date("d/m/Y ");

			// foreach ($reports as $report) {
			// 		// $today = $report->created;
			// 		// echo 'Name: '.$report->name;
					
			// }
		
			// $d=strtotime("today");
			// echo date("Y-m-d h:i:sa", $d) . "<br>";
				
				// echo 'Name: '.$report->name;
				// echo "<br>";
				// echo 'Location: '.$report->location;
				// echo "<br>";
				// echo "Kanal: ".$report->kanal;
				// echo "<br>";
				// echo "Marla: ".$report->marla;
				// echo "<br>";
				// echo "Created: ".$report->created;
						
			break;
		case 'Yesterday':
			// echo '<h4 class="text-danger">'."The selected date is: ".$date;
			$d=strtotime("yesterday");
			echo date("Y-m-d h:i:sa", $d) . "<br>";
				
			break;
		case 'This Month':
			// echo '<h4 class="text-danger">'."The selected date is: ".$date;
			$d=strtotime("+1 Months");
			echo date("Y-m-d h:i:sa", $d) . "<br>";
			break;
		case 'This Year':
			// echo '<h4 class="text-danger">'."The selected date is: ".$date;
			$d=strtotime("this year");
			echo date("Y-m-d h:i:sa", $d) . "<br>";	
			break;
		case 'Last Year':
			// echo '<h4 class="text-danger">'."The selected date is: ".$date;
			$d=strtotime("-1 Year");
			echo date("Y-m-d h:i:sa", $d) . "<br>";	
			break;				
			
		default:
			echo '<h4 class="text-danger">'."Please select date</h4>";
				
			break;
	}

}
	
?>