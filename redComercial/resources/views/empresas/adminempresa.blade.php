<div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Listado de empresas</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Giro</th>
                                    <th scope="col">RFC</th>
                                </tr>
                            </thead>
                            <!-- Lleando de tabla con los empleados registrador -->
                            <tbody>
                                          @foreach($empresas as $empresas)
                                          <tr>
                                            <td>{{$empresas->nombre}}</td>
                                            <td>{{$empresas->direccion}}</td>
                                            <td>{{$empresas->giro}}</td>
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