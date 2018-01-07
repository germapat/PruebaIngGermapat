@extends('layouts.app')
@section('title')
    Persona
@endsection
@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Registrar</h3>
        </div>

        <div class="box-body">
            <form role="form" method="post" action="/persona">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <p class=""><b>Tipo de identificación</b></p>
                                <select required value = "" class="form-control" name="tipo_persona" id="sel_tipo_persona" onchange="acciones.cambiar_div()" >
                                    <option selected = "" value="" id="opt_seleccionar">Seleccione...</option>
                                    <option id="opt_suscriptor" value="suscriptor">Suscriptor</option>
                                    <option id="opt_usuario" value="usuario">Usuario</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Primer Nombre</label>
                            <input type="text" value="" class="form-control" id="primer_nombre" placeholder="Juan" name="primer_nombre">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Primer Apellido</label>
                            <input name="primer_apellido" value="" type="text" class="form-control" id="primer_apellido" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Segundo Nombre</label>
                            <input name="segundo_nombre" type="text" class="form-control" id="segundo_nombre" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Segundo Apellido</label>
                            <input name="segundo_apellido" type="text" class="form-control" id="segundo_apellido" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input name="direccion" value="" type="text" class="form-control" id="direccion" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input name="celular" type="text" class="form-control" id="celular" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <p class="text-center"><b>Tipo identificación</b></p>
                                <select required value = "" class="form-control" name="tipo_persona" id="sel_tipo_persona" onchange="acciones.cambiar_div()" >
                                    <option selected = "" value="" id="opt_seleccionar">Seleccione...</option>
                                    <option id="opt_suscriptor" value="suscriptor">Suscriptor</option>
                                    <option id="opt_usuario" value="usuario">Usuario</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" id="tipo_usuario">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('script')
    <script src ="/js/myscripts/persona/crear_persona.js"></script>
@endsection
