<div class="list-group list-group-flush">
    <x-crudify-input name="primer_lugar" :value="old('primer_lugar', $premio->primer_lugar ?? '')" />
    <x-crudify-input name="segundo_lugar" :value="old('segundo_lugar', $premio->segundo_lugar ?? '')" />
    <x-crudify-input name="tercer_lugar" :value="old('tercer_lugar', $premio->tercer_lugar ?? '')" />
</div>
