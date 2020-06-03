<div class="container">
    <h2 class="mt-4">Categorías de Productos</h2>

    <div class="row mt-4 mb-4">
        <div class="col-6">
            <div class="text-left">
                <a href="?controller=CategoriasProducto&action=registrar" class="btn btn-sm btn-outline-primary"><i class="fa fa-fw fa-plus-circle"></i> Registrar una nueva categoría</a>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <i class="fa fa-fw fa-globe"></i><strong> Buscar una categoría</strong>
            </div>
        </div>
    </div>

    <div class="table table-bordered table-striped table-hover display nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th style="width: 33%;" scope="col">Id</th>
                    <th style="width: 33%;" scope="col">Nombre</th>
                    <th style="width: 33%;" scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($categorias as $categoria) { ?>


                    <tr>
                        <td><?php echo $categoria->getId(); ?></td>
                        <td><?php echo $categoria->getNombre(); ?></td>
                        <td class="actions">
                            <a href="?controller=CategoriasProducto&&action=actualizarCategoria&&id=<?php echo $categoria->getId() ?>" class="edit">
                                <div class="text-center"><i class="fas fa-pen"></i> Editar</div>
                            </a>
                            <a href="?controller=CategoriasProducto&&action=eliminar&&id=<?php echo $categoria->getId() ?>" class="trash">
                                <div class='text-center'><i class='fas fa-trash'></i> Eliminar</div>
                            </a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Eliminar categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="eliminar.php" id="eliminarMiembroModal" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <p>¿Seguro(a) que deseas eliminar esta categoría de producto?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                    <a class="btn btn-danger" href="?controller=CategoriasProducto&&action=eliminar&&id=<?php echo $categoria->getId() ?>">Eliminar</a>
                </div>
            </form>
        </div>
    </div>
</div>