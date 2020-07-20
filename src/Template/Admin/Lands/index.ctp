<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
  
    <style type="text/css">
        ul.pagination li
        {
            margin-top: 200px;
            
        }
        #search{
            width: 600px;
        }
        .form-control{
            width: 400px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <div class="col-md-6" style="display: inline-block;">
            <h2>
                <form style="display: inline-block;">
                    <input id="search" name="search" class="form-control" placeholder="Type your search & press enter key to filter lands" autofocus>
                    <button style="float: right; margin-top:-33px;margin-left:610px; " class="btn btn-success" onclick="myFunction()"><i class="fa fa-search"></i> Advanced</button>
                </form>
            <!-- </h2> -->
        </div>
    </div>
    <!-- <button class="btn btn-success" onclick="myFunction()"><i class="fa fa-search"></i>
Advanced</button> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script>
        function myFunction() {
          var x = document.getElementById("myDIV");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "block";
          }
        }
    </script> -->

    <!-- <script type="text/javascript">
        function myFunction() {
            document.getElementById("myDiv").style.display = "block";
        }
    </script> -->
    <!-- <div class="row" id="myDIV" method="post" style="display: none;"> -->
    <div class="row" id="myDIV" style="display: none;">
        <h4>
            <form method="post">
                <div class="col-md-6">
                <label>Name</label><input type="text" name="name" class="form-control" placeholder="Type land name & press submit button to filter lands">
                <br>
                <label>Acre</label><input type="text" name="acre" class="form-control" placeholder="Type Acre & press submit button to filter lands">
                </div>
                <div class="col-md-6">
                <label>Kanal</label><input type="text" name="kanal" class="form-control"placeholder="Type Kanal & press submit button to filter lands"><br>
                <label>Marla</label><input type="text" name="marla" class="form-control" placeholder="Type Marla & press submit button to filter lands">
                </div><br>
                <div class="col-md-6">
                    <br>
                <label>Location</label><input type="text" name="location" class="form-control" placeholder="Type Location & press submit button to filter lands"><br>
                <label>City</label><input type="text" name="city" class="form-control" placeholder="Type City & press submit button to filter lands">
                </div>
                <div class="col-md-6">
                    <br>
                <label>Khewat</label><input type="text" name="khewat" class="form-control" placeholder="Type Khewat & press submit button to filter lands"><br>
                <label>Khasra</label><input type="text" name="khasra" class="form-control" placeholder="Type Khasra & press submit button to filter lands">
                </div>
                <div class="col-md-6">
                    <br>
                <label>Patwar Halka</label><input type="text" name="patwar_halka" class="form-control" placeholder="Type Patwar Halka & press submit button to filter lands"><br>
                <label>Demand</label><input type="text" name="demand" class="form-control"placeholder="Type Demand & press submit button to filter lands">
                </div><br>
                <div class="col-md-6">
                    <br>
                <label>Sale</label><input type="text" name="sale" class="form-control"placeholder="Type sale & press submit button to filter lands"><br>
                <label>Cost</label><input type="text" name="cost" class="form-control" placeholder="Type Cost & press submit button to filter lands">
                </div>
                <div class="col-md-6">
                <br>
                <label>Purchased</label><input type="date" name="sale" class="form-control" placeholder="Type Purchased date & press submit button to filter lands"><br>
                <label>Public</label><input type="text" name="is_public" class="form-control" placeholder="Select Public & press submit button to filter lands">
                </div>
                <div class="col-md-6">
                <br>
                <label>Created</label><input type="date" name="created" class="form-control" placeholder="Type Created date & press submit button to filter lands"><br> 
                </div>
                <div class="col-md-6">
                <label>Modified</label><input type="date" name="modified" class="form-control"placeholder="Type Modified date & press submit button to filter lands"><br>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </h4>
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
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

