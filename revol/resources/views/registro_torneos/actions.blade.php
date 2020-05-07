<div class="text-nowrap text-md-right">
    <a href="{{ route('registro_torneos.show', $registro_torneo->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Show') }}">
        <i class="far fa-eye {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('registro_torneos.edit', $registro_torneo->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Edit') }}">
        <i class="far fa-edit {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <a href="{{ route('registro_torneos.destroy', $registro_torneo->id) }}" class="btn {{ !request()->ajax() ? 'btn-primary' : 'btn-link text-secondary p-1' }}" title="{{ __('Delete') }}"
       onclick="event.preventDefault(); if (confirm('{{ __('Eliminar gamer del torneo?') }}')) $('#delete_registro_torneo_{{ $registro_torneo->id }}_form').submit();">
        <i class="far fa-trash-alt {{ !request()->ajax() ? 'fa-fw' : '' }}"></i>
    </a>

    <form method="post" action="{{ route('registro_torneos.destroy', $registro_torneo->id) }}" id="delete_registro_torneo_{{ $registro_torneo->id }}_form" class="d-none">
        @csrf
        @method('delete')
    </form>
</div>
