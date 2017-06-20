<?php
header('Content-Type: application/json');
require_once '../engine/sala.php';

if(User::getId()){
    $id = User::getId();
    $dados = User::Perfil(User::getId());
    if(!$dados){
        $dados = array("erro"=>"id invalido");
    }
}
else{
    $dados = array("erro"=>"não esta logado");
}
echo json_encode($dados);

