@extends('layout.patron')
@section ('titulo', 'Editar de empleado')
@section ('contenido')
    <div class="righ_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3> Editar empleado</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>  
            <!-- Formulario para edición de empleados -->
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos de empleados</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <!-- Se obtiene el ID del empleado a editar -->
                <form action="{{ url('/empleados/' . $empleado->id)}}" enctype="multipart/form-data" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre"> Nombre(s) <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="nombre" name="nombre" value="{{ $empleado->nombre }}" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="apellidos"> Apellido(s) <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="apellidos" value="{{ $empleado->apellidos }}" name="apellidos" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="cedula"> Cédula <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="cedula" value="{{ $empleado->cedula }}" name="cedula" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email"> Correo electrónico <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="email" value="{{ $empleado->email }}" name="email" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lugar_nacimiento"> Lugar de nacimiento <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" id="lugar_nacimiento" value="{{ $empleado->lugar_nacimiento }}" name="lugar_nacimiento" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Sexo</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="sexo" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-secondary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                        <input type="radio" value="0" name="sexo" id="masculino" class=""> Masculino
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                        <input type="radio" value="0" name="sexo" id="femenino"  class=""> Femenino
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" for="sexo" data-toggle-passive-class="btn-default">
                                        <input type="radio" value="0" name="sexo" id="no-definido"  class=""> No definido
                                    </label>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >Estado civil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div id="estado_civil" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-secondary" data-toggle-class="btn-primary" for="estado_civil" data-toggle-passive-class="btn-default">
                                        <input type="radio" value="0" name="estado_civil" id="soltero" class=""> Soltero
                                    </label>
                                    <label class="btn btn-primary" data-toggle-class="btn-primary" for="estado_civil" data-toggle-passive-class="btn-default">
                                        <input type="radio" value="0" name="estado_civil" id="casado"  class=""> Casado
                                    </label>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="telefono"> Teléfono <spam class="required">*</spam>
                        </label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" value="{{ $empleado->telefono }}" id="telefono" name="telefono" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="In_solid"></div>
                    <div class="Item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection