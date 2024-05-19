<?php
$itens = array(
    array(
        "nome" => "Primeiro Rack",
        "comprimento" => 28,
        "largura" => 15,
        "altura" => 30,
        "peso" => 7,
        "quantidade" => 5,
    ),
    array(
        "nome" => "Segundo Rack",
        "comprimento" => 35,
        "largura" => 22,
        "altura" => 55,
        "peso" => 7,
        "quantidade" => 10,
    ),
    array(
        "nome" => "Terceiro Rack",
        "comprimento" => 20,
        "largura" => 20,
        "altura" => 30,
        "peso" => 7,
        "quantidade" => 200,
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
        "pesoMaximo" => 30
    ),
    "M" => array(
        "comprimento" => 38,
        "largura" => 24,
        "altura" => 56,
        "pesoMaximo" => 60
    ),
    "G" => array(
        "comprimento" => 41,
        "largura" => 35,
        "altura" => 61,
        "pesoMaximo" => 80
    )
);

$itens_caixa = array(); // Armazenar os itens

foreach ($itens as $item) {
    $quantidade_restante = $item["quantidade"];
    
    while ($quantidade_restante > 0) {
        $item_encaixado = false;
        
        foreach ($caixas as $chave => $caixa) {
            if (
                ($item["comprimento"] <= $caixa["comprimento"] &&
                 $item["largura"] <= $caixa["largura"] &&
                 $item["altura"] <= $caixa["altura"]) ||
           
                ($item["comprimento"] <= $caixa["comprimento"] &&
                 $item["altura"] <= $caixa["largura"] &&
                 $item["largura"] <= $caixa["altura"]) ||
           
                ($item["largura"] <= $caixa["comprimento"] &&
                 $item["comprimento"] <= $caixa["largura"] &&
                 $item["altura"] <= $caixa["altura"]) ||
           
                ($item["largura"] <= $caixa["comprimento"] &&
                 $item["altura"] <= $caixa["largura"] &&
                 $item["comprimento"] <= $caixa["altura"]) ||
           
                ($item["altura"] <= $caixa["comprimento"] &&
                 $item["comprimento"] <= $caixa["largura"] &&
                 $item["largura"] <= $caixa["altura"]) ||
           
                ($item["altura"] <= $caixa["comprimento"] &&
                 $item["largura"] <= $caixa["largura"] &&
                 $item["comprimento"] <= $caixa["altura"])
            ) {
                // Verifica se o peso total não ultrapassa o peso máximo da caixa
                $peso_caixa_atual = isset($itens_caixa[$chave]) ? array_reduce($itens_caixa[$chave], function($carry, $item) {
                    return $carry + $item["peso"] * $item["quantidade"];
                }, 0) : 0;
                
                if ($peso_caixa_atual + $item["peso"] <= $caixa["pesoMaximo"]) {
                    // Caso couber na caixa, incluir na lista de itens para essa caixa.
                    $itens_caixa[$chave][] = array(
                        "nome" => $item["nome"],
                        "comprimento" => $item["comprimento"],
                        "largura" => $item["largura"],
                        "altura" => $item["altura"],
                        "peso" => $item["peso"],
                        "quantidade" => 1 // Adiciona uma unidade por vez
                    );
                    $quantidade_restante--;
                    $item_encaixado = true;
                    break;
                }
            }
        }
        
        // Caso não couber em nenhuma caixa
        if (!$item_encaixado) {
            echo "O item " . $item['nome'] . " com dimensões " . $item['comprimento'] . "x" . $item['largura'] . "x" . $item['altura'] . " não pode ser encaixado em nenhuma caixa. <br>";
            break;
        }
    }
}

// Itens inseridos em cada caixa
foreach ($itens_caixa as $chave => $itens_na_caixa) {
    echo "<p>Itens na caixa $chave:</p><ul>";
    $quantidade_por_item = array();
    
    // Agrupar quantidades de itens iguais
    foreach ($itens_na_caixa as $item) {
        if (isset($quantidade_por_item[$item["nome"]])) {
            $quantidade_por_item[$item["nome"]]["quantidade"]++;
        } else {
            $quantidade_por_item[$item["nome"]] = $item;
        }
    }

    foreach ($quantidade_por_item as $item) {
        echo "<li>" . $item['quantidade'] . " unidades do item: " . $item['nome'] . "</li>";
    }

    // Peso total
    $peso_caixa = array_reduce($itens_na_caixa, function($carry, $item) {
        return $carry + $item["peso"] * $item["quantidade"];
    }, 0);
    
    echo "</ul><p>Peso total: $peso_caixa kg.</p><br>";
}

if (empty($itens_caixa)) {
    echo "ERRO, Verifique os dados!";
}
?>
