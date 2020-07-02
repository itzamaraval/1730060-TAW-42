@extends ('layout.patron')
@section ('titulo', 'Administración de departamentos')
@section ('contenido')

    <!-- Código HTML puro para mostrar el listado de empleados -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Administración de departamentos</h3>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listado de departamentos</h2>
                        <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-keytable" class="table table-striped table-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departamentos as $departamentos)
                                            <tr>
                                                <td>{{ $departamentos->id }}</td>
                                                <td>{{ $departamentos->nombre }}</td>
                                                <!-- Agregar columna para editar y eliminar registro -->
                                                <td>
                                                    <div style="display: flex;">
                                                        <a href="{{url('departamentos/'.$departamentos->id.'/edit')}}" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i></a>
                                                
                                                        <form action="{{ url('departamentos/'.$departamentos->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm ('¿Eliminar departamento?')"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.card-box -->
                        </div><!-- /.col-sm-12 -->
                    </div><!-- /.row -->
                </div> <!-- /.x_content -->
            </div> <!-- /.panel -->
        </div> <!-- /.col-md-sm-12 -->
    </div><!-- /. right_col -->
@endsection