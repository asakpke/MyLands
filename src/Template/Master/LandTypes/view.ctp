<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Land Type'), ['action' => 'edit', $landType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Land Type'), ['action' => 'delete', $landType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $landType->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Land Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Admins'), ['controller' => 'Admins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="landTypes view col-lg-10 col-md-9 columns">
    <h2><?= h($landType->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Admin') ?></h6>
                    <p><?= $landType->has('admin') ? $this->Html->link($landType->admin->name, ['controller' => 'Admins', 'action' => 'view', $landType->admin->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($landType->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($landType->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($landType->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($landType->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Remarks') ?></h6>
                    <?= $this->Text->autoParagraph(h($landType->remarks)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Lands') ?></h4>
    <?php if (!empty($landType->lands)): ?>
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
            <?php foreach ($landType->lands as $lands): ?>
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
