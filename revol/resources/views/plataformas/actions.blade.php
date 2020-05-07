<div class="text-nowrap text-md-right">
    <a href="{{ route('plataformas.show', $plataforma->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Show') }}">
        <i class="far fa-eye {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('plataformas.edit', $plataforma->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Edit') }}">
        <i class="far fa-edit {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('plataformas.destroy', $plataforma->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Delete') }}"
       onclick="event.preventDefault(); if (confirm('{{ __('Eliminar Plataforma?') }}')) $('#delete_plataforma_{{ $plataforma->id }}_form').submit();">
        <i class="far fa-trash-alt {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <form method="post" action="{{ route('plataformas.destroy', $plataforma->id) }}" id="delete_plataforma_{{ $plataforma->id }}_form" class="d-none">
        @csrf
        @method('delete')
    </form>
</div>
