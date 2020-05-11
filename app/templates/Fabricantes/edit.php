<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fabricante $fabricante
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fabricante->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fabricante->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fabricantes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fabricantes form content">
            <?= $this->Form->create($fabricante) ?>
            <fieldset>
                <legend><?= __('Edit Fabricante') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('correo');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('categoria_id', ['options' => $categorias]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
