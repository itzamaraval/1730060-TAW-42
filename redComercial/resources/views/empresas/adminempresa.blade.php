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
                                <a href="#" class="btn btn-sm btn-primary">Nueva Empresa</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive py-4">
                        <!-- Projects table -->
                        <table class="table table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">RFC</th>
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