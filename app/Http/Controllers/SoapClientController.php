<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\FunctionsController;
use App\Models\Cliente;
use App\Models\ClienteTransaccion;

class SoapClientController extends FunctionsController
{

    /*
    *Funcion para listar los bancos y mostrar los datos del cliente
    */
    public function bank_list(Request $request)
    {
        $input = $request->all();
        // Cache::forget('bank');
        $cliente = Cliente::select('*')->where('documento',$input['documento'])->get();
        $bank_list = Cache::get('bank');
        # se validad si hay datos en cache y si no hay se consume el api getBankList
        if ($bank_list==null) {
            $bank_list = $this->get_bank_list();
            if ($bank_list==false) {
                $error = 'No se pudo obtener la lista de Entidades Financieras, por favor intente más tarde';
                return view('comercio.listbank',compact('cliente',$cliente,'error',$error));
            }

        }
        $error = '';
        return view('comercio.listbank',compact('bank_list',$bank_list,'cliente',$cliente,'error',$error));

    }
    /*
    *Funcion para validar que el cliente exista
    */
    public function get_client_list($documento)
    {
        $cliente = Cliente::select('*')->where('documento',$documento)->get()->toArray();

        return json_encode(['result'=>$cliente]);
    }
    /*
    *Funcion para mostra el formulario de consulta del cliente
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
        session(["cliente"=>$cliente[0],'tipo_persona'=>$input['tipo_persona'],
        'ip_client'=>$ip,'navegador' =>$navegador,'bank_code'=>$input['sel_bank']]);

        $crear_transaccion = $this->create_transactions();
        
    if ($crear_transaccion->returnCode=='SUCCESS') {
        // 'cliente_id', 'ip','estado_pago','transactionID','sessionID'
        $ciente_transaccion = new ClienteTransaccion;
        $ciente_transaccion->create(
            ['cliente_id' =>$cliente['id'],'ip'=>$ip,'estado_pago'=>1,
            'transactionID'=>$crear_transaccion->transactionID,
            'sessionID'=>$crear_transaccion->sessionID
        ]);
        $bank_url = $crear_transaccion->bankURL;
        return (['result'=>$bank_url,'estado'=>'200']);
    }
    else {

    }
        $response_reason_text = $crear_transaccion->responseReasonText;
        return json_encode(['result'=>$response_reason_text,'estado'=>'500']);


    }

}
