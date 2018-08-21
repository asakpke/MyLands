<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Cost Cat'), ['action' => 'edit', $costCat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cost Cat'), ['action' => 'delete', $costCat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costCat->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Cost Cats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Cat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['controller' => 'Costs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['controller' => 'Costs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="costCats view col-lg-10 col-md-9 columns">
    <h2><?= h($costCat->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <h6 class="subheader"><?php //= __('Admin') ?></h6>
                    <p><?php //= $costCat->has('admin') ? $this->Html->link($costCat->admin->name, ['controller' => 'Admins', 'action' => 'view', $costCat->admin->id]) : '' ?></p> -->
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($costCat->name) ?></p>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?php //= __('Id') ?></h6>
                    <p><?php //= $this->Number->format($costCat->id) ?></p>
                </div>
            </div>
        </div> -->
        <div class="col-lg-4 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($costCat->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($costCat->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Remarks') ?></h6>
                    <?= $this->Text->autoParagraph(h($costCat->remarks)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Costs') ?></h4>
    <?php if (!empty($costCat->costs)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <!-- <th><?php //= __('Land Id') ?></th>
                <th><?php //= __('Cost Cat Id') ?></th>
                <th><?php //= __('Id') ?></th> -->
                <th><?= __('Cost') ?></th>
                <th><?= __('Remarks') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($costCat->costs as $costs): ?>
            <tr>
                <!-- <td><?php //= h($costs->land_id) ?></td>
                <td><?php //= h($costs->cost_cat_id) ?></td>
                <td><?php //= h($costs->id) ?></td> -->
                <td><?= h($costs->cost) ?></td>
                <td><?= h($costs->remarks) ?></td>
                <td><?= h($costs->created) ?></td>
                <td><?= h($costs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Costs', 'action' => 'view', $costs->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Costs', 'action' => 'edit', $costs->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Costs', 'action' => 'delete', $costs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costs->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
