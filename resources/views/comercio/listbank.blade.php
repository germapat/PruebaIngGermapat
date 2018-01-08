@extends('layouts.app')
@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Cliente</h3>
    </div>

    <div class="box-body">
        <form id="frm_bank_list" role="form" method="post" action="{{ route('get_registre_user') }}">
            {{ csrf_field() }}
            <div class="row">
                <div id="alerta_error_transaccion" class="alert alert-warning" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <ul id ="ul_error">

                    </ul>
                </div>
                 @includeif('partial.error')
                @foreach ($cliente as $value)
                @component('partial.cliente')
                    @slot('documento')
                        {{ $value->documento }}
                    @endslot
                    @slot('descripcion')
                    {{ $value->descripcion }}
                    @endslot
                    @slot('nombres')
                        {{ $value->nombres }}
                    @endslot
                    @slot('apellidos')
                        {{ $value->apellidos }}
                    @endslot
                    @slot('referente_pago')
                        {{ $value->referente_pago }}
                    @endslot
                    @slot('tipo_documento')
                        {{ $value->tipo_documento }}
                    @endslot
                    @slot('direccion')
                        {{ $value->direccion }}
                    @endslot
                    @slot('telefono_movil')
                        {{ $value->telefono_movil }}
                    @endslot
                    @slot('valor_total')
                        {{ $value->valor_total }}
                    @endslot
                    @slot('correo')
                        {{ $value->correo }}
                    @endslot

            @endcomponent

                @endforeach
                    <div class="form-group col-md-6 col-sm-6 ">
                        <p class=""><b>Indique el tipo de cuenta con la cual realizara el pago</b></p>
                        <select value = "" class="form-control" name="tipo_persona" id="sel_type_person"  >
                            <option value="1">Persona</option>
                            <option value="2">Empresa</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 ">
                        <div class="form-group">
                            <p class=""><b>Seleccione de la lista la entidad con la que desea realizar el pagos</b></p>
                            <select value = "" class="form-control" name="bank_code" id="sel_bank" >
                                @isset($bank_list)

                                    @foreach ($bank_list as $key => $value)

                                        <option selected = "" value="{{$value->bankCode}}" id="opt_seleccionar">{{$value->bankName}}</option>

                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-md-offset-3 ">
                        <button class=" col-md-6 btn btn-info center-block btn-block" id='btn_pagar' type="button" name="pagar">Pagar</button>
                    </div>

            </div>
        </form>
    @endsection
    </div>
</div>


    @section('script')

<script src ="/js/my_script.js/pago/pago.js"></script>

@endsection
