@extends('layouts.app')
@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Factura</h3>
    </div>

    <div class="box-body">
        <form id='frm_cliente' role="form" method="get" action="{{ route('bank_list') }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Documento</label>
                        <input class="form-control" type="text" required name="documento" id="documento" value="">
                    </div>
                    <div class="">
                        <button class="btn btn-success btn-primary center-block btn-block" type="button" id="cliente_pagar" name="pagar">Pagar</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@section('script')
<script src ="/js/my_script.js/cliente/cliente.js"></script>
@endsection

@endsection
