@extends('layouts.app')
@section('title')
Facil,  rapido y seguro
@endsection
@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title" >PSE-Pagos seguros en linea/persona natural</h3>
    </div>
    <div class="box-body">

        <form id='frm_cliente_pse' role="form" method="post" action="{{ route('create_transaction') }}">
            {{ csrf_field() }}
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group col-md-6 col-sm-6">
                        <i class="fa fa-user" aria-hidden="true"></i> &nbsp;
                        <label for="">Persona</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                        <i class="fa fa-industry" aria-hidden="true"></i>&nbsp;
                        <label for="">Persona juridica</label>
                    </div>
                    <hr>
                    <div class="form-group col-md-6 col-sm-6">
                        <label for="">Soy un usuario registrado</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;
                        <label for="">Quiero registrarme ahora</label>
                    </div>

                </div>


                    <div class="form-group col-md-12 col-md-12">
                        <label for="" class="">E-mail</label>
                        <input class="form-control" id="correo" required type="email" name="correo" value="">
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <button class="btn btn-info btn-block" type="submit" id="id_abandonar_pago" name="pagar">Abandonar el pago</button>
                    </div>
                    <div class="col-md-6 col-sm-6 ">
                        <button class="btn btn-info btn-block" type="button" id="id_seguir" name="pagar">Seguir</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@section('script')
<script src ="/js/my_script.js/cliente_pse/cliente_pse.js"></script>
@endsection


@endsection
