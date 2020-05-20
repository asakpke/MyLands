<!-- <?php
// echo $this->Session->read('Auth.Admin');
// pr($this->Session->read('Auth.Admin'));
// pr($this->Session->read('Auth.Admin.id'));
// echo $this->Session->read('Auth.Admin.id');
?> -->
<!-- Jumbotron -->
<div class="jumbotron">
    <?=$HomepageIntoText?>
  
  <!-- <h1>
    <span class="text-danger">
      What's
      <img width="64" alt="Logo" src="/img/logo/logo64.png">
      MyLands.pk?
    </span>
  </h1>
  <p class="lead">
<img width="32" alt="Logo" src="/img/logo/logo32.png">
    MyLands.pk is a home for property dealers. You can maintain your private or public lands listing online from any device instead of dumping your non searchable registers at office again & again. 
<img width="32" alt="Logo" src="/img/logo/logo32.png">
    MyLands.pk is just not launched yet fully. Are you curious about current working status? Please contact me on <span class="em-addr text-success"></span>. You may provide your contact information to get early access, 15 days <big>FREE</big> demo & discounts up to <big class="text-primary">50%</big> for one year.
  </p>
  <p dir="ltr" class="noto">
مائی لینڈز ڈاٹ پی کے پراپرتی ڈیلرز کے لیے پروگرام ہے۔ اس میں آپ جائیداد کا ریکارڈ رکھ سکتے ہیں اور سرچ بھی کر  سکتے ہیں۔ یہ ریکارڈ آپ صرف اپنے لیے بھی محفوظ کر سکتے ہیں یا اسے پبلک بنا سکتے ہیں ۔ پبلک ریکارڈز سب لوگ دیکھ سکتے ہیں۔ اپنے آفس کے رجسٹر کھاتوں سے جان چھڑائیں اور آن لائن  کے طرف آئیں۔ 
  </p>
  <p><a class="btn btn-lg btn-success" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Today</a></p> -->
</div>
<!-- sheikh salar start -->


<div class="row">
  <?php
   if (empty($allLands)) {
  }
  else
  {
    foreach ($allLands as $land) {?>
<h2 class="text-primary">Lands Records</h2>
      <div class="col-lg-4">
      <img src="img/land3.jpg" style="width: 300px;">
      <div class="panel panel-default" style="width: 300px;">
        <!-- Default panel contents -->
        <div class="panel-heading" style="font-weight: bold;">Name: <?php echo $land->name?></div>
    
          <!-- List group -->
          <ul class="list-group">
            <li class="list-group-item"><?php if($land->kanal > 0){ echo 'Kanal '.$land->kanal; }?> 
             <?php if($land->marla > 0){ echo 'Marla '.$land->marla; }?> </li>
            <li class="list-group-item">Address: <?php echo $land->location?></li>
            <li class="list-group-item list-group-item-success">Demand: <?php echo $land->demand?></li>
          </ul>
      </div>
    </div>
   <?php }
  }
  ?>



</div>
<?php
if ($this->Session->read('Auth.Admin')) {
?>
<div class="row"> 
 <?php
   if (empty($land)) {
}else{
  ?>
  <?php
  foreach ($land as $row) {
          ?>

    <div class="col-lg-4">
      <img src="img/land3.jpg" style="width: 300px;">
      <div class="panel panel-default" style="width: 300px;">
        <!-- Default panel contents -->
        <div class="panel-heading" style="font-weight: bold;">Name: <?php echo $row->name?></div>
    
          <!-- List group -->
          <ul class="list-group">
            <li class="list-group-item"><?php if($row->kanal > 0){ echo 'Kanal '.$row->kanal; }?> 
             <?php if($row->marla > 0){ echo 'Marla '.$row->marla; }?> </li>
            <li class="list-group-item">Address: <?php echo $row->location?></li>
            <li class="list-group-item list-group-item-success">Demand: <?php echo $row->demand?></li>
          </ul>
      </div>
    </div>
  <?php } 
  }?>
</div>
<?php
}?>


  <!-- sheikh salar end -->

<!-- Example row of columns -->
<div class="row">
  <?=$HomepageFooterText?>
  <!-- <div class="col-lg-4">
    <h2 class="text-danger">Customized Domain</h2>          
    <p class="text-warning">You will get customized domain i.e Aamir.MyLands.pk. It will setup instantly within seconds. It includes simple/advanced search for your added lands.</p>
    <p><a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Now &raquo;</a></p>
  </div>
  <div class="col-lg-4">
    <h2 class="text-danger">Admin Panel</h2>
    <p class="text-warning">You will get separate partition & login panel. After login you can add/edit/view/delete lands, land types, land statuses, cost types, cost، et cetera.</p>
    <p><a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Now &raquo;</a></p>
 </div>
  <div class="col-lg-4">
    <h2 class="text-danger">All Devices</h2>
    <p class="text-warning">
      You can access
      <img width="16" alt="Logo" src="/img/logo/logo16.png">
      MyLands.pk software from all of your devices, like mobile, tab, PC, Mac, Linux. Its design is flexible to adopt device width.
    </p>
    <p><a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSeRL9KjbkI3UofX-4EOmZaBuefSodZ1x5BVkst3HaMykpJovQ/viewform?usp=sf_link" role="button" target="_blank">Get Connected Now &raquo;</a></p>
  </div> -->
</div>