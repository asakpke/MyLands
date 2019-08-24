<?php
// pr($this->Auth->user('id'));
// pr($this->Session->read('Auth.User.id'))
// pr($this->Session->read('Auth.User'))
// pr($this->Session->read('Auth.Admin'))
// pr($this->Session->read('Auth.Admin.id'))
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Land'), ['action' => 'add']) ?></li>
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
    <?= $this->Form->create($land); ?>
    <fieldset>
        <legend><?= __('Add Land') ?></legend>
        <?php
            // pr($landTypes);
            // echo $this->Form->input('admin_id', ['options' => $admins]);
            echo $this->Form->input('land_type_id', [
                'options' => $landTypes,
                // 'empty' => true,
                // 'default' => $landTypes[1],
                'default' => 2,
                // 'value' => 'Sale',
            ]);
            echo $this->Form->input('land_status_id', [
                'options' => $landStatuses,
                'empty' => true,
                'default' => 1,
            ]);
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
            ));
            echo $this->Form->input('sale',array(
                'type'=>'text',
            ));
            echo $this->Form->input('cost',array(
                'type'=>'text',
                // 'label'=>'Initial Cost',
                'label'=>'Cost (Initial)',
            ));
            echo $this->Form->input('remarks');

            // echo $this->Form->input('purchased');
            echo $this->Form->input('purchased',[
                'minYear' => 1900,
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    new Cleave('#demand', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    new Cleave('#sale', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    new Cleave('#cost', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });
});
</script>
