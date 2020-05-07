<div class="list-group list-group-flush">
    <x-crudify-input name="nombre_articulo" :value="old('nombre_articulo', $dulceria->nombre_articulo ?? '')" />
    <x-crudify-input name="costo" type="number" :value="old('costo', $dulceria->costo ?? '')" />
</div>
