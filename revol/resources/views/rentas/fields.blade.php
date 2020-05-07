<?php
$gamers;
$consolas;

foreach ($gamersQuery as $p) {
    $gamers[$p->nombre.' '.$p->apellidos.' ('.$p->gamertag.')'] = $p->id;
}

foreach ($consolasQuery as $c) {
    $consolas[$c->numero.' - '.$c->plataforma . ' - Costo en monedas: ' . $c->monedas_plat] = $c->id;
}

?>
<div class="list-group list-group-flush">
    <x-crudify-select name="gamer_id" id="gamer_id" :options="$gamers ?? []" :empty="false" :label="__('Gamer')" :value="old('gamer_id', $renta->gamer_id ?? '')" />
    <x-crudify-select name="consola_id" id="consola_id" :options="$consolas ?? []" :empty="false" :label="__('Consola')" :value="old('consola_id', $renta->consola_id ?? '')" />
    <x-crudify-input name="nhoras" id="nhoras" type="number" :value="old('nhoras', $renta->nhoras ?? '1')" />
    <x-crudify-input name="horas_monedas" id="horas_monedas" type="number" min="0" max="5" :value="old('horas_monedas', $renta->horas_monedas ?? '0')" requiered/>
    <x-crudify-input name="monedas_gamer" id="monedas_gamer" readonly="readonly" type="number" :value="old('monedas_gamer', $renta->monedas_gamer ?? '')" />
    <x-crudify-input name="monedas_gastadas" id="monedas_gastadas" readonly="readonly" type="number" :value="old('monedas_gastadas', $renta->monedas_gastadas ?? '')" />
    <x-crudify-input name="total" id="total" readonly="readonly" type="number" :value="old('total', $renta->total ?? '')" />

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
document.getElementById("horas_monedas").min = "0";
document.getElementById("horas_monedas").max = $('#nhoras').val();
document.getElementById("horas_monedas").addEventListener("onkeydown", validate());

function validate() {
    if ($('#horas_monedas').val() > $('#nhoras').val()) {
        $('#horas_monedas').val($('#nhoras').val());
    } else if ($('#horas_monedas').val() < 0) {
        $('#horas_monedas').val(0);
    }

}

function getPlatMonedas(){
    var consola_id = $("#consola_id").val();
    var horas_monedas = $('#horas_monedas').val();
    var monedas_gamer = $('#monedas_gamer').val();
    var gamer_id = $("#gamer_id").val();
    var nhoras = $('#nhoras').val();

    $.ajax({
        method: "POST",
        url: "/getPlatMonedas",
        data: {
            "_token": "{{ csrf_token() }}",
            "consola_id": consola_id,
            "horas_monedas": horas_monedas,
            "monedas_gamer": monedas_gamer,
            "gamer_id": gamer_id,
            "nhoras": nhoras
        },
    }).done(function( respuesta ) {
        console.log(respuesta)
        if(respuesta){
            $("#monedas_gamer").val(respuesta.monedas_gamer);
            $('#monedas_gastadas').val(respuesta.monedas_gastadas);
            $('#horas_monedas').val(respuesta.horas_totales);
            $('#total').val(respuesta.costo);
        }
    });
}

function getMonedas(){
    var gamer_id = $("#gamer_id").val();

    $.ajax({
        method: "POST",
        url: "/getMonedas",
        data: {
            "_token": "{{ csrf_token() }}",
            "gamer_id": gamer_id,
        },
    }).done(function( respuesta ) {
        if(respuesta){
            $("#monedas_gamer").val(respuesta.monedas);
        }
    });
}

function getTotal(){
    var consola_id = $("#consola_id").val();
    var nhoras = $("#nhoras").val();

    $.ajax({
        method: "POST",
        url: "/getTotalRenta",
        data: {
            "_token": "{{ csrf_token() }}",
            "nhoras": nhoras,
            "consola_id": consola_id
        },
    }).done(function( respuesta ) {
        if(respuesta){
            $("#total").val(respuesta.total);
        }
    });
}



$('#gamer_id').change(function(){
    getMonedas();
});

$("#nhoras").on('change paste keyup', function() {
    getTotal();
});

$('#horas_monedas').on('change paste keyup', function(){
    getPlatMonedas();
    validate();
});

getTotal();
getMonedas();
validate();
getPlatMonedas();
</script>