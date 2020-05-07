<?php 
$opcionG;
$opcionA;

foreach ($articulos as $a) {
	$opcionA[$a->nombre_articulo . ' $' . $a->costo] = $a->id;
}

foreach ($gamers as $g) {
	$opcionG[$g->gamertag] = $g->id;
}
?>

<div class="list-group list-group-flush">
    <x-crudify-select name="gamer_id" id="gamer_id" :options="$opcionG ?? []" :empty="false" :label="__('Gamer')" :value="old('gamer_id', $ventas->gamer_id ?? '')" />
    <x-crudify-select name="articulo_id" id="articulo_id" :options="$opcionA ?? []" :empty="false" :label="__('Articulo')" :value="old('articulo_id', $ventas->articulo_id ?? '')" />
    <x-crudify-input name="cantidad" id="cantidad" type="number" :value="old('cantidad', $venta->cantidad ?? '1')" />
    <x-crudify-input name="monto_total" id="monto_total" readonly="readonly" type="number" :value="old('monto_total', $venta->monto_total ?? '')" />
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

function getTotal(){
    var articulo_id = $("#articulo_id").val();
    var cantidad = $("#cantidad").val();

    $.ajax({
        method: "POST",
        url: "/getTotalVenta",
        data: {
            "_token": "{{ csrf_token() }}",
            "articulo_id": articulo_id,
            "cantidad": cantidad
        },
    }).done(function( respuesta ) {
        if(respuesta){
            $("#monto_total").val(respuesta.total);
        }
    });
}

$("#cantidad").on('change paste keyup', function() {
  getTotal();
});

getTotal();
</script>