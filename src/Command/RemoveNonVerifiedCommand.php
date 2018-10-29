<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
// use Cake\I18n\Time;
use Cake\I18n\Date;

class RemoveNonVerifiedCommand extends Command
{
	public function initialize()
	{
		parent::initialize();
		$this->loadModel('Admins');
	}

	public function execute(Arguments $args, ConsoleIo $io)
	{
		$date = new Date('1 year ago');
		// $io->out($date->format('Y-m-d'));
		// exit;

		// $admins = $this->Admins->find('all')
		// 	->where([
		// 		'is_verified' => 0,
		// 		'status' => 'Disabled',
		// 		'DATE(created) <' => $date->format('Y-m-d'),
		// 	])
		// ;

		// foreach ($admins as $row) {
		// 	$io->out($row);
		// }

		$this->Admins->deleteAll([
			'is_verified' => 0,
			'status' => 'Disabled',
			'DATE(created) <' => $date->format('Y-m-d'),
		]);
	}
} 