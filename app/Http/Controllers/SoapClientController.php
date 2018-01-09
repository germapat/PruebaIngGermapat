<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\FunctionsController;
use App\Models\Cliente;
use App\Models\ClienteTransaccion;
use Jleon\LaravelPnotify\Notify;

class SoapClientController extends FunctionsController
{
    public function listar_pagos(){
        $cliente = Cliente::select('*')
           ->join('cliente_transaccion','cliente_transaccion.cliente_id','=','cliente.id')
           ->get();
           return view('comercio.intentoslistar',compact('cliente',$cliente));
    }
    public function pago_realizado($referente_pago)
    {   $cliente = Cliente::select('referente_pago','cliente.documento','nombres','apellidos','correo',
        'descripcion','tipo_documento','direccion','transactionID'
        )
        ->join('cliente_transaccion','cliente_transaccion.cliente_id','=','cliente.id')
        ->where('cliente.referente_pago',$referente_pago)
        ->orderBy('cliente_transaccion.id','desc')
        ->get()
        ->take(1);

        /*se valida el estado de la transacción de acuerdo a la
        * referente de pago
        *consumiento get_transaction_information
        */
       if (count($cliente)>0) {
           # code...
           $get_transaction_information = $this->get_transaction_information($cliente[0]['transactionID']);
       }else {
           Notify::warning('No se encontraron datos','Oopp!!');
           return redirect('/');
       }
        if($get_transaction_information==false) {
            Notify::info('Se presento un problema para consultar el estado del pago,
            sera notificado en las proximas horas del estado de la transacción','Noticia');
            return view('comercio.pagorealizado',compact('cliente',$cliente));
        }
        /*
            Si hay una respuesta validad se hace la actualización del estado de
            pago, con un transation
         */
        elseif ($get_transaction_information->transactionState=="OK") {
            try {
                \DB::beginTransaction();
                $cliente_transaccion = ClienteTransaccion::select('id')
                ->where('transactionID',$get_transaction_information->transactionID)
                ->update(['estado_pago'=>$get_transaction_information->responseReasonText]);

                \DB::commit();
                Notify::success('Su pago se encuentra en estado: '.$get_transaction_information->responseReasonText.'','Noticia');
            } catch (\Exception $e) {
                // echo $e->getMessage();
                \DB::Rollback();
                Notify::info('Su pago se encuentra en estado: '.$get_transaction_information->responseReasonText.'','Noticia');
            }
        }
        else {
            Notify::info('Su pago se encuentra en estado: '.$get_transaction_information->responseReasonText.'','Noticia');
        }

        return view('comercio.pagorealizado',compact('cliente',$cliente));
    }

    /*
    *Funcion para listar los bancos y mostrar los datos del cliente
    */
    public function bank_list(Request $request)
    {
        $input = $request->all();
        // Cache::forget('bank');
        /*
            Se consulta en la bd la existencia del documento del cliente
         */
        $cliente = Cliente::select('*')->where('documento',$input['documento'])->get();
        $bank_list = Cache::get('bank');
        # se validad si hay datos en cache y si no hay se consume el api getBankList
        if ($bank_list==null) {
            $bank_list = $this->get_bank_list();
            /*
                Si el servicio presenta novedad
             */
            if ($bank_list==false) {
                $error = 'No se pudo obtener la lista de Entidades Financieras, por favor intente más tarde';
                return view('comercio.listbank',compact('cliente',$cliente,'error',$error));
            }

        }
        $error = '';
        return view('comercio.listbank',compact('bank_list',$bank_list,'cliente',$cliente,'error',$error));

    }
    /*
    *Funcion para validar que el cliente exista en la bd
    */
    public function get_client_list($documento)
    {
        $cliente = Cliente::select('*')->where('documento',$documento)->get()->toArray();

        return json_encode(['result'=>$cliente]);
    }
    /*
    *Funcion para mostra el formulario de consulta del cliente
    por documento
    */
    public function client()
    {
        return view('comercio.cliente');

    }
    public function crear_transaccion(Request $request)
    {
        $input = $request->all();

        $cliente = Cliente::select('*')->where('documento',$input['documento'])->get()->toArray();

        #se toma la ip del cliente
        $ip = $this->get_ip();
        #se toma el navegador
        $navegador = $this->get_navegador();
        # se almacenan los datos del basicos del cliente#
        session(['cliente'=>$cliente,'tipo_persona'=>$input['tipo_persona'],
        'ip_client'=>$ip,'navegador' =>$navegador,'bank_code'=>$input['sel_bank']]);
        $crear_transaccion = $this->create_transactions();

    if ($crear_transaccion->returnCode=='SUCCESS') {

        #Se guarda los datos que devuelve createTransaction
        try {
            \DB::beginTransaction();
            $ciente_transaccion = new ClienteTransaccion;
            $ciente_transaccion->create(
                ['cliente_id' =>$cliente[0]['id'],'ip'=>$ip,'estado_pago'=>'Pendiente',
                'transactionID'=>$crear_transaccion->transactionID,
                'sessionID'=>$crear_transaccion->sessionID,'bank_code'=>$input['sel_bank']
            ]);
            \DB::commit();
            session()->forget('cliente','bank_code','ip_client','navegador','tipo_persona');

            $bank_url = $crear_transaccion->bankURL;
            return (['result'=>$bank_url,'estado'=>'200']);

        } catch (Exception $e) {
            session()->forget('cliente','bank_code','ip_client','navegador','tipo_persona');
            \DB::RollBack();
            $response_reason_text = $crear_transaccion->responseReasonText;
            return json_encode(['result'=>$response_reason_text,'estado'=>'500']);

        }
    }
    session()->forget('cliente','bank_code','ip_client','navegador','tipo_persona');
       $response_reason_text = $crear_transaccion->responseReasonText;
        return json_encode(['result'=>$response_reason_text,'estado'=>'500']);
    }

}
