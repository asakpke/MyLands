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
        // $this->layout = 'default';
        $this->layout = 'bs337';
        // echo $this->request->env('HTTP_HOST');
    }
}
