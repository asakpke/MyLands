<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CostCatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CostCatsTable Test Case
 */
class CostCatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CostCatsTable
     */
    public $CostCats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cost_cats',
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
        $config = TableRegistry::getTableLocator()->exists('CostCats') ? [] : ['className' => CostCatsTable::class];
        $this->CostCats = TableRegistry::getTableLocator()->get('CostCats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CostCats);

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
