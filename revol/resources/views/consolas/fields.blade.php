<!--
<select name="plataforma_id" class="form-control">
                    @foreach($plataformas as $p)
                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                    @endforeach
                </select>
-->
<?php
$opciones;

foreach ($plataformas as $p) {
    $opciones[$p->nombre] = $p->id;
}

?>

<div class="list-group list-group-flush">
    <x-crudify-input name="numero" :value="old('numero', $consola->numero ?? '')" />
    <!-- <x-crudify-select name="plataforma" :options="['Xbox' => 0,'Nintendo Switch' => 1,'Playstation' => 2,'PC' => 3 ]" :empty="false" :label="__('Plataforma')" :value="old('plataforma', $consola->plataforma ?? '')" /> -->
    <x-crudify-select name="plataforma_id" :options="$opciones" :empty="false" :label="__('Plataforma')" :value="old('plataforma_id', $consola->plataforma_id ?? '')" />
    <x-crudify-input name="serial" :value="old('serial', $consola->serial ?? '')" />

    <x-crudify-checkbox name="disponible" :label="__('Disponible')" :checkbox-label="__('Esta consola está disponible')" :value="old('disponible', $consola->disponible ?? 0)" />


</div>
