@extends('layout.patron')
@section ('titulo', 'Editar departamento')
@section ('contenido')
    <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Editar departamento</h3>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>  

            <div class="col-ms-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Información del Departamento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                <form action="{{ url('/departamentos/'.$departamento->id) }}"  enctype="multipart/form-data" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombres"> Nombre del departamento <spam class="required">*</spam></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="nombre" name="nombre" required="required" class="form-control" value="{{ $departamento->nombre }}">
                        </div>
                    </div>

                    <div class="In_solid"></div>

                    <div class="Item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>

                </form>
                </div><!-- /.col-sm-12 -->
            </div><!-- /row -->
            </div><!-- /.x_content -->
        </div><!-- /.x_panel -->
        </div><!-- /.col-md-sm-12 -->
    </div><!-- /right_col -->
@endsection