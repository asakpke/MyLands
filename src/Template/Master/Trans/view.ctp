<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Tran'), ['action' => 'edit', $tran->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tran'), ['action' => 'delete', $tran->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tran->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Trans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tran'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="trans view col-lg-10 col-md-9 columns">
    <h2><?= h($tran->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Admin') ?></h6>
                    <p><?= $tran->has('admin') ? $this->Html->link($tran->admin->name, ['controller' => 'Admins', 'action' => 'view', $tran->admin->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($tran->id) ?></p>
                    <h6 class="subheader"><?= __('Amount') ?></h6>
                    <p><?= $this->Number->format($tran->amount) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($tran->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($tran->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
