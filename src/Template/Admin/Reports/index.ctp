<!DOCTYPE html>
<html>
<head>
	<title>Reports - Mylands.pk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<h1>Land Reports</h1>
	<p class="text-danger" style="font-size: 16px;">Here you can see the reports of your lands on daily/ monthly and yearly basis.</p>

	<?= $this->Form->create(null,['type' => 'get']); ?>
	<?= $this->Form->control('start_date',['class'=>'datepicker']); ?>
	<?= $this->Form->control('end_date',['class'=>'datepicker']); ?>
	<button class="btn btn-success">Search</button>
	<?= $this->Form->end(); ?>

	<script type="text/javascript">
  $(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy'
    });
});
  </script>
</body>
</html>