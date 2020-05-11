<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductosTable Test Case
 */
class ProductosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductosTable
     */
    protected $Productos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Productos',
        'app.Fabricantes',
        'app.Categorias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Productos') ? [] : ['className' => ProductosTable::class];
        $this->Productos = TableRegistry::getTableLocator()->get('Productos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Productos);

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
