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
        "largura" => 22,
        "altura" => 55,
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

// Calculo de cubagem
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
        "peso_maximo" => 20
    ),
    "M" => array(
        "comprimento" => 38,
        "largura" => 24,
        "altura" => 56,
        "peso_maximo" => 40
    ),
    "G" => array(
        "comprimento" => 41,
        "largura" => 35,
        "altura" => 61,
        "peso_maximo" => 60
    )
);

$encaixou = false;
$itens_caixa = array(); // Armazenar os itens

// Ordenar as caixas do menor para o maior volume
uasort($caixas, function ($a, $b) {
    $volumeA = $a['comprimento'] * $a['largura'] * $a['altura'];
    $volumeB = $b['comprimento'] * $b['largura'] * $b['altura'];
    return $volumeA - $volumeB;
});

foreach ($itens as $item) {
    // Verificar se é possível encaixar todos os itens em uma única caixa
    $item_encaixado = false;
    foreach ($caixas as $chave => $caixa) {
        if (
            $item["comprimento"] <= $caixa["comprimento"] &&
            $item["largura"] <= $caixa["largura"] &&
            $item["altura"] <= $caixa["altura"] &&
            ($item["peso"] * $item['quantidade']) <= $caixa["peso_maximo"]
        ) {
            // Encaixar todos os itens nesta caixa
            $quantidade_caixa = $item['quantidade'];
            $itens_caixa[$chave][] = array_merge($item, array("quantidade" => $quantidade_caixa));
            $item_encaixado = true;
            break;
        }
    }

    // Caso não seja possível encaixar todos os itens em uma única caixa, distribuir em várias caixas menores
    if (!$item_encaixado) {
        $item_restante = $item['quantidade']; // quantidade de itens que ainda precisam ser encaixados
        foreach ($caixas as $chave => $caixa) {
            while (
                $item_restante > 0 &&
                $item["comprimento"] <= $caixa["comprimento"] &&
                $item["largura"] <= $caixa["largura"] &&
                $item["altura"] <= $caixa["altura"] &&
                ($item["peso"] * $item['quantidade']) <= $caixa["peso_maximo"]
            ) {
                // Verificar quantos itens cabem na caixa
                $quantidade_caixa = floor($caixa["peso_maximo"] / ($item["peso"] * $item['quantidade']));
                $quantidade_caixa = min($quantidade_caixa, $item_restante); // não pode ser mais do que os itens restantes
                $itens_caixa[$chave][] = array_merge($item, array("quantidade" => $quantidade_caixa)); // incluir na lista de itens para essa caixa
                $item_restante -= $quantidade_caixa; // atualizar a quantidade restante de itens
            }
        }
    }
}

// Itens inseridos em cada caixa
foreach ($itens_caixa as $chave => $itens_na_caixa) {
    echo "<p> Itens na caixa $chave: </p><ul>";
    foreach ($itens_na_caixa as $item) {
        echo "<li>" . $item['quantidade'] . " unidades do item: " . $item['nome'] . " </li>";
    }
    // Peso total
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
