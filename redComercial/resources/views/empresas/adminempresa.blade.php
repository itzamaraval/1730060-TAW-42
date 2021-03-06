@extends('layouts.app', ['title' => __('Empresas')])

@section('content')
@include('layouts.headers.blank')  

<div class="container-fluid mt--6">
    <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Listado de empresas</h3>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">Nueva Empresa</button>
                            </div>
                            <!-- Modal de registro-->
                                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <large class="modal-title" id="createLabel">{{ __('Registrar empresa') }}</large>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" action="{{ route('empresas.create') }}">
                                    @csrf
                                    @method('put')
                                        <!--nombre-->
                                        <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-building"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" type="text" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('nombre'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('nombre') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--direccion-->
                                        <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" placeholder="{{ __('Dirección') }}" type="text" name="direccion" value="{{ old('direccion') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('direccion'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('direccion') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--url-->
                                        <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-shop"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('Url') }}" type="text" name="url"  value="{{ old('url') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('url'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('url') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--giro-->
                                        <div class="form-group{{ $errors->has('giro') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('giro') ? ' is-invalid' : '' }}" placeholder="{{ __('Giro') }}" type="text" name="giro" value="{{ old('giro') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('giro'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('giro') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--rfc-->
                                        <div class="form-group{{ $errors->has('rfc') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}" placeholder="{{ __('RFC') }}" type="text" name="rfc" value="{{ old('rfc') }}" required>
                                            </div>
                                            @if ($errors->has('rfc'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('rfc') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--status-->
                                        <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" placeholder="{{ __('Estatus') }}" type="text" name="status" value="{{ old('status') }}" required>
                                            </div>
                                            @if ($errors->has('status'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                         <!--ciudad-->
                                         <div class="form-group{{ $errors->has('ciudad') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" placeholder="{{ __('Ciudad') }}" type="text" name="ciudad" value="{{ old('ciudad') }}" required>
                                            </div>
                                            @if ($errors->has('ciudad'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('ciudad') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Registrar empresa') }}</button>
                                    </div>
                                        
                                    </form>
                                    </div>
                                   
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        <!-- Projects table -->
                        <table class="table table-flush dataTables_wrapper dt-bootstrapp4"  id="datatable-buttons">
                            <thead class="thead-light">
                               
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <!-- Lleando de tabla con los empleados registrador -->
                            <tbody>
                                          @foreach($empresas as $empresas)
                                          <tr>
                                            <td>{{$empresas->nombre}}</td>
                                            <td>{{$empresas->direccion}}</td>
                                            <td>{{$empresas->rfc}}</td>
                                            <td>
                                              <div style="display: flex;">
                                                <a href="{{ url('empresas/'.$empresas->id.'/edit') }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ url('/empresas/'. $empresas->id) }}" method="POST">
                                                  {{ csrf_field() }}
                                                  {{ method_field('DELETE') }}
                                                  <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                              </div>
                                            </td>
                                          </tr>
                                        @endforeach
                                        </tbody>
                        </table>
                    </div>
                   




                </div>
            </div>
      
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection