<div class="text-nowrap text-md-right">
    <a href="{{ route('rentas.show', $renta->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Show') }}">
        <i class="far fa-eye {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('rentas.edit', $renta->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Edit') }}">
        <i class="far fa-edit {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('rentas.destroy', $renta->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Delete') }}"
       onclick="event.preventDefault(); if (confirm('{{ __('Eliminar Renta?') }}')) $('#delete_renta_{{ $renta->id }}_form').submit();">
        <i class="far fa-trash-alt {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <form method="post" action="{{ route('rentas.destroy', $renta->id) }}" id="delete_renta_{{ $renta->id }}_form" class="d-none">
        @csrf
        @method('delete')
    </form>
</div>
