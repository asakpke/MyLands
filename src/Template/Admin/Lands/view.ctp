<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Land'), ['action' => 'edit', $land->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Land'), ['action' => 'delete', $land->id], ['confirm' => __('Are you sure you want to delete # {0}?', $land->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Lands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Land Types'), ['controller' => 'LandTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Type'), ['controller' => 'LandTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Land Statuses'), ['controller' => 'LandStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land Status'), ['controller' => 'LandStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Costs'), ['controller' => 'Costs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost'), ['controller' => 'Costs', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="lands view col-lg-10 col-md-9 columns">
    <h2><?= h($land->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <h6 class="subheader"><?php //= __('Admin') ?></h6>
                    <p><?php //= $land->has('admin') ? $this->Html->link($land->admin->name, ['controller' => 'Admins', 'action' => 'view', $land->admin->id]) : '' ?></p> -->
                    <h6 class="subheader"><?= __('Land Type') ?></h6>
                    <p><?= $land->has('land_type') ? $this->Html->link($land->land_type->name, ['controller' => 'LandTypes', 'action' => 'view', $land->land_type->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Land Status') ?></h6>
                    <p><?= $land->has('land_status') ? $this->Html->link($land->land_status->name, ['controller' => 'LandStatuses', 'action' => 'view', $land->land_status->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($land->name) ?></p>
                    <h6 class="subheader"><?= __('City') ?></h6>
                    <p><?= h($land->city) ?></p>
                    <h6 class="subheader"><?= __('Khewat') ?></h6>
                    <p><?= h($land->khewat) ?></p>
                    <h6 class="subheader"><?= __('Khasra') ?></h6>
                    <p><?= h($land->khasra) ?></p>
                    <h6 class="subheader"><?= __('Patwar Halka') ?></h6>
                    <p><?= h($land->patwar_halka) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!-- <h6 class="subheader"><?php //= __('Id') ?></h6>
                    <p><?php //= $this->Number->format($land->id) ?></p> -->
                    <h6 class="subheader"><?= __('Acre') ?></h6>
                    <p><?= $this->Number->format($land->acre) ?></p>
                    <h6 class="subheader"><?= __('Kanal') ?></h6>
                    <p><?= $this->Number->format($land->kanal) ?></p>
                    <h6 class="subheader"><?= __('Marla') ?></h6>
                    <p><?= $this->Number->format($land->marla) ?></p>
                    <h6 class="subheader"><?= __('Demand') ?></h6>
                    <p><?= $this->Number->format($land->demand) ?></p>
                    <h6 class="subheader"><?= __('Sale') ?></h6>
                    <p><?= $this->Number->format($land->sale) ?></p>
                    <h6 class="subheader">
                        Total
                        <?= __('Cost') ?>
                        <!-- (Total) -->
                        <!-- (Total, Initial + Sub costs) -->
                        <!-- (Initial + Sub costs) -->
                        <!-- (Initial + Others) -->
                        <!-- (Initial + Related) -->
                    </h6>
                    <p id="total"><?php //= $this->Number->format($land->cost) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Purchased') ?></h6>
                    <p><?= h($land->purchased) ?></p>
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($land->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($land->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Location') ?></h6>
                    <?= $this->Text->autoParagraph(h($land->location)); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Best For') ?></h6>
                    <?= $this->Text->autoParagraph(h($land->best_for)); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Remarks') ?></h6>
                    <?= $this->Text->autoParagraph(h($land->remarks)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Costs') ?></h4>
    <?php 
    $total = !empty($land->cost) ? $land->cost : 0;
    // pr($total);
                
    if (!empty($land->costs)):
        ?>
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
                <?php
                // $total = !empty($land->cost) ? $land->cost : 0;
                // pr($total);

                foreach ($land->costs as $costs):
                    // pr($costs->cost);
                    $total = $total + (!empty($costs->cost) ? $costs->cost : 0);
                    // pr($total);
                    ?>
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
                    <?php
                endforeach;
                ?>
            </table>
        </div>
        <?php
    endif;
    ?>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    $("#total").html("<?= $this->Number->format($total) ?>");
});
</script>