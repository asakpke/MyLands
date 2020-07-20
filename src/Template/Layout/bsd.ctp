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
?>
<!-- <a href="/" class="navbar-brand">MyLands.pk</a> -->

<?php
if ($this->Session->read('Auth.Master')) {
    echo '<li>'.$this->Html->link(__('Admins'), ['prefix' => 'master', 'controller' => 'Admins', 'action' => 'index']).'</li>';
    echo '<li>'.$this->Html->link(__('Trans'), ['prefix' => 'master', 'controller' => 'Trans', 'action' => 'index']).'</li>';
}

echo '<li>'.$this->Html->link(__('Lands'), ['controller' => 'Lands', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Land Types'), ['controller' => 'LandTypes', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Land Statuses'), ['controller' => 'LandStatuses', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Costs'), ['controller' => 'Costs', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Cost Cats'), ['controller' => 'CostCats', 'action' => 'index']).'</li>';
echo '<li>'.$this->Html->link(__('Page Elements'), ['controller' => 'PageElements', 'action' => 'index']).'</li>';
?>

<!-- abc -->
<!-- <head> -->
    
<style type="text/css">
    

/*salar start*/

.dropbtn
{
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown
{
    position: relative;
    display: inline-block;
}
.dropdown-content
{
    display: none;
    position: absolute;
    min-width: 160px;
    ox-shadow: 0 8px 16px 0 
    rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a
{
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    background:#eee; 
}
.dropdown-content a:hover
{
    background-color: #ddd;
}
.dropdown:hover .dropdown-content
{
    display: block;
}
.dropdown:hover .dropbtn
{
    background-color: #3e8e41;
}

    /*salar end*/

</style>

</head>
<!-- sheikh salar start -->
<?php
if ($this->Session->read('Auth.Admin')) {
?>
<div class="container">
<div class="row">
<div class="dropdown">
    <button class="dropbtn">Reports</button>
    <div class="dropdown-content">
        <a href="/admin/reports/index">Reports Added</a>
    </div>
</div>
<div class="dropdown">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
        <a href="/admin/admins/profile">Edit Profile</a>
        <a href="/admins/logout">Logout</a>
    </div>
</div>
</div>
</div>
<?php
}
// <!-- sheikh salar end -->


if ($this->Session->read('Auth.Master')) {
    echo '<li>'.$this->Html->link(__('Logout'), ['prefix' => false, 'controller' => 'Masters', 'action' => 'logout']).'</li>';
}

// if ($this->Session->read('Auth.Admin')) {
//     echo '<li>'.$this->Html->link(__('Logout'), ['prefix' => false, 'controller' => 'Admins', 'action' => 'logout']).'</li>';

//     // echo '<li>';
//     // echo $this->Html->link(__('Profile'), '#');
//     // echo '<ul>';
//     // echo '<li>Test1</li>';
//     // echo '</ul>';
//     // echo '</li>';
// }

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
    // 'jquery-3.5.1.js',
]));

?><!DOCTYPE html>
<?= $this->fetch('html'); ?>
<head>
    <?= $this->Html->charset(); ?>
    <title>layout
        <?= $this->fetch('title'); ?>
    </title>
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

        .pagination > li {
            display: inline-block;
        }
    </style>
</head>
<body>
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
//      numeral: true,
//      numeralThousandsGroupStyle: 'thousand'
//  });
// });
</script>
</body>
</html>
