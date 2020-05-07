<div class="list-group list-group-flush">
    <x-crudify-input name="titulo" :value="old('titulo', $juego->titulo ?? '')" />
    <x-crudify-input name="plataformas" :value="old('plataformas', $juego->plataformas ?? '')" />

    <x-crudify-file name="imagen" />
    <!--<input type="file" name="imagen">-->


</div>
