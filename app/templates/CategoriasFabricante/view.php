<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriasFabricante $categoriasFabricante
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Categorias Fabricante'), ['action' => 'edit', $categoriasFabricante->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Categorias Fabricante'), ['action' => 'delete', $categoriasFabricante->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasFabricante->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Categorias Fabricante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Categorias Fabricante'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categoriasFabricante view content">
            <h3><?= h($categoriasFabricante->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($categoriasFabricante->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($categoriasFabricante->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
