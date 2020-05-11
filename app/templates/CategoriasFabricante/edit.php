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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoriasFabricante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoriasFabricante->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Categorias Fabricante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categoriasFabricante form content">
            <?= $this->Form->create($categoriasFabricante) ?>
            <fieldset>
                <legend><?= __('Edit Categorias Fabricante') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
