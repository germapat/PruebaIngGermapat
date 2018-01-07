@extends('layouts.app')
@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Cliente</h3>
    </div>

    <div class="box-body">
        <form role="form" method="get" action="{{ route('get_registre_user') }}">

            <div class="row">
                @foreach ($cliente as $value)
                @component('partial.cliente')
                @slot('documento')
                {{ $value->documento }}
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
                            <select value = "" class="form-control" name="tipo_persona" id="sel_bank"  >
                                @foreach ($bank_list as $key => $value)
                                <option selected = "" value="{{$value->bankCode}}" id="opt_seleccionar">{{$value->bankName}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <button class="btn btn-info center-block btn-block" id='btn_pagar' type="submit" name="pagar">Pagar</button>
                    </div>

            </div>
        </form>
    </div>
</div>
@endsection
