
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
	if (isset($_POST['reports'])) {
		
		$date=$_POST['reports'];

		switch ($date) {

			case 'Today':
				echo '<h4 class="text-danger">'."The selected date is: ".date("Y-m-d");
				
				break;
			case 'Yesterday':
				echo '<h4 class="text-danger">'."The selected date is: ".$date;
				
				break;
			case 'This Month':
				echo '<h4 class="text-danger">'."The selected date is: ".$date;
				
				break;
			case 'This Year':
				echo '<h4 class="text-danger">'."The selected date is: ".$date;
				
				break;
			case 'Last Year':
				echo '<h4 class="text-danger">'."The selected date is: ".$date;
				
				break;				
			
			default:
				echo '<h4 class="text-danger">'."Please select date</h4>";
				
				break;
		}

	}
	
	?>