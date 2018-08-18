<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Land Status'), ['action' => 'edit', $landStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $landStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $landStatus->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Land Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Land Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="landStatuses form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($landStatus); ?>
    <fieldset>
        <legend><?= __('Edit Land Status') ?></legend>
        <?php
            echo $this->Form->input('admin_id', ['options' => $admins, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('remarks');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
