<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PageElementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PageElementsTable Test Case
 */
class PageElementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PageElementsTable
     */
    public $PageElements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.page_elements',
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
        $config = TableRegistry::getTableLocator()->exists('PageElements') ? [] : ['className' => PageElementsTable::class];
        $this->PageElements = TableRegistry::getTableLocator()->get('PageElements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PageElements);

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
