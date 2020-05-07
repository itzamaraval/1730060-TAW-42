<?php 

$opcionJ;
$opcionP;

foreach ($juego as $j) {
	$opcionJ[$j->titulo] = $j->id;
}

foreach ($premio as $p) {
	$opcionP['Primer lugar: ' . $p->primer_lugar . ' - Segundo lugar:' . $p->segundo_lugar . ' - Tercer lugar: ' . $p->tercer_lugar] = $p->id;
}

?>


<div class="list-group list-group-flush">
    <x-crudify-input name="titulo" :value="old('titulo', $torneo->titulo ?? '')" />
    <x-crudify-select name="juego" id="juego" :options="$opcionJ ?? []" :empty="false" :label="__('Juego')" :value="old('juego', $torneo->juego ?? '')" />
    <x-crudify-input name="fecha" type="date" :value="old('fecha', $torneo->fecha ?? '')" />
    <x-crudify-input name="hora" type="time" :value="old('hora', $torneo->hora ?? '')" />
    <x-crudify-select name="modalidad" id="modalidad" :options="['Single'=>1, 'Dúos'=>2, 'Equipos'=>3] ?? []" :empty="false" :label="__('Modalidad')" :value="old('modalidad', $torneo->modalidad ?? '')" />
    <x-crudify-select name="forma" id="forma" :options="['Presencial'=>1, 'En línea'=>2, 'Ambas'=>3] ?? []" :empty="false" :label="__('Forma')" :value="old('forma', $torneo->forma ?? '')" />
    <x-crudify-input name="max_jugadores" type="number" :label="__('Cantidad maxima de jugadores')" :value="old('max_jugadores', $torneo->max_jugadores ?? '')" />
    <x-crudify-textarea name="descripcion" type="number" :label="__('descripcion')" :value="old('descripcion', $torneo->descripcion ?? '')" />
    <x-crudify-select name="premios" id="premios" :options="$opcionP ?? []" :empty="false" :label="__('Premios')" :value="old('premios', $torneo->premios ?? '')" />
    <x-crudify-select name="estatus" id="estatus" :options="['Pendiente'=>1, 'En curso'=>2, 'Finalizado'=>3, 'Cancelado'=>4] ?? []" :empty="false" :label="__('Estatus')" :value="old('estatus', $torneo->estatus ?? '')" />
</div>
