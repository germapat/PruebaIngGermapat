

<div class="">

        <div class="form-group col-md-6 col-sm-6 ">
            <label for="">Nombres</label>
            <input id="nombres" class="form-control" readonly="true" type="text"  name="nombres" value="{{$nombres}}">
        </div>


            <div class="form-group col-md-6 col-sm-6 ">
                <label for="">Apellidos</label>
                <input id="apellidos" class="form-control" readonly="true" type="text"  name="apellidos" value="{{$apellidos}}">
            </div>
    <div class="form-group col-md-6 col-sm-6">
        <label for="">Documento</label>
        <input id = "documento" class="form-control" readonly="true" type="text"  name="documento" value="{{$documento}}">
    </div>


    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">Referencia de pago</label>
        <input id="referencia_pago" class="form-control" readonly="true" type="text"  name="referente_pago" value="{{$referente_pago}}">
    </div>

    <div class="form-group col-md-6 col-sm-6 ">
       <label for="">Descripción pago</label>
       <input id="descripcion" class="form-control" readonly="true" type="text"  name="descripcion" value="{{$descripcion}}">

   </div>
    <div class="form-group col-md-6 col-sm-6 ">
       <label for="">Valor</label>
       <input id='valor_total' class="form-control" readonly="true" type="text"  name="valor_total" value="{{$valor_total}}">

   </div>
    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">Tipo documento</label>
        <input id="tipo_documento" class="form-control" readonly="true" type="text"  name="tipo_documento" value="{{$tipo_documento}}">
    </div>
    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">Dirección</label>
        <input id="direccion" class="form-control" readonly="true" type="text"  name="direccion" value="{{$direccion}}">
    </div>
    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">Número de celular</label>
        <input id="telefono_movil" class="form-control" readonly="true" type="text"  name="telefono_movil" value="{{$telefono_movil}}">
    </div>
    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">E-mail</label>
        <input id ="correo" class="form-control" readonly="true" type="text"  name="correo" value="{{$correo}}">
    </div>

    {{ $slot }}
</div>
