<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
// use Cake\I18n\Time;
use Cake\I18n\Date;

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
		// $io->out('Hello world1.');
		// $io->out('START DisableNonVerified');

		// $admin = $this->Admins->get(3, [
		// 	'contain' => ['CostCats', 'LandStatuses', 'LandTypes', 'Lands']
		// ]);

		// $date = new DateTime(date('Y-m-d'));
		// $date->sub(new DateInterval('P30D'));
		// pr($date->format('Y-m-d'),'$date->format(Y-m-d)');
		// $io->out($date->format('Y-m-d'));

		// $time = new Time('2 hours ago');
		// $time = new Time('1 month ago');
		// $date = new Date();
		// $date = new Date('1 month ago');
		$date = new Date('15 days ago');
		// $time = Time::now();
		// $io->out($time);
		// $io->out($time->timezone);
		// $io->out($time->timezone());
		// $io->out($time->timeAgoInWords());
		// $io->out($time->nice());
		// $io->out($time->nice('Europe/Paris', 'fr-FR'));
		// $io->out($time->nice('Asia/Karachi'));
		// $io->out($date);
		// $io->out($date->format('Y-m-d'));
		// exit;

		// $admins = $this->Admins->find('all')
		// 	->where([
		// 		'is_verified' => 0,
		// 		'status' => 'Active',
		// 		'DATE(created) <' => $date->format('Y-m-d'),
		// 	])
		// ;

		$this->Admins->updateAll(
			[  // fields
				'status' => 'Disabled',
			],
			[  // conditions
				'is_verified' => 0,
				'status' => 'Active',
				'DATE(created) <' => $date->format('Y-m-d'),
			]
		);


		// pr($admin);
		// pr($admin->name);
		// $io->out($admin->name);
		// $io->out($admin);
		// $io->out($admins);
		// $results = $admin->all();
		// $results = $admins->all();
		// $results = $admin->toList();
		// $results = $admins->toList();
		// $results = $admin->toArray();
		// $results = $admins->toArray();
		// $io->helper('Table')->output($admin);
		// $io->helper('Table')->output($results);
		// $io->out($results);

		// $data = $results->toList();
		// $data = $results->toArray();
		// // $io->out($data);
		// $io->helper('Table')->output($data);

		// foreach ($admins as $row) {
			// $io->out($row);
			// $io->out($row->name);
			// $io->helper('Table')->output($row);

			// $results = $row->all();
			// $results = $row->toList();
			// $io->helper('Table')->output($results);
		// }

		// $io->out('ENDED DisableNonVerified');
	}
} 