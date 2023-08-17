<?php

namespace Paulinhoajr\Sicredi;

class Conexao
{
    function conexaoCurl($token, $url, $method, $content = null, $status = false)
    {
        $headers = array(
            "Content-type: application/json; charset=\"utf-8\"",
            "token: " . $token,
            //"Accept: application/json",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Content-length: " . strlen($content),
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 86400);
        curl_setopt($ch, CURLOPT_POST, $method);
        if ($content!=null)  curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $retorno = curl_exec($ch);

        /*if ($status){
            if(!curl_errno($ch))
            {
                $info = curl_getinfo($ch);

                $retorno =  $info["http_code"];
            }
        }*/

        curl_close($ch);

        return $retorno;
    }


    function verificaSicredi()
    {
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