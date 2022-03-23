<?php

class roquest
{

    function separarLista($separadores,$lista)
    {
        $ready = str_replace($separadores, $separadores[0], $lista);
        $launch = explode($separadores[0], $ready);
        return  $launch;
    }

    function puxarDados($texto, $comeco, $final, $i) {
        $str = explode($comeco, $texto);
        @$str = explode($final, $str[$i]);
        return $str[0];
    }

    function requisiçaoPost($url,$headers,$data,$cookie,$proxy,$proxyauth){

        if($proxy == NULL and $proxyauth == NULL){
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_COOKIEFILE, "$cookie");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($curl);
            return $resp;
            curl_close($curl);
        } else {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_COOKIEFILE, "$cookie");
            curl_setopt($curl, CURLOPT_PROXY, $proxy);
            curl_setopt($curl, CURLOPT_PROXYUSERPWD, $proxyauth);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($curl);
            return $resp;
        }


    }

    function requisiçaoGet($url,$headers,$cookie,$proxy,$proxyauth)
    {
        if ($proxy == NULL and $proxyauth == NULL) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_COOKIEFILE, "$cookie");
            $resp = curl_exec($curl);
            return $resp;
            curl_close($curl);
        } else {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_COOKIEFILE, "$cookie");
            curl_setopt($curl, CURLOPT_PROXY, $proxy);
            curl_setopt($curl, CURLOPT_PROXYUSERPWD, $proxyauth);
            $resp = curl_exec($curl);
            return $resp;
            curl_close($curl);
        }
    }

    function validarConta($requisicao,$mensagemAprovada, $mensagemReprovada){
        if(strpos($requisicao, $mensagemAprovada)!==false){
            return 1;
        }
        if(strpos($requisicao, $mensagemReprovada)!==false){
            return 0;
        }
    }
}