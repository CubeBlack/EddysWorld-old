<h2>
<?php
if(isset($_REQUEST["id"])){
    require_once '../engine/sala.php';
    $id = $_REQUEST["id"];
    $droped = Oracao::drop($id);
    
    if($droped){
        echo "Apagando com sucesso";
    }
    else{
        echo "Erro ao apagar";
    }
}
else{
    echo "ID indefinido";    
}
echo "</h2>";