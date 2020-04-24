<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Page Element'), ['action' => 'edit', $pageElement->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pageElement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pageElement->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Page Element'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Page Elements'), ['action' => 'index']) ?></li>
        <!-- <li><?//= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?//= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li> -->
    </ul>
</div>
<div class="pageElements form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($pageElement); ?>
    <fieldset>
        <legend><?= __('Edit Page Element') ?></legend>
        <?php
            // echo $this->Form->input('admin_id', ['options' => $admins, 'empty' => true]);
            echo $this->Form->input('type',[
                'options' => array(
                    'Logo Image URL' => 'Logo Image URL',
                    'Logo Text' => 'Logo Text',
                    'Top Text' => 'Top Text',
                    'Header Menu' => 'Header Menu',
                    'Home Page - Intro Text' => 'Home Page - Intro Text',
                    'Home Page - Footer Text' => 'Home Page - Footer Text',
                    'Home Page - Footer' => 'Home Page - Footer',
                ),
            ]);
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
