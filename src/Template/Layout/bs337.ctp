<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- <meta charset="utf-8"> -->
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="MyLands.pk is a web based project for property dealers. You can maintain your private listing online from any device.">
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

    <!-- <link href='https://fonts.googleapis.com/css?family=Amiri&subset=arabic,latin' rel='stylesheet' type='text/css'> -->
    <link href='http://fonts.googleapis.com/earlyaccess/notonastaliqurdudraft.css' rel='stylesheet' type='text/css'>
    <style>
      /*.amiri{font-family:'Amiri',serif;}*/
      .noto{font-family: 'Noto Nastaliq Urdu Draft', tahoma, serif; line-height: normal;}
    </style>
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <div class="row">
          <div class="col-md-6">
            <h3>
              <img width="32" alt="Logo" src="/img/logo/logo32.png">
              MyLands.pk
            </h3>
          </div>
          <div class="col-md-6 mt-20 text-right">
            <h4>Contact: <span class="em-addr text-success"></span></h4>
          </div>
        </div>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="http://shop.mylands.pk/">Shop</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">15 Days FREE</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Discounts</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">50% Off</a></li>
            <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" target="_blank">Contact Us</a></li>
            <li><a href="/Admins/Login">Login</a></li>
            <li><a href="http://www.MyLands.pk/Admins/Signup"><span class="text-primary">FREE Trial</span></a></li>
          </ul>
        </nav>
      </div>

      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>

      <!-- Site footer -->
      <footer class="footer">
        <div class="col-md-4">        
          <p>
            &copy; 2018-18 
            <img width="16" alt="Logo" src="/img/logo/logo16.png">
            <span class="text-muted">MyLands.pk</span>
          </p>
        </div>
        <div class="col-md-4">        
          <p>
            Contact:
            <span class="em-addr text-success"></span>
          </p>          
        </div>
        <div class="col-md-4">
          <p class="text-right">Powered by <span class="text-muted"><a href="http://www.mylands.pk/">www.MyLands.pk</a></span></p>
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
    $(".em-addr").html(user + '&#64;' + domain + ', +923005393652');
  });
  </script>
  </body>
</html>
