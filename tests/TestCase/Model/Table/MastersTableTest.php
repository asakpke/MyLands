<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MastersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MastersTable Test Case
 */
class MastersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MastersTable
     */
    public $Masters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.masters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Masters') ? [] : ['className' => MastersTable::class];
        $this->Masters = TableRegistry::getTableLocator()->get('Masters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Masters);

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
