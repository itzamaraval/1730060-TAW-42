<div class="list-group list-group-flush">
    <x-crudify-input name="nombre" :value="old('nombre', $plataforma->nombre ?? '')" />
    <x-crudify-input name="costo" type="number" :value="old('costo', $plataforma->costo ?? '')" />
    <x-crudify-input name="costo_monedas" type="number" :value="old('costo', $plataforma->costo ?? '')" />
    <x-crudify-input name="monedas_hora" type="number" :value="old('costo', $plataforma->costo ?? '')" />
</div>