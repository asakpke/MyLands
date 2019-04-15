<?php
namespace App\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
// use Cake\I18n\Time;
use Cake\I18n\Date;

class ChargeAdminCommand extends Command
{
	public function initialize()
	{
		parent::initialize();
		$this->loadModel('Admins');
		$this->loadModel('Trans');
	}

	public function execute(Arguments $args, ConsoleIo $io)
	{
		// $io->out('START ChargeAdminCommand');
		
		// $date = new Date('30 days ago');
		// $next_month = new Date('1 month ago');
		$next_month = new Date('+1 month');
		// $io->out($date->format('Y-m-d'));
		$today = new Date();

		$this->Admins->updateAll(
			[  // fields
				'is_verified' => 0,
			],
			[  // conditions
				'is_verified' => 1,
				'next_payment <' => $today->format('Y-m-d'),
				'balance <' => 500,
			]
		);

		$admins = $this->Admins->find('all')
			->where([
				'is_verified' => 1,
				// 'status' => 'Active',
				'next_payment <' => $today->format('Y-m-d'),
				// ' <' => $today->format('Y-m-d'),
			])
		;

		foreach ($admins as $admin) {
			// $io->out($admin);
			// $io->out($admin->name);

			// if ($admin->balance < 500) {
			// 	$io->out('admin balance < 500');

			// 	// $this->Admins->updateAll(
			// 	// 	[  // fields
			// 	// 		'is_verified' => 0,
			// 	// 	],
			// 	// 	[  // conditions
			// 	// 		'id' => $admin->id,
			// 	// 	]
			// 	// );
			// }
			// else {
			$tran = $this->Trans->newEntity();
			$data = array();
			$data['admin_id'] = $admin->id;
			$data['amount'] = -500;
			$tran = $this->Trans->patchEntity($tran, $data);
			// pr($tran);
			// dd($tran);
			
			$this->Trans->save($tran);

			$this->Admins->updateAll(
				[  // fields
					'balance' => $admin->balance - 500,
					'next_payment' => $next_month->format('Y-m-d'),
				],
				[  // conditions
					'id' => $admin->id,
				]
			);
			// }
		}

		// $io->out('ENDED ChargeAdminCommand');
	}
}