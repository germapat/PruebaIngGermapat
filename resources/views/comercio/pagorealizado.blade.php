@extends('layouts.app')
@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Constancia de pago</h3>
    </div>

    <div class="box-body">
        <form id="frm_bank_list" role="form" method="post" action="{{ route('get_registre_user') }}">
            {{ csrf_field() }}
            <div class="row">

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

                    <div class="col-md-6 col-sm-6 col-md-offset-3 ">
                        <button class=" col-md-6 btn btn-info center-block btn-block" id='btn_pagar' type="button" name="pagar">Pagar</button>
                    </div>

            </div>
        </form>
    @endsection
    </div>
</div>


    @section('script')


@endsection
