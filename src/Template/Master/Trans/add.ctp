<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Tran'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trans'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="trans form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($tran); ?>
    <fieldset>
        <legend><?= __('Add Tran') ?></legend>
        <?php
            echo $this->Form->input('admin_id', ['options' => $admins]);
            echo $this->Form->input('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
