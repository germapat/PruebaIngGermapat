

<div class="">
    <div class="form-group col-md-6 col-sm-6">
        <label for="">Documento</label>
        <input class="form-control" readonly="true" type="text" disabled name="documento" value="{{$documento}}">
    </div>


    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">Referente de pago</label>
        <input class="form-control" readonly="true" type="text" disabled name="Referente_pago" value="{{$referente_pago}}">
    </div>

    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">Nombres</label>
        <input class="form-control" readonly="true" type="text" disabled name="Nombre" value="{{$nombres}}">
    </div>

    <div class="form-group col-md-6 col-sm-6 ">
        <label for="">Apellidos</label>
        <input class="form-control" readonly="true" type="text" disabled name="Apellidos" value="{{$apellidos}}">
    </div>

</div>
{{ $slot }}
