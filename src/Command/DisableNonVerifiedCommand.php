<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;

class DisableNonVerifiedCommand extends Command
{
	public function initialize()
	{
		parent::initialize();
		// $this->loadModel('Users');
		$this->loadModel('Admins');
	}

	public function execute(Arguments $args, ConsoleIo $io)
	{
		$io->out('Hello world1.');
		$admin = $this->Admins->get(3, [
            'contain' => ['CostCats', 'LandStatuses', 'LandTypes', 'Lands']
        ]);
        // pr($admin);
        // pr($admin->name);
		$io->out($admin->name);
	}
} 