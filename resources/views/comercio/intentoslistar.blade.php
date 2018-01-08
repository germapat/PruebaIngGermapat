@extends('layouts.app')

@section('title')

Intentos de pago
@endsection

@section('content')
    <form class="" action="." method="post">
      {{ csrf_field() }}
      <div class="box" id="lista_pagos">
        <div class="box-header">
          <h2>Lista de transacciones</h2>

        </div>
        <div class="box-body">
          <table class="table  table-striped b-t b-b" id="intentos_listar">
            <input type="hidden" id="_token" value="{{csrf_token()}}">
            <thead>
              <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Correo</th>
                <th>Referente</th>
                <th>Descripción</th>
                <th>Total</th>
                <th>Estado Pago</th>
              </tr>
            </thead>
            <tbody id="example tbody">
                @foreach ($cliente as $value)
                    <tr>
                        <td>{{$value->nombres}}</td>
                        <td>{{$value->apellidos}}</td>
                        <td>{{$value->documento}}</td>
                        <td>{{$value->correo}}</td>
                        <td>{{$value->referente_pago}}</td>
                        <td>{{$value->descripcion}}</td>
                        <td>{{$value->valor_total}}</td>
                        <td>{{$value->estado_pago}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <body>
            <th></th>

        </div>
      </body>
      <div class="container">
        <!-- Modal -->



        <div class="modal fade" id="editar" role="dialog">
          <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" onclick="limpiar_campos()" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="lblRango">Lectura</h4>

              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <div class="col-md-12" id="lectura_actual">
                        <label class=col-md-12>Lectura actual</label>
                        {{-- <input class="form-control" id="lecturaActual"  type="text" name="lecturaActual" value=""> --}}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-12" id="lectura_anterior">
                        <label class=col-md-12>Lectura anterior</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="col-md-12" id="diferencia">
                        <label class=col-md-12>Diferencia</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Fecha Actual</label>
                      <div class="input-group date col-md-12" id="FechaActual">

                        <span class="input-group-addon">
                          <span class="fa fa-calendar"></span>
                        </span>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-12">
                    <hr>
                  </div>
                  <div class="col-md-12 col-md-offset-5">
                    <button type="button" class="btn btn-lg btn-success" onclick="guardar_cambios();" >Guardar</button>

                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" onclick="limpiar_campos()" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              </div>
            </div>

          </div>

        </div>
      </div>
        </form>

@endsection

@section('script')
<script type="text/javascript">

1
2
3
$(document).ready(function() {
    $('#intentos_listar').DataTable();
} );
</script>
@endsection
