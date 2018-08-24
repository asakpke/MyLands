<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <meta charset="utf-8"> -->
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="MyLands.pk is a web based project for property dealers. You can maintain your private listing online on almost any device. ">
    <meta name="author" content="Aamir Shahzad">
    <!-- <link rel="icon" href="https://getbootstrap.com/docs/3.3/examples/justified-nav/../../favicon.ico"> -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

    <title>MyLands.pk</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="https://getbootstrap.com/docs/3.3/examples/justified-nav/../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="https://getbootstrap.com/docs/3.3/examples/justified-nav/../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->
    <?= $this->Html->css('ie10-viewport-bug-workaround.css') ?>

    <!-- Custom styles for this template -->
    <!-- <link href="https://getbootstrap.com/docs/3.3/examples/justified-nav/justified-nav.css" rel="stylesheet"> -->
    <?= $this->Html->css('justified-nav.css') ?>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
      	<div class="row">
      		<div class="col-md-6">
	        	<h3 class="text-muted">
	        		<!-- <img width="64" alt="Legenda kamieniolom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Legenda_kamieniolom.svg/64px-Legenda_kamieniolom.svg.png"> -->
	        		<img width="32" alt="Legenda kamieniolom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Legenda_kamieniolom.svg/32px-Legenda_kamieniolom.svg.png">
	        		MyLands.pk
	        	</h3>
      		</div>
      		<div class="col-md-6 mt-20 text-right">
	        	<h4 class="text-muted">Contact: <span class="em-addr text-muted"></span></h4>
      		</div>
      	</div>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="http://mylands.pk">Home</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Connected Today</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Get Connected</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Connect Us</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Subscribe</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Contact Us</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Check Software</a></li>
          </ul>
        </nav>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>
        	What's
			<img width="64" alt="Legenda kamieniolom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Legenda_kamieniolom.svg/64px-Legenda_kamieniolom.svg.png">
        	MyLands.pk?
        </h1>
        <p class="lead">
			<img width="32" alt="Legenda kamieniolom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Legenda_kamieniolom.svg/32px-Legenda_kamieniolom.svg.png">
        	MyLands.pk is a web based project for property dealers. You can maintain your private listing online on almost any device. 
			<img width="32" alt="Legenda kamieniolom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Legenda_kamieniolom.svg/32px-Legenda_kamieniolom.svg.png">
        	MyLands.pk is just not launched yet. You may provide your contact information to get early access with discounts.
        </p>
        <p><a class="btn btn-lg btn-success" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Today</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Customized Domains</h2>          
          <p>You will get customized domain i.e Aamir.MyLands.pk. It will setup instantly within seconds. It includes simple/advanced search for your added lands.</p>
          <p><a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Now &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Admin Panel</h2>
          <p>You will get separate partition & login panel. After login you can add/edit/view/delete lands, land types, land statuses, cost types, cost etc.</p>
          <p><a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Now &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>All Devices</h2>
          <p>
          	You can access
			<img width="16" alt="Legenda kamieniolom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Legenda_kamieniolom.svg/16px-Legenda_kamieniolom.svg.png">
          	MyLands.pk software on almost all of your devices i.e mobile, tab, PC, Mac, Linux. Its design is flexible to adopt device width.
          </p>
          <p><a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Now &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <div class="col-md-4">      	
        	<p>
        		&copy; 2018-18 
        		<img width="16" alt="Legenda kamieniolom" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Legenda_kamieniolom.svg/16px-Legenda_kamieniolom.svg.png">
        		<span class="text-muted">MyLands.pk</span>
        	</p>
        </div>
        <div class="col-md-4">      	
        	<p class="text-center">
        		Contact:
        		<span class="em-addr text-muted"></span>
        	</p>        	
        </div>
        <div class="col-md-4">
        	<p class="text-right">Powered by <span class="text-muted">RoshanTech</span></p>
        </div>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="https://getbootstrap.com/docs/3.3/examples/justified-nav/../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
    <?= $this->Html->script('ie10-viewport-bug-workaround.js') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
	$( document ).ready(function() {
		var user = 'aamir';
		var domain = 'mylands.pk';
		$(".em-addr").html(user + '&#64;' + domain);
	});
	</script>
  </body>
</html>
