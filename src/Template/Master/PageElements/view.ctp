<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Page Element'), ['action' => 'edit', $pageElement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Page Element'), ['action' => 'delete', $pageElement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageElement->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Page Elements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Element'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pageElements view col-lg-10 col-md-9 columns">
    <h2><?= h($pageElement->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Admin') ?></h6>
                    <p><?= $pageElement->has('admin') ? $this->Html->link($pageElement->admin->name, ['controller' => 'Admins', 'action' => 'view', $pageElement->admin->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Type') ?></h6>
                    <p><?= h($pageElement->type) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($pageElement->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($pageElement->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($pageElement->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Content') ?></h6>
                    <?= $this->Text->autoParagraph(h($pageElement->content)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
