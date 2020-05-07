<?php 

$opcionG;
$opcionT;

foreach ($gamer as $g) {
	$opcionG[$g->gamertag] = $g->id;
}

foreach ($torneo as $t) {
	$opcionT[$t->id . ' - ' . $t->titulo] = $t->id;
}

?>

<div class="list-group list-group-flush">
    <x-crudify-select name="gamer" id="gamer" :options="$opcionG ?? []" :empty="false" :label="__('Gamer')" :value="old('gamer', $registro_torneo->gamer ?? '')" />
    <x-crudify-select name="torneo" id="torneo" :options="$opcionT ?? []" :empty="false" :label="__('Torneo')" :value="old('torneo', $registro_torneo->torneo ?? '')" />
</div>
