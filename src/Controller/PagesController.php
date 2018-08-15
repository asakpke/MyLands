<?php
namespace App\Controller;

class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow([
            'home',
        ]);
    }
    
    public function home()
    {
        // $this->layout = false;
    }
}
