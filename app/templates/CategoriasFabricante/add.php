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
            <?= $this->Html->link(__('List Categorias Fabricante'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="categoriasFabricante form content">
            <?= $this->Form->create($categoriasFabricante) ?>
            <fieldset>
                <legend><?= __('Add Categorias Fabricante') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
