<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Cost'), ['action' => 'edit', $cost->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cost'), ['action' => 'delete', $cost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cost->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cost Cats'), ['controller' => 'CostCats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Cat'), ['controller' => 'CostCats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="costs view col-lg-10 col-md-9 columns">
    <h2><?= h($cost->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Land') ?></h6>
                    <p><?= $cost->has('land') ? $this->Html->link($cost->land->name, ['controller' => 'Lands', 'action' => 'view', $cost->land->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Cost Cat') ?></h6>
                    <p><?= $cost->has('cost_cat') ? $this->Html->link($cost->cost_cat->name, ['controller' => 'CostCats', 'action' => 'view', $cost->cost_cat->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($cost->id) ?></p>
                    <h6 class="subheader"><?= __('Cost') ?></h6>
                    <p><?= $this->Number->format($cost->cost) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($cost->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($cost->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Remarks') ?></h6>
                    <?= $this->Text->autoParagraph(h($cost->remarks)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
