<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('New Land'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Lands'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Land Types'), ['controller' => 'LandTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Type'), ['controller' => 'LandTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Land Statuses'), ['controller' => 'LandStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Status'), ['controller' => 'LandStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['controller' => 'Costs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['controller' => 'Costs', 'action' => 'add']) ?> </li>
        <!-- <li><?php //= $this->Html->link(__('Logout'), ['prefix' => false, 'controller' => 'Admins', 'action' => 'logout']) ?> </li> -->
    </ul>
</div>
<div class="lands index col-lg-10 col-md-9 columns">
	<div class="row">
		<div class="col-md-2">
          <h2><?= h('Lands') ?></h2>
      </div>
      <div class="col-md-10">
         <h2>
            <form>
                <input id="search" name="search" class="form-control" placeholder="Type your search & press enter key to filter lands" autofocus>
            </form>
        </h2>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <!-- <th><?php //= $this->Paginator->sort('admin_id') ?></th> -->
                <th><?= $this->Paginator->sort('land_type_id') ?></th>
                <th><?= $this->Paginator->sort('land_status_id') ?></th>
                <!-- <th><?php //= $this->Paginator->sort('id') ?></th> -->
                <th><?= $this->Paginator->sort('name') ?></th>
                <!-- <th><?= $this->Paginator->sort('acre') ?></th> -->
                <th><?= $this->Paginator->sort('kanal') ?></th>
                <th><?= $this->Paginator->sort('marla') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lands as $land): ?>
                <tr>
            <!-- <td>
                    <?php //= $land->has('admin') ? $this->Html->link($land->admin->name, ['controller' => 'Admins', 'action' => 'view', $land->admin->id]) : '' ?>
                </td> -->
                <td>
                    <?= $land->has('land_type') ? $this->Html->link($land->land_type->name, ['controller' => 'LandTypes', 'action' => 'view', $land->land_type->id]) : '' ?>
                </td>
                <td>
                    <?= $land->has('land_status') ? $this->Html->link($land->land_status->name, ['controller' => 'LandStatuses', 'action' => 'view', $land->land_status->id]) : '' ?>
                </td>
                <!-- <td><?php //= $this->Number->format($land->id) ?></td> -->
                <td><?= h($land->name) ?></td>
                <!-- <td><?= $this->Number->format($land->acre) ?></td> -->
                <td><?= $this->Number->format($land->kanal) ?></td>
                <td><?= $this->Number->format($land->marla) ?></td>

                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $land->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $land->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $land->id], ['confirm' => __('Are you sure you want to delete # {0}?', $land->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>
</div>
<!---<div class="paginator">
    <ul class="pagination"> 
         <?= $this->Paginator->prev('< ' . __('previous')) ?>
     </ul>
      <ul class="pagination"> 
         <?= $this->Paginator->numbers() ?>
     </ul>
     <ul class="pagination">
         <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
     <p><?= $this->Paginator->counter() ?></p>
</div>

.pagination > li {
    display: inline-block;
}--->
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
</div>
