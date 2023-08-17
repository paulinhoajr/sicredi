<?php

namespace Paulinhoajr\Sicredi;

class Hearth
{

    public function __construct()
    {

    }

    public function verifica(){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://cobrancaonline.sicredi.com.br/sicredi-cobranca-ws-ecomm-api/ecomm/v1/boleto/health');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            //dd('Error:' . curl_error($ch));
            $se=false;
        }else{
            $se=true;
        }

        curl_close ($ch);

        if ($se){
            return true;
        }
        return false;
    }
}