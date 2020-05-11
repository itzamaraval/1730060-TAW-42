<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FabricantesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FabricantesTable Test Case
 */
class FabricantesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FabricantesTable
     */
    protected $Fabricantes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Fabricantes',
        'app.Categorias',
        'app.Productos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Fabricantes') ? [] : ['className' => FabricantesTable::class];
        $this->Fabricantes = TableRegistry::getTableLocator()->get('Fabricantes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Fabricantes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
