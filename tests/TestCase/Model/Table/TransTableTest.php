<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TransTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TransTable Test Case
 */
class TransTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TransTable
     */
    public $Trans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trans',
        'app.admins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Trans') ? [] : ['className' => TransTable::class];
        $this->Trans = TableRegistry::getTableLocator()->get('Trans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Trans);

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
