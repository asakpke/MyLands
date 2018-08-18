<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Admin'), ['action' => 'edit', $admin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Admin'), ['action' => 'delete', $admin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $admin->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['action' => 'add']) ?> </li>
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
<div class="admins view col-lg-10 col-md-9 columns">
    <h2><?= h($admin->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($admin->name) ?></p>
                    <h6 class="subheader"><?= __('Email') ?></h6>
                    <p><?= h($admin->email) ?></p>
                    <h6 class="subheader"><?= __('Pass') ?></h6>
                    <p><?= h($admin->pass) ?></p>
                    <h6 class="subheader"><?= __('Subdomain') ?></h6>
                    <p><?= h($admin->subdomain) ?></p>
                    <h6 class="subheader"><?= __('Status') ?></h6>
                    <p><?= h($admin->status) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($admin->id) ?></p>
                    <h6 class="subheader"><?= __('Balance') ?></h6>
                    <p><?= $this->Number->format($admin->balance) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Next Payment') ?></h6>
                    <p><?= h($admin->next_payment) ?></p>
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($admin->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($admin->modified) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Is Verified') ?></h6>
                    <p><?= $admin->is_verified ? __('Yes') : __('No'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Remarks') ?></h6>
                    <?= $this->Text->autoParagraph(h($admin->remarks)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related CostCats') ?></h4>
    <?php if (!empty($admin->cost_cats)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Admin Id') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Remarks') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->cost_cats as $costCats): ?>
            <tr>
                <td><?= h($costCats->admin_id) ?></td>
                <td><?= h($costCats->id) ?></td>
                <td><?= h($costCats->name) ?></td>
                <td><?= h($costCats->remarks) ?></td>
                <td><?= h($costCats->created) ?></td>
                <td><?= h($costCats->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'CostCats', 'action' => 'view', $costCats->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'CostCats', 'action' => 'edit', $costCats->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'CostCats', 'action' => 'delete', $costCats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costCats->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related LandStatuses') ?></h4>
    <?php if (!empty($admin->land_statuses)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Admin Id') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Remarks') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->land_statuses as $landStatuses): ?>
            <tr>
                <td><?= h($landStatuses->admin_id) ?></td>
                <td><?= h($landStatuses->id) ?></td>
                <td><?= h($landStatuses->name) ?></td>
                <td><?= h($landStatuses->remarks) ?></td>
                <td><?= h($landStatuses->created) ?></td>
                <td><?= h($landStatuses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'LandStatuses', 'action' => 'view', $landStatuses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'LandStatuses', 'action' => 'edit', $landStatuses->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'LandStatuses', 'action' => 'delete', $landStatuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $landStatuses->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related LandTypes') ?></h4>
    <?php if (!empty($admin->land_types)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Admin Id') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Remarks') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->land_types as $landTypes): ?>
            <tr>
                <td><?= h($landTypes->admin_id) ?></td>
                <td><?= h($landTypes->id) ?></td>
                <td><?= h($landTypes->name) ?></td>
                <td><?= h($landTypes->remarks) ?></td>
                <td><?= h($landTypes->created) ?></td>
                <td><?= h($landTypes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'LandTypes', 'action' => 'view', $landTypes->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'LandTypes', 'action' => 'edit', $landTypes->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'LandTypes', 'action' => 'delete', $landTypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $landTypes->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Lands') ?></h4>
    <?php if (!empty($admin->lands)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Admin Id') ?></th>
                <th><?= __('Land Type Id') ?></th>
                <th><?= __('Land Status Id') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Acre') ?></th>
                <th><?= __('Kanal') ?></th>
                <th><?= __('Marla') ?></th>
                <th><?= __('Location') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Khewat') ?></th>
                <th><?= __('Khasra') ?></th>
                <th><?= __('Patwar Halka') ?></th>
                <th><?= __('Best For') ?></th>
                <th><?= __('Demand') ?></th>
                <th><?= __('Sale') ?></th>
                <th><?= __('Cost') ?></th>
                <th><?= __('Remarks') ?></th>
                <th><?= __('Purchased') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($admin->lands as $lands): ?>
            <tr>
                <td><?= h($lands->admin_id) ?></td>
                <td><?= h($lands->land_type_id) ?></td>
                <td><?= h($lands->land_status_id) ?></td>
                <td><?= h($lands->id) ?></td>
                <td><?= h($lands->name) ?></td>
                <td><?= h($lands->acre) ?></td>
                <td><?= h($lands->kanal) ?></td>
                <td><?= h($lands->marla) ?></td>
                <td><?= h($lands->location) ?></td>
                <td><?= h($lands->city) ?></td>
                <td><?= h($lands->khewat) ?></td>
                <td><?= h($lands->khasra) ?></td>
                <td><?= h($lands->patwar_halka) ?></td>
                <td><?= h($lands->best_for) ?></td>
                <td><?= h($lands->demand) ?></td>
                <td><?= h($lands->sale) ?></td>
                <td><?= h($lands->cost) ?></td>
                <td><?= h($lands->remarks) ?></td>
                <td><?= h($lands->purchased) ?></td>
                <td><?= h($lands->created) ?></td>
                <td><?= h($lands->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Lands', 'action' => 'view', $lands->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Lands', 'action' => 'edit', $lands->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Lands', 'action' => 'delete', $lands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lands->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
