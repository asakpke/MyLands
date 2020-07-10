<?php
// echo $this->Session->read('Auth.Admin');
// pr($this->Session->read('Auth.Admin'));
// pr($this->Session->read('Auth.Admin.id'));
// echo $this->Session->read('Auth.Admin.id');
?>

<style type="text/css">
  .pagination li{
    display: inline-block;
    margin-left: 5px;
  }
  #image1:hover
  {
    opacity: 0.8;
  }
</style>
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
      

  if (!empty($page)) {
    ?>
    <h2 class="text-primary">Lands Records</h2>
    <!-- <embed src="<?= $land->main_image ?>" width="220px" height="150px"/> -->

    <?php
    foreach ($page as $land) {
      ?>
      <div class="col-lg-4">
          
        <a target="_blank" href="img/lands/<?=$land->main_image?>" ><img src="<?php echo 'img/lands/' . $land->main_image; ?>" width="300px"></a>
        <!-- img src="/lands/101Colosseum-by-Yoal-Desurmont.jpg" alt="Creating Image Links" > -->


          <?php
          // echo $this->Html->image('lands/'. $land->main_image, [
          //           "width" => "300px",
          //           // "height" => "150px"
          //           'title' => 'Click to View image',
          //           'target' => '_blank',
          //           // 'id' => 'image1',
          //           // 'url' => WWW_ROOT . 'img/lands/' . $land->main_image,
          //           'url' => WWW_ROOT . 'img/lands/' . $land->main_image,

          //           // 'target' => '_blank',
          //       ]);
          // echo $this->Html->link('<span class="profile-avatar">'. $this->Html->image('lands/'. $land->main_image,array('width'=>'300px'), array('alt' => '')), array('controller' => 'lands', 'action' => 'view' ), array('class' => 'sf-with-ul', 'escape' => false)).'</span>';
          ?>
        <div class="panel panel-default" style="width: 300px;">
        <!-- Default panel contents -->
          <div class="panel-heading" style="font-weight: bold;">Name: <?php echo $land->name?>
          </div>
            <!-- List group -->
          <ul class="list-group">
            <li class="list-group-item"><?php if($land->kanal > 0){ echo 'Kanal '.$land->kanal; }?> 
            <?php if($land->marla > 0){ echo 'Marla '.$land->marla; }?> </li>
            <li class="list-group-item">Address: <?php echo $land->location?></li>
            <li class="list-group-item list-group-item-success">Demand: <?php echo $land->demand?></li>
          </ul>
        </div>
      </div>
    <?php
    }
    // echo "ok";
  }
  else {
    
    // echo '<h4 class="list-group-item list-group-item-success">No Lands Are Public Or Added, Login and Add some Lands or public the lands if added already and refresh the page again.</h4>';
  }
  ?>
</div>
<?php
if (!empty($page)) {
  ?>
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
?>
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
