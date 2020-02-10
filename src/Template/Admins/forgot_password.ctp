<div class="users form ">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Forgot password') ?></legend>
        <?= $this->Form->input('email',['label'=>'Enter your registered email address']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>