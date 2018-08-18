<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('New Admin'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Admins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cost Cats'), ['controller' => 'CostCats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Cat'), ['controller' => 'CostCats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Land Statuses'), ['controller' => 'LandStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Status'), ['controller' => 'LandStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Land Types'), ['controller' => 'LandTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Type'), ['controller' => 'LandTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="admins index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?php //= $this->Paginator->sort('pass') ?></th>
                <th><?= $this->Paginator->sort('subdomain') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('is_verified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($admins as $admin): ?>
            <tr>
                <td><?= $this->Number->format($admin->id) ?></td>
                <td><?= h($admin->name) ?></td>
                <td><?= h($admin->email) ?></td>
                <td><?php //= h($admin->pass) ?></td>
                <td><?= h($admin->subdomain) ?></td>
                <td><?= h($admin->status) ?></td>
                <td><?= h($admin->is_verified) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $admin->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $admin->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
