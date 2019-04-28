<?php
use Cake\Core\Configure;

if (!$this->fetch('html')) {
    $this->start('html');
    printf('<html lang="%s">', Configure::read('App.language'));
    $this->end();
}

if (!$this->fetch('title') && Configure::read('App.title')) {
    $this->start('title');
    echo Configure::read('App.title');
    $this->end();
}
// Always append App.title to current page title
elseif ($this->fetch('title') && Configure::read('App.title')) {
    $this->append('title', sprintf(' | %s', Configure::read('layoutApp.title')));
}

$this->start('navbar.top');
// echo '<li><a href="#">Hello</a></li>';

if ($this->Session->read('Auth.Master')) {
	echo '<li>'.$this->Html->link(__('Admins'), ['prefix' => 'master', 'controller' => 'Admins', 'action' => 'index']).'</li>';
	echo '<li>'.$this->Html->link(__('Trans'), ['prefix' => 'master', 'controller' => 'Trans', 'action' => 'index']).'</li>';
}

echo '<li>'.$this->Html->link(__('Lands'), ['controller' => 'Lands', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Land Types'), ['controller' => 'LandTypes', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Land Statuses'), ['controller' => 'LandStatuses', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Costs'), ['controller' => 'Costs', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Cost Cats'), ['controller' => 'CostCats', 'action' => 'index']).'</li>';

if ($this->Session->read('Auth.Master')) {
	echo '<li>'.$this->Html->link(__('Logout'), ['prefix' => false, 'controller' => 'Masters', 'action' => 'logout']).'</li>';
}

if ($this->Session->read('Auth.Admin')) {
	echo '<li>'.$this->Html->link(__('Logout'), ['prefix' => false, 'controller' => 'Admins', 'action' => 'logout']).'</li>';

	// echo '<li>';
	// echo $this->Html->link(__('Profile'), '#');
	// echo '<ul>';
	// echo '<li>Test1</li>';
	// echo '</ul>';
	// echo '</li>';
}

$this->end();
// $this->set('navbar.top', '<li><a href="#">Hello</a></li>');


// Prepend some meta tags
$this->prepend('meta', $this->Html->meta('icon'));
$this->prepend('meta', $this->Html->meta('viewport', 'width=device-width, initial-scale=1'));
if (Configure::read('App.author')) {
    $this->prepend('meta', $this->Html->meta('author', null, [
        'name'    => 'author',
        'content' => Configure::read('App.author')
    ]));
}

// Prepend scripts required by the navbar
$this->prepend('script', $this->Html->script([
    '//code.jquery.com/jquery-2.1.1.min.js',
    '/bootstrap/js/transition',
    '/bootstrap/js/collapse',
    '/bootstrap/js/dropdown',
    '/bootstrap/js/alert',
    '//cdnjs.cloudflare.com/ajax/libs/cleave.js/1.4.7/cleave.min.js', 
]));

?>
<!DOCTYPE html>
<?= $this->fetch('html'); ?>
<head>
    <?= $this->Html->charset(); ?>
    <title>layout
        <?= $this->fetch('title'); ?>
    </title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T7R65L7');</script>
    <!-- End Google Tag Manager -->

    <?php
    // Meta
    echo $this->fetch('meta');

    // Styles
    echo $this->Less->less([
        'Bootstrap.less/bootstrap.less'
        // 'Bootstrap.less/cakephp/styles.less'
    ]);
    echo $this->fetch('css');

    // Sometimes we'll want to send scripts to the top (rarely..)
    echo $this->fetch('script.top');
    ?>
    <style>
    h6.subheader {
        font-weight: bold;
        /*color: brown;*/
        /*color: darkgreen;*/
        color: forestgreen;
    }
    </style>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7R65L7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <header role="banner" class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <?php if ($this->fetch('navbar.top')): ?>
                <button data-target="#navbar-top" data-toggle="collapse" type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php endif; ?>
                <?= $this->Html->link(Configure::read('App.name'), '/', ['class' => 'navbar-brand']); ?>
            </div>
            <?php
            if (($this->Session->read('Auth.Master') or
            	$this->Session->read('Auth.Admin')) and
            	$this->fetch('navbar.top')): ?>
            <nav role="navigation" class="collapse navbar-collapse" id="navbar-top">
                <ul class="nav navbar-nav">
                    <?= $this->fetch('navbar.top'); ?>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </header>
    <?php //pr($this->Session->read('Auth.Master'),'Auth.Master') ?>
    <?php //pr($this->Session->read('Auth.Admin'),'Auth.Admin') ?>
    <div class="container">
        <div id="content" class="row">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content'); ?>
        </div>
    </div>
    <?= $this->fetch('script'); ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.4.7/cleave.min.js"></script> -->
<script>
// document.addEventListener('DOMContentLoaded', () => {
//     const cleave = new Cleave('.currency-comma', {
// 		numeral: true,
// 		numeralThousandsGroupStyle: 'thousand'
// 	});
// });
</script>
</body>
</html>
