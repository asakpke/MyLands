<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LandStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LandStatusesTable Test Case
 */
class LandStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LandStatusesTable
     */
    public $LandStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.land_statuses',
        'app.admins',
        'app.lands'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LandStatuses') ? [] : ['className' => LandStatusesTable::class];
        $this->LandStatuses = TableRegistry::getTableLocator()->get('LandStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LandStatuses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
