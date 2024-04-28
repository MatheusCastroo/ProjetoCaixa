<?php

$itens = array (
    array (
    "nome"=> "Rack",
    "comprimento" => 28,
    "largura" => 26,
    "altura" => 34,
    "peso" => 7,
    "quantidade" => 2
    ),
    array (
        "nome"=> "Rack",
        "comprimento" => 20,
        "largura" => 30,
        "altura" => 31,
        "peso" => 7,
        "quantidade" => 1
        ),
        array (
            "nome"=> "Rack",
            "comprimento" => 25,
            "largura" => 15,
            "altura" => 32,
            "peso" => 7,
            "quantidade" => 4
        ),
);
$total_volume = 0;

foreach ($itens as $item) {
    $volume_item = $item["comprimento"] * $item["largura"] * $item["altura"] * $item["quantidade"];
    $total_volume += $volume_item;
}

$caixas = array (
    "P" => array (
        "comprimento" => 28,
        "largura" => 27,
        "altura" => 35
    ),
    "M" => array (
        "comprimento" => 38,
        "largura" => 24,
        "altura" => 56
    ),
    "G" => array (
        "comprimento" => 41,
        "largura" => 35,
        "altura" => 61
    )
);

$encaixou = false;
foreach ($caixas as $chave => $caixa) {   
    if ($total_volume <= $caixa["comprimento"] * $caixa["largura"] * $caixa["altura"]) {
        echo "Os itens vai para caixa ". $chave;
        $encaixou = true;
        break;
    }
}

if (!$encaixou) {
    echo "Joga a mercadoria no caminhão sem caixa mesmo.";
}
?>
