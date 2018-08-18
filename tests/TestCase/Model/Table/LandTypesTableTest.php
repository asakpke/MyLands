<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LandTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LandTypesTable Test Case
 */
class LandTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LandTypesTable
     */
    public $LandTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.land_types',
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
        $config = TableRegistry::getTableLocator()->exists('LandTypes') ? [] : ['className' => LandTypesTable::class];
        $this->LandTypes = TableRegistry::getTableLocator()->get('LandTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LandTypes);

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
