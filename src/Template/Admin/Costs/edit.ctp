<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Cost'), ['action' => 'edit', $cost->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cost->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cost->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Cost'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Costs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lands'), ['controller' => 'Lands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Land'), ['controller' => 'Lands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cost Cats'), ['controller' => 'CostCats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Cat'), ['controller' => 'CostCats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="costs form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($cost, [
        'type' => 'post',
    ]); ?>
    <fieldset>
        <legend><?= __('Edit Cost') ?></legend>
        <?php
            echo $this->Form->input('land_id', ['options' => $lands]);
            echo $this->Form->input('cost_cat_id', ['options' => $costCats]);
            // echo $this->Form->input('cost');
            echo $this->Form->input('cost',array(
				'type'=>'text',
			));
            echo $this->Form->input('remarks');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
	new Cleave('#cost', {
		numeral: true,
		numeralThousandsGroupStyle: 'thousand'
	});
});
</script>