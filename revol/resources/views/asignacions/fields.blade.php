<?php 
$opcionesC;
$opcionesJ;

foreach ($consolas as $p) {
    $opcionesC[$p->numero] = $p->id;
}

foreach ($juegos as $j) {
    $opcionesJ[$j->titulo] = $j->id;
}

?>

<div class="list-group list-group-flush">
    <x-crudify-select name="consola_id" :options="$opcionesC ?? []" :empty="false" :value="old('consola_id', $asignacion->consola_id ?? '')" />
    <x-crudify-select name="juego_id" :options="$opcionesJ ?? []" :empty="false" :value="old('juego_id', $asignacion->juego_id ?? '')" />

</div>
