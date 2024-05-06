<?php
$itens = array(
    array(
        "nome" => "Primeiro Rack",
        "comprimento" => 28,
        "largura" => 15,
        "altura" => 30,
        "peso" => 7,
        "quantidade" => 5
    ),
    array(
        "nome" => "Segundo Rack",
        "comprimento" => 35,
        "largura" => 30,
        "altura" => 31,
        "peso" => 7,
        "quantidade" => 10
    ),
    array(
        "nome" => "Terceiro Rack",
        "comprimento" => 20,
        "largura" => 20,
        "altura" => 30,
        "peso" => 7,
        "quantidade" => 200
    ),
);
$total_volume = 0;
$total_peso = 0;

//Calculo de cubagem
foreach ($itens as $item) {
    $volume_item = $item["comprimento"] * $item["largura"] * $item["altura"] * $item["quantidade"];
    $total_volume += $volume_item;
    $total_peso += $item["peso"] * $item["quantidade"];
}

$caixas = array(
    "P" => array(
        "comprimento" => 28,
        "largura" => 27,
        "altura" => 35,
    ),
    "M" => array(
        "comprimento" => 38,
        "largura" => 24,
        "altura" => 56,
    ),
    "G" => array(
        "comprimento" => 41,
        "largura" => 35,
        "altura" => 61,
    )
);

$encaixou = false;
$itens_caixa = array(); //Armazenar os itens

foreach ($itens as $item) {
    $item_encaixado = false;
    foreach ($caixas as $chave => $caixa) {
        if (
            $item["comprimento"] <= $caixa["comprimento"] &&
            $item["largura"] <= $caixa["largura"] &&
            $item["altura"] <= $caixa["altura"]
        ) {
            //Caso couber na caixa, incluir na lista de itens para essa caixa.
            $itens_caixa[$chave][] = $item;
            $item_encaixado = true;
            break;
        }
    }
    //Caso não couber, verificar:
        if (!$item_encaixado) {
            echo "O item ". $item['nome']. "com dimensões ". $item['comprimento']."x".$item['largura']."x".$item['altura']. "não pode ser encaixado em nenhuma caixa. <br>";
        }
}

//Itens inserido em cada caixa
foreach ($itens_caixa as $chave => $itens_na_caixa) {
    echo "<p> Itens na caixa $chave: </p><ul>";
    foreach ($itens_na_caixa as $item) {
        echo "<li>" .$item['quantidade']. " unidades do item: " .$item['nome']. " </li>";
    }
    //Peso total
    $peso_caixa = 0;
    foreach ($itens_na_caixa as $item) {
    $peso_caixa += $item["peso"] * $item["quantidade"];
    }
    echo "</ul><p>Peso total: $peso_caixa kg.</p><br>";
    $encaixou = true;
}

if (!$encaixou) {
    echo "ERRO, Verifique os dados!";
}
?>