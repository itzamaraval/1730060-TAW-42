<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property int $fabricante_id
 * @property int $categoria_id
 * @property string|null $precio_venta
 * @property string|null $precio_compra
 * @property string|null $descripcion
 * @property \Cake\I18n\FrozenTime|null $creado
 *
 * @property \App\Model\Entity\Fabricante $fabricante
 * @property \App\Model\Entity\Categoria $categoria
 */
class Producto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nombre' => true,
        'fabricante_id' => true,
        'categoria_id' => true,
        'precio_venta' => true,
        'precio_compra' => true,
        'descripcion' => true,
        'creado' => true,
        'fabricante' => true,
        'categoria' => true,
    ];
}
