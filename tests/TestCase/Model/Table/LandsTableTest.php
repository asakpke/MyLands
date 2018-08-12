<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LandsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LandsTable Test Case
 */
class LandsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LandsTable
     */
    public $Lands;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lands',
        'app.admins',
        'app.costs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lands') ? [] : ['className' => LandsTable::class];
        $this->Lands = TableRegistry::getTableLocator()->get('Lands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lands);

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
