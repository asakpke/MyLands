<h1>Signup <small>(start your free 15-day trial)</small></h1>
<?= $this->Form->create($admin); ?>
    <?php
        echo $this->Form->input('name', [
            'placeholder' => 'Please enter your display name',
            'title' => 'Please enter your display name',
        ]);
        echo $this->Form->input('phone', [
            // 'type' => 'tel',
            // 'pattern' => '[0-9]{11}',
            'placeholder' => 'Please enter your valid phone number',
            'title' => 'Please enter your valid phone number',
        ]);
        
        echo $this->Form->input('email', [
            'type' => 'email',
            'placeholder' => 'Please enter a valid email (we will verify this by sending an email.)',
            'title' => 'Please enter a valid email (we will verify this by sending an email.)',
        ]);

        echo $this->Form->input('pass', [
            'type' => 'password',
            'placeholder' => 'Please enter your password for login.',
            'title' => 'Please enter your password for login.',
            'label' => 'Password',
        ]);
        
        echo $this->Form->input('subdomain', [
            'placeholder' => 'Please enter a subdomain of your choice i.e test.mylands.pk. Enter here only the subdomain i.e "test".',
            'title' => 'Please enter a subdomain of your choice i.e test.mylands.pk. Enter here only the subdomain i.e "test".',
        ]);
    ?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
<?= $this->Form->end() ?>
