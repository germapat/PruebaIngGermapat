<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use SoapClient;


class FunctionsController extends Controller
{
    private function autenticacion()
    {
        $seed = date('c');
        $hashString = sha1($seed.'024h1IlD', false);
        $parametros= ['auth'=>([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' =>$hashString,
            'seed' => $seed])];
            return $parametros;
        }
        public function get_bank_list()
        {
            $bank_list = Cache::remember('bank', 1440, function () {
                try {

                $servicio="https://test.placetopay.com/soap/pse/?wsdl";
                $cliente = new SoapClient($servicio, $this->autenticacion());
                $cliente ->__setLocation('https://test.placetopay.com/soap/pse/');
                //llamamos al métdo que nos interesa con los parámetros
                $resultado = $cliente->getBankList($this->autenticacion())->getBankListResult->item;
                return $cache = $resultado;

                } catch (\Exception $e) {
                    return false;
                }

            });
            return $bank_list;
        }

        public function create_transactions(){

             $tipo_ducumento = explode(':',session('cliente')['tipo_documento']);
            $transaction = ([
                'reference' => session('cliente')['referente_pago'],
                'bankCode' => session('bank_code'),
                'bankInterface' => session('tipo_persona'),
                'returnURL' =>'https://dev.placetopay.com/redirection/sandbox/session/session/'.session('cliente')['referente_pago'],
                'description' => session('cliente')['descripcion'],
                'language' => 'ES',
                'currency' => 'COP',
                'totalAmount' => session('cliente')['valor_total'],
                'taxAmount' => 0,
                'devolutionBase' => 0,
                'tipAmount' => 0,
                'ipAddress' => session('ip_client'),
                'payer' =>[
                    'document' => session('cliente')['documento'],
                    'documentType' => $tipo_ducumento[0],
                    'firstName' => session('cliente')['nombres'],
                    'lastName' => session('cliente')['apellidos'],
                    'emailAddress' => session('cliente')['correo'],
                    'address' => session('cliente')['direccion'],
                    'mobile' => session('cliente')['telefono_movil'],
                    'userAgent' => session('navegador'),

                ],
                'buyer' =>[
                    'document' => session('cliente')['documento'],
                    'documentType' => $tipo_ducumento[0],
                    'firstName' => session('cliente')['nombres'],
                    'lastName' => session('cliente')['nombres'],
                    'emailAddress' => session('cliente')['correo'],
                    'address' => session('cliente')['direccion'],
                    'mobile' => session('cliente')['telefono_movil'],

                ],
                'shipping' =>[
                    'document' => session('cliente')['documento'],
                    'documentType' => $tipo_ducumento[0],
                    'firstName' => session('cliente')['nombres'],
                    'lastName' => session('cliente')['nombres'],
                    'emailAddress' => session('cliente')['correo'],
                    'address' => session('cliente')['direccion'],
                    'mobile' => session('cliente')['telefono_movil'],

                ],

            ]);
                try {

                    $param = $this->autenticacion();
                    $param['transaction'] = $transaction;
                    
                    $servicio="https://test.placetopay.com/soap/pse/?wsdl";
                    $cliente = new SoapClient($servicio,$this->autenticacion());
                    $cliente ->__setLocation('https://test.placetopay.com/soap/pse/');
                    //llamamos al métdo que nos interesa con los parámetros
                    $resultado = $cliente->createTransaction($param);
                    $resultado = $resultado->createTransactionResult;

                    #Se retorna el objecto que devuelve la petición
                    return $resultado;

                } catch (\Exception $e) {
                    $e->getMessage();
                    return $e;
                }
            }
            public function get_ip()
            {

                if (isset($_SERVER["HTTP_CLIENT_IP"]))
                {
                    return $_SERVER["HTTP_CLIENT_IP"];
                }
                elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
                {
                    return $_SERVER["HTTP_X_FORWARDED_FOR"];
                }
                elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
                {
                    return $_SERVER["HTTP_X_FORWARDED"];
                }
                elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
                {
                    return $_SERVER["HTTP_FORWARDED_FOR"];
                }
                elseif (isset($_SERVER["HTTP_FORWARDED"]))
                {
                    return $_SERVER["HTTP_FORWARDED"];
                }
                else
                {
                    return $_SERVER["REMOTE_ADDR"];
                }

            }
            function get_navegador()
            {
                $user_agent = $_SERVER['HTTP_USER_AGENT'];

                if(strpos($user_agent, 'MSIE') !== FALSE)
                return 'Internet explorer';
                elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
                return 'Microsoft Edge';
                elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
                return 'Internet explorer';
                elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
                return "Opera Mini";
                elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
                return "Opera";
                elseif(strpos($user_agent, 'Firefox') !== FALSE)
                return 'Mozilla Firefox';
                elseif(strpos($user_agent, 'Chrome') !== FALSE)
                return 'Google Chrome';
                elseif(strpos($user_agent, 'Safari') !== FALSE)
                return "Safari";
                else
                return 'No hemos podido detectar su navegador';


            }
        }
