<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Land Status'), ['action' => 'edit', $landStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Land Status'), ['action' => 'delete', $landStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $landStatus->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Land Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="landStatuses view col-lg-10 col-md-9 columns">
    <h2><?= h($landStatus->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <h6 class="subheader"><?php //= __('Admin') ?></h6>
                    <p><?php //= $landStatus->has('admin') ? $this->Html->link($landStatus->admin->name, ['controller' => 'Admins', 'action' => 'view', $landStatus->admin->id]) : '' ?></p> -->
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($landStatus->name) ?></p>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?php //= __('Id') ?></h6>
                    <p><?php //= $this->Number->format($landStatus->id) ?></p>
                </div>
            </div>
        </div> -->
        <div class="col-lg-4 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($landStatus->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($landStatus->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Remarks') ?></h6>
                    <?= $this->Text->autoParagraph(h($landStatus->remarks)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Lands') ?></h4>
    <?php if (!empty($landStatus->lands)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <!-- <th><?php //= __('Admin Id') ?></th>
                <th><?php //= __('Land Type Id') ?></th>
                <th><?php //= __('Land Status Id') ?></th>
                <th><?php //= __('Id') ?></th> -->
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
            <?php foreach ($landStatus->lands as $lands): ?>
            <tr>
                <!-- <td><?php //= h($lands->admin_id) ?></td>
                <td><?php //= h($lands->land_type_id) ?></td>
                <td><?php //= h($lands->land_status_id) ?></td>
                <td><?php //= h($lands->id) ?></td> -->
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
