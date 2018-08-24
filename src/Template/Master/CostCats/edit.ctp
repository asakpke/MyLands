<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Cost Cat'), ['action' => 'edit', $costCat->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $costCat->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $costCat->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Cost Cat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cost Cats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['controller' => 'Costs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['controller' => 'Costs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="costCats form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($costCat, [
        'type' => 'post',
    ]); ?>
    <fieldset>
        <legend><?= __('Edit Cost Cat') ?></legend>
        <?php
            echo $this->Form->input('admin_id', ['options' => $admins, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('remarks');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
