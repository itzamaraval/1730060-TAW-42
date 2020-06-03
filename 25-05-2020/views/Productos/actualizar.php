<div class="container-fluid mt-4">
    	<div class="row">
    		<div class="container col-sm-12 col-md-10 col-lg-10 col-xl-7">

    			<div class="panel panel-default">
    				<div class="panel-body">

    					<form action="?controller=Producto&action=actualizar" method="POST" data-parsley-validate>
    						<!-- Agregar id para notificación overhang -->

    						<div class="row">
    							<div class="col-12 col-sm-6 col-md-7">
    								<legend>Actualizar</legend>
    							</div>
    							<div class="col-12 col-sm-6 col-md-5">
    								<div class="text-right">
    									<a href="?controller=Producto&action=mostrar"><label>Regresar a lista de productos</label></a>
    								</div>
    							</div>
    						</div>

    						<input type="hidden" name="txtId" value="<?php echo $_GET['id']; ?>">

    						<div class="form-row">
    							<div class="form-group col-sm-4">
    								<label for="nombre">Codigo</label><label class="text-danger">*</label>
    								<input value="<?php echo $producto->getCodigo() ?>" type="text" name="txtCodigo" class="form-control" id="nombre" placeholder="Codigo del producto" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required>
    							</div>
    							<div class="form-group col-sm-4">
    								<label for="nombre">Nombre</label>
    								<input type="text" name="txtNombre" class="form-control" id="nombre" placeholder="Nombre del producto" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 30]" data-parsley-trigger="keyup" required value="<?php echo $producto->getNombre() ?>">
    							</div>

    							<div class="form-group col-sm-4">
    								<label for="descripcion">Descripción</label>
    								<input type="text" name="txtDescripcion" class="form-control" id="descripcion" placeholder="Descripción del producto" data-parsley-pattern="^[A-zÀ-ú ]+$" data-parsley-length="[2, 120]" data-parsley-trigger="keyup" required value="<?php echo $producto->getDescripcion() ?>">
    							</div>
    						</div>

    						<div class="form-row">
    							<div class="form-group col-md-4">
    								<label for="cantidad">Precio de compra</label>
    								<div class="input-group">
    									<div class="input-group-prepend"><span class="input-group-text">MXN</span></div>
    									<input type="number" name="txtCompra" class="form-control" id="compra" data-parsley-length="[1, 8]" data-parsley-trigger="keyup" data-parsley-errors-container="#help-compra" required value="<?php echo $producto->getPrecioCompra() ?>">
    								</div>
    								<span id="help-compra"></span>
    							</div>

    							<div class="form-group col-md-4">
    								<label for="cantidad">Precio de venta</label>
    								<div class="input-group">
    									<div class="input-group-prepend"><span class="input-group-text">MXN</span></div>
    									<input type="number" name="txtVenta" class="form-control" id="venta" data-parsley-length="[1, 8]" data-parsley-trigger="keyup" data-parsley-errors-container="#help-venta" required value="<?php echo $producto->getPrecioVenta() ?>">
    								</div>
    								<span id="help-venta"></span>
    							</div>

    							<div class="form-group col-sm-4">
    								<label for="categoria">Categoria</label>
    								<select name="txtCategoria" class="form-control" id="categoria" required>
    									<option value="">Seleccione una categoría</option>

    									<?php foreach ($categorias as $categoria) {
											if ($producto->getIdCategoria() == $categoria['id']) { ?>
    											<option selected="selected" value="<?= $categoria['id'] ?>">-- SELECCIONADA-- <?= $categoria['nombre'] ?></option>
    										<?php } else {
											?>
    											<option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
    										<?php } ?>
    									<?php } ?>
    								</select>
    							</div>
    						</div>

    						<div class="col-md-12 text-right">
    							<button type="reset" class="btn btn-secondary">Limpiar</button>
    							<button type="submit" class="btn btn-primary">Registrar</button>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>