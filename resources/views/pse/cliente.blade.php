@extends('layouts.app')
@section('title')

            Facil,  rapido y seguro

@endsection
@section('content')

    <div class="box-body">

        <form id='frm_cliente' role="form" method="get" action="{{ route('bank_list') }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h4>PSE-Pagos seguros en linea/persona natural</h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-6">
                        <div class="">

                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <label for="">Persona</label>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="">

                            <i class="fa fa-industry" aria-hidden="true"></i>
                        </div>
                        <label for="">Persona juridica</label>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Soy un usuario registrado</label>
                    </div>
                    <div class="form-group col-md-6">

                        <i class="fa fa-user-plus" aria-hidden="true"> Quiero registrarme ahora</i>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="" class="col-md-4">E-mail</label>
                        <input required type="email" name="correo" value="">
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-info" type="submit" id="id_abandonar_pago" name="pagar">Abandonar el pago</button>
                    <button class="btn btn-info" type="button" id="id_seguir" name="pagar">Seguir</button>
                </div>

            </form>
        </div>
        @section('script')
            <script src ="/js/my_script.js/cliente/cliente.js"></script>
        @endsection

    @endsection
