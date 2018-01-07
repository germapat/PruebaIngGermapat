<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\FunctionsController;
use App\Models\Cliente;

class SoapClientController extends FunctionsController
{
/*
*Funcion para listar los bancos y mostrar los datos del cliente
 */
    public function bank_list(Request $request)
    {
        $input = $request->all();

        $cliente = Cliente::select('*')->where('documento',$input['documento'])->get();

        $bank_list = Cache::get('bank');
        # se validad si hay datos en cache y si no hay se consume el api getBankList
        if ( $bank_list==null) {
            $bank_list = $this->get_bank_list();
        }
        return view('comercio.listbank',compact('bank_list',$bank_list,'cliente',$cliente));
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
    public function get_registre_user(Request $request)
    {
        return view('pse.cliente');
    }
}
