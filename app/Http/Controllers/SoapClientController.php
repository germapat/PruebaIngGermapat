<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\FunctionsController;
use App\Models\Cliente;
use App\Models\ClientePse;

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
    public function cliente_pse(Request $request)
    {
        $input = $request->all();
        #se toma la ip del cliente
        $ip = $this->get_ip();
        #se toma el navegador
        $navegador = $this->get_navegador();

        # se almacenan los datos del basicos del cliente        #
        session(["cliente"=>$input,'ip_client'=>$ip,'navegador' =>$navegador]);

        return view('pse.cliente');
    }
    public function cliente_pse_get(Request $request)
    {
        $input = $request->all();
        $cliente_pse = ClientePse::select('*')->where('correo',$input['correo'])
        ->get()->toArray();
        return json_encode(['result'=>$cliente_pse]);
    }
    public function create_transaction(Request $request)
    {   $input = $request->all();
        session(['correo'=>$input['correo']]);

        $requ = $this->create_transactions();
        dd($requ);
    }
}
