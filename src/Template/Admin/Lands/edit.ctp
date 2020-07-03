<?php
// pr($land);
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Land'), ['action' => 'edit', $land->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $land->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $land->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Land'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lands'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Land Types'), ['controller' => 'LandTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Type'), ['controller' => 'LandTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Land Statuses'), ['controller' => 'LandStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Status'), ['controller' => 'LandStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['controller' => 'Costs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['controller' => 'Costs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="lands form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($land, [
        'type' => 'file'
    ]); ?>
    <fieldset>
        <legend><?= __('Edit Land') ?></legend>
        <?php
            // echo $this->Form->input('admin_id', ['options' => $admins]);
            echo $this->Form->input('land_type_id', ['options' => $landTypes, 'empty' => true]);
            echo $this->Form->input('land_status_id', ['options' => $landStatuses, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('acre');
            echo $this->Form->input('kanal');
            echo $this->Form->input('marla');
            echo $this->Form->input('location');
            echo $this->Form->input('city');
            echo $this->Form->input('khewat');
            echo $this->Form->input('khasra');
            echo $this->Form->input('patwar_halka');
            echo $this->Form->input('best_for');
            echo $this->Form->input('demand',array(
                'type'=>'text',
                // 'class'=>'currency-comma',
            ));
            echo $this->Form->input('sale',array(
                'type'=>'text',
                // 'class'=>'currency-comma',
            ));
            echo $this->Form->input('cost',array(
                'type'=>'text',
                // 'class'=>'currency-comma',
                // 'label'=>'Initial Cost',
                'label'=>'Cost (Initial)',
            ));
            echo $this->Form->input('remarks');

            // echo $this->Form->input('purchased');
            echo $this->Form->input('purchased',[
                // 'type' => 'text',
                // 'year' => false,
                // 'month' => false,
                // 'day' => false,
                'minYear' => 1900,
                // 'maxYear' => date('Y'),
            ]);

            // sheikh salar start
            echo $this->Form->input('is_public');
            echo $this->Form->input('file ( Upload image with size 2mb)', [
                'type'=>'file',
                'accept' => 'image/*',
                'size' => 200000,
            ]);
            ?>
            <!-- <embed src="/images/<?= $land->main_image ?>" width="220px" height="150px"/> -->
            <?php 
                echo $this->Html->image('../images/'.$land->main_image, [
                    "width" => "220px",
                    "height" => "150px"

                ]); 

               
                // sheikh salar end

                // echo $this->Form->text('purchased', array('type' => 'date'))
                // echo $this->Form->date('purchased');
            ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?><br><br>
    <?= $this->Form->end() ?>  
</div>

<!-- <h4>Uploaded Files</h4> -->
           <!-- <?php //echo $this->Html->image($land->main_image); ?> -->
   <!-- <embed src="<?= $land->main_image ?>" width="220px" height="150px"/> -->

<script>
// $( document ).ready(function() {
//     console.log( "ready!" );

//  var cleave = new Cleave('.input-element', {
//      numeral: true,
//      numeralThousandsGroupStyle: 'lakh'
//  });
// });

// (function($) {
//  console.log( "ready!" );

//  var cleave = new Cleave('.input-element', {
//      numeral: true,
//      numeralThousandsGroupStyle: 'lakh'
//  });
// })(jQuery);

// $(function() {
//     console.log( "ready!" );
// });

// function readyFn( jQuery ) {
//  console.log( "ready!" );
// }
 
// $( document ).ready( readyFn );
// or:
// $( window ).on( "load", readyFn );

// (function() {
//  console.log( "START" );
//  var cleave = new Cleave('.input-element', {
//      numeral: true,
//      numeralThousandsGroupStyle: 'thousand'
//  });
//  console.log( "ENDED" );
// })();

document.addEventListener('DOMContentLoaded', () => {
    // const cleave = new Cleave('.currency-comma', {
    // const demand = new Cleave('#demand', {
    // const cleave = new Cleave('#demand,#sale', {
    new Cleave('#demand', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    // const sale = new Cleave('#sale', {
    new Cleave('#sale', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    new Cleave('#cost', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    // $('#purchased').attr('type', 'date');
});
</script>
