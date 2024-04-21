<?php
/*require 'config.php';*/

$descricao = filter_input(INPUT_POST, 'descricao');
$comprimento= filter_input(INPUT_POST, 'comprimento');
$largura = filter_input(INPUT_POST, 'largura');
$altura = filter_input(INPUT_POST, 'altura');
$peso = filter_input(INPUT_POST, 'peso');
$quantidade = filter_input(INPUT_POST, 'quantidade');

if($descricao && $comprimento && $largura && $altura && $peso && $quantidade) {
    $volumeItem = $comprimento * $largura * $altura * $quantidade;
    if ($descricao > $comprimento) { //só teste
        echo "teste";
    }
    else {
        echo "teste";
    }

}
else {
    header("Location : index.php");
    exit;
}


/*
Cadastrei uma tabela de caixa.
1. Puxar os valores do banco da caixa e iniciar a lógica de quantas caixas vai ser necessário
*/
?>