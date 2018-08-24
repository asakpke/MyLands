<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Land Type'), ['action' => 'edit', $landType->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $landType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $landType->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Land Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Land Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="landTypes form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($landType, [
        'type' => 'post',
    ]); ?>
    <fieldset>
        <legend><?= __('Edit Land Type') ?></legend>
        <?php
            echo $this->Form->input('admin_id', ['options' => $admins, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('remarks');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
