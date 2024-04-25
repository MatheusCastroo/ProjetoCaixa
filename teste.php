<?php

$item = array (
    "nome"=> "Rack",
    "comprimento" => 1,
    "largura" => 1,
    "altura" => 30,
    "peso" => 7,
    "quantidade" => 2  
);

$caixas = array (
    "caixa P" => array (
        "comprimento" => 28,
        "largura" => 27,
        "altura" => 35
    ),
    "caixa M" => array (
        "comprimento" => 38,
        "largura" => 24,
        "altura" => 56
    ),
    "caixa G" => array (
        "comprimento" => 41,
        "largura" => 35,
        "altura" => 61
    )
);

$item["comprimento"] *= $item["quantidade"];
$item["largura"] *= $item["quantidade"];
$item["altura"] *= $item["quantidade"];

$encaixou = false;
foreach ($caixas as $chave => $value) {
    if ($item["comprimento"] <= $value["comprimento"] && $item["largura"] <= $value["largura"] && $item["altura"] <= $value["altura"]) {
        echo "O ". $item["nome"]. " vai para ". $chave;
        $encaixou = true;
        break;
    }
}
if (!$encaixou) {
    echo "Joga a mercadoria no caminhão sem caixa mesmo.";
}
?>
