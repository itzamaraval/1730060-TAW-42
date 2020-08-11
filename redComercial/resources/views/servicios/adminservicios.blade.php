@extends('layouts.app', ['title' => __('Servicios')])

@section('content')
@include('layouts.headers.blank')  

<div class="container-fluid mt--6">
    <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Listado de servicios</h3>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create">Nuevo Servicio</button>
                            </div>
                            <!-- Modal de registro-->
                                <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <large class="modal-title" id="createLabel">{{ __('Registrar servicios') }}</large>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" action="{{ route('productos.create') }}">
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
                                        <!--descripción-->
                                        <div class="form-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripción') }}" type="text" name="descripcion" value="{{ old('descripcion') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('descripcion'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--precio-->
                                        <div class="form-group{{ $errors->has('precio') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-shop"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio') }}" type="text" name="precio"  value="{{ old('precio') }}" required autofocus>
                                            </div>
                                            @if ($errors->has('precio'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('precio') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--Categoría-->
                                        <div class="form-group{{ $errors->has('categoria') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('categoria') ? ' is-invalid' : '' }}" placeholder="{{ __('Categoría') }}" type="text" name="categoria" value="{{ old('categoria') }}" required>
                                            </div>
                                            @if ($errors->has('categoria'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('categoria') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <!--empresa-->
                                        <div class="form-group{{ $errors->has('empresa') ? ' has-danger' : '' }}">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-archive-2"></i></span>
                                                </div>
                                                <input class="form-control{{ $errors->has('empresa') ? ' is-invalid' : '' }}" placeholder="{{ __('Empresa') }}" type="text" name="empresa" value="{{ old('empresa') }}" required>
                                            </div>
                                            @if ($errors->has('empresa'))
                                                <span class="invalid-feedback" style="display: block;" role="alert">
                                                    <strong>{{ $errors->first('empresa') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Registrar producto') }}</button>
                                    </div>
                                        
                                    </form>
                                    </div>
                                   
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        <!-- productos table -->
                        <table class="table table-flush dataTables_wrapper dt-bootstrapp4"  id="datatable-buttons">
                            <thead class="thead-light">
                               
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <!-- Lleando de tabla con los servicios registrados -->
                            <tbody>
                                          @foreach($servicios as $servicios)
                                          <tr>
                                            <td>{{$servicios->nombre}}</td>
                                            <td>{{$servicios->descripcion}}</td>
                                            <td>{{$servicios->precio}}</td>
                                            <td>
                                              <div style="display: flex;">
                                                <a href="{{ url('servicios/'.$servicios->id.'/edit') }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ url('/servicios/'. $servicios->id) }}" method="POST">
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