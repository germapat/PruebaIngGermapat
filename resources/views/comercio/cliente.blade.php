@extends('layouts.app')
@section('content')
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Factura</h3>
    </div>

    <div class="box-body">
        <form id='frm_cliente' role="form" method="post" action="{{ route('bank_list') }}">
            {{ csrf_field() }}
             
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group col-md-6  col-md-offset-3">
                        <label for="">Documento</label>
                        <input class="form-control" type="text" required name="documento" id="documento" value="">
                    </div>
                    <div class="form-group col-md-6  col-md-offset-3">
                        <button class="btn btn-success btn-primary btn-block" type="button" id="cliente_pagar" name="pagar">Pagar</button>
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
