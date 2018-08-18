<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Master'), ['action' => 'edit', $master->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Master'), ['action' => 'delete', $master->id], ['confirm' => __('Are you sure you want to delete # {0}?', $master->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Masters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Master'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="masters view col-lg-10 col-md-9 columns">
    <h2><?= h($master->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($master->name) ?></p>
                    <h6 class="subheader"><?= __('Email') ?></h6>
                    <p><?= h($master->email) ?></p>
                    <h6 class="subheader"><?= __('Pass') ?></h6>
                    <p><?= h($master->pass) ?></p>
                    <h6 class="subheader"><?= __('Subdomain') ?></h6>
                    <p><?= h($master->subdomain) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($master->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($master->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($master->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Remarks') ?></h6>
                    <?= $this->Text->autoParagraph(h($master->remarks)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
