<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Categoria'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categorias view content">
            <h3><?= h($categoria->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($categoria->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($categoria->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Fabricantes') ?></h4>
                <?php if (!empty($categoria->fabricantes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Direccion') ?></th>
                            <th><?= __('Correo') ?></th>
                            <th><?= __('Telefono') ?></th>
                            <th><?= __('Categoria Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($categoria->fabricantes as $fabricantes) : ?>
                        <tr>
                            <td><?= h($fabricantes->id) ?></td>
                            <td><?= h($fabricantes->nombre) ?></td>
                            <td><?= h($fabricantes->direccion) ?></td>
                            <td><?= h($fabricantes->correo) ?></td>
                            <td><?= h($fabricantes->telefono) ?></td>
                            <td><?= h($fabricantes->categoria_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Fabricantes', 'action' => 'view', $fabricantes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Fabricantes', 'action' => 'edit', $fabricantes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fabricantes', 'action' => 'delete', $fabricantes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fabricantes->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Productos') ?></h4>
                <?php if (!empty($categoria->productos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Fabricante Id') ?></th>
                            <th><?= __('Categoria Id') ?></th>
                            <th><?= __('Precio Venta') ?></th>
                            <th><?= __('Precio Compra') ?></th>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Creado') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($categoria->productos as $productos) : ?>
                        <tr>
                            <td><?= h($productos->id) ?></td>
                            <td><?= h($productos->nombre) ?></td>
                            <td><?= h($productos->fabricante_id) ?></td>
                            <td><?= h($productos->categoria_id) ?></td>
                            <td><?= h($productos->precio_venta) ?></td>
                            <td><?= h($productos->precio_compra) ?></td>
                            <td><?= h($productos->descripcion) ?></td>
                            <td><?= h($productos->creado) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Productos', 'action' => 'view', $productos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Productos', 'action' => 'edit', $productos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Productos', 'action' => 'delete', $productos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
