<div class="text-nowrap text-md-right">
    <a href="{{ route('dulcerias.show', $dulceria->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Show') }}">
        <i class="far fa-eye {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('dulcerias.edit', $dulceria->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Edit') }}">
        <i class="far fa-edit {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('dulcerias.destroy', $dulceria->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Delete') }}"
       onclick="event.preventDefault(); if (confirm('{{ __('Eliminar articulo?') }}')) $('#delete_dulceria_{{ $dulceria->id }}_form').submit();">
        <i class="far fa-trash-alt {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <form method="post" action="{{ route('dulcerias.destroy', $dulceria->id) }}" id="delete_dulceria_{{ $dulceria->id }}_form" class="d-none">
        @csrf
        @method('delete')
    </form>
</div>
