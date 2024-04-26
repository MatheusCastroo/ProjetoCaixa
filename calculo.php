<?php
/*require 'config.php';*/

$descricao = filter_input(INPUT_POST, 'descricao');
$comprimento = filter_input(INPUT_POST, 'comprimento');
$largura = filter_input(INPUT_POST, 'largura');
$altura = filter_input(INPUT_POST, 'altura');
$peso = filter_input(INPUT_POST, 'peso');
$quantidade = filter_input(INPUT_POST, 'quantidade');


$item = array(
    "nome" => $descricao,
    "comprimento" => $comprimento,
    "largura" => $largura,
    "altura" => $altura,
    "peso" => $peso,
    "quantidade" => $quantidade
);

$caixas = array(
    "caixa P" => array(
        "comprimento" => 28,
        "largura" => 27,
        "altura" => 35
    ),
    "caixa M" => array(
        "comprimento" => 38,
        "largura" => 24,
        "altura" => 56
    ),
    "caixa G" => array(
        "comprimento" => 41,
        "largura" => 35,
        "altura" => 61
    )
);


if ($descricao && $comprimento && $largura && $altura && $peso && $quantidade) {
    $item["comprimento"] *= $item["quantidade"];
    $item["largura"] *= $item["quantidade"];
    $item["altura"] *= $item["quantidade"];

    $encaixou = false;
    foreach ($caixas as $chave => $value) {
        if ($item["comprimento"] <= $value["comprimento"] && $item["largura"] <= $value["largura"] && $item["altura"] <= $value["altura"]) {
            echo "Colocar o item " . $item["nome"] . " na " . $chave . "<br> Peso: " . $item["peso"] . " kg";
            $encaixou = true;
            break;
        }
    }
    if (!$encaixou) {
        echo "Joga a mercadoria no caminhão sem caixa mesmo.";
    }
}
?>
<form method="post" action="index.html">
    <div class="button-container">
        <input type="submit" name="voltar" value="Voltar">
    </div>
</form>