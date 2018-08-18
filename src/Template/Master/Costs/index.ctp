<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('New Cost'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Costs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cost Cats'), ['controller' => 'CostCats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Cat'), ['controller' => 'CostCats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="costs index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('land_id') ?></th>
                <th><?= $this->Paginator->sort('cost_cat_id') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('cost') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($costs as $cost): ?>
            <tr>
            <td>
                    <?= $cost->has('land') ? $this->Html->link($cost->land->name, ['controller' => 'Lands', 'action' => 'view', $cost->land->id]) : '' ?>
                </td>
            <td>
                    <?= $cost->has('cost_cat') ? $this->Html->link($cost->cost_cat->name, ['controller' => 'CostCats', 'action' => 'view', $cost->cost_cat->id]) : '' ?>
                </td>
                <td><?= $this->Number->format($cost->id) ?></td>
                    <td><?= $this->Number->format($cost->cost) ?></td>
                <td><?= h($cost->created) ?></td>
                <td><?= h($cost->modified) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $cost->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $cost->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $cost->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cost->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
