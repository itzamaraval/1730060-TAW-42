<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fabricante Entity
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $direccion
 * @property string|null $correo
 * @property string|null $telefono
 * @property int $categoria_id
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\Producto[] $productos
 */
class Fabricante extends Entity
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
        'direccion' => true,
        'correo' => true,
        'telefono' => true,
        'categoria_id' => true,
        'categoria' => true,
        'productos' => true,
    ];
}
