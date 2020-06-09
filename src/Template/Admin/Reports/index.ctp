
<h1>Land Reports</h1>
<p class="list-group-item list-group-item-success" style="font-size: 16px; width: 590px;">Here you can see the reports of your lands on daily/ monthly and yearly basis.</p><br>
<div class="container">
	<div class="actions columns col-lg-2 col-md-3">
		<label for="reports">Choose a Date:</label>
		<?= $this->Form->create('reports',['type'=>'get']) ?>
			<select name="reports" id="mySelect" onchange="admSelectCheck(this);" style="width: 100px; text-align: center;">
				 <option value="" disabled selected>Select</option>
				 <option value="Today">Today</option>
				 <option value="Yesterday">Yesterday</option>
				 <option value="This Month">This Month</option>
				 <option value="This Year">This Year</option>
				 <option value="Last Year">Last Year</option>
				 <option value="Custom" id="admOption">Custom</option>
			</select><br><br>
			<button class="btn btn-success">Submit</button>
		<?=$this->Form->end();?>
	</div>
</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div id="admDivCheck" style="display:none;">
	<?= $this->Form->create('reports',['type'=>'get']) ?>
	<?=$this->Form->input('start_date',['class'=>'datepicker',]); ?>
	<?=$this->Form->input('end_date',['class'=>'datepicker',]); ?>
	<?=$this->Form->end();?>
</div><br><br>

<script>

	$( function() {
	$( ".datepicker" ).datepicker();
	} );

</script>

<script type="text/javascript">
	
	function admSelectCheck(nameSelect) {
    
	    if(nameSelect) {
	        admOptionValue = document.getElementById("admOption").value;
	        if(admOptionValue == nameSelect.value){
	            document.getElementById("admDivCheck").style.display = "block";
	        }
	        else{
	            document.getElementById("admDivCheck").style.display = "none";
	        }
	    }
	    else {
	        document.getElementById("admDivCheck").style.display = "none";
	    }
	}
</script>

<!-- <script>
function myFunction() {
  var x = document.getElementById("mySelect").value = "Custom";
  document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script> -->
<br>
<?php
if (!empty($reports)) {
	echo '<div class="row">';

	foreach ($reports as $report) {
		?>
		<div class="col-lg-4">
			<!-- <img src="img/land2.jpg" style="width: 300px;"> -->
			<div class="panel panel-default" style="width: 300px;">
				<div class="panel-heading" style="font-weight: bold;">Name: <?php echo $report->name?></div>
				<ul class="list-group">
		            <li class="list-group-item"><?php if($report->kanal > 0){ echo 'Kanal '.$report->kanal; }?>
		            <?php if($report->marla > 0){ echo 'Marla '.$report->marla; }?> </li>
		            <li class="list-group-item">Address: <?php echo $report->location?></li>
		            <li class="list-group-item list-group-item-success">Demand: <?php echo $report->demand?>
		            </li>
	          	</ul>
	        </div>  	
		</div>
	<?php	
	}
	echo '</div>';
	?>
	
	<style type="text/css">
	    .pagination li{
	      display: inline-block;
	      margin-left: 5px;
	    }
	</style>

	<div class="row">
	  <div class="paginator">
	    <ul class="pagination">
	      <?= $this->Paginator->prev('< ' . __('previous')) ?>
	      <?= $this->Paginator->numbers() ?>
	      <?= $this->Paginator->next(__('next') . ' >') ?>
	    </ul>
	    <p><?= $this->Paginator->counter() ?></p>
	  </div>
	</div>
	<?php
}
else {
		echo "No records to Show";
}
?>

	

	
