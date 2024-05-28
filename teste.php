<?php
$itens = array(
    array(
        "nome" => "Primeiro Rack",
        "comprimento" => 28,
        "largura" => 15,
        "altura" => 30,
        "peso" => 7,
        "quantidade" => 1,
    ),
    array(
        "nome" => "Segundo Item",
        "comprimento" => 28,
        "largura" => 15,
        "altura" => 30,
        "peso" => 7,
        "quantidade" => 3,
    ),
    array(
        "nome" => "Terceiro Item",
        "comprimento" => 28,
        "largura" => 15,
        "altura" => 30,
        "peso" => 7,
        "quantidade" => 8,
    ),
);

$caixas = array(
    "P" => array(
        "comprimento" => 35,
        "largura" => 28,
        "altura" => 27,
        "pesoMaximo" => 30
    ),
    "M" => array(
        "comprimento" => 56,
        "largura" => 38,
        "altura" => 24,
        "pesoMaximo" => 60
    ),
    "G" => array(
        "comprimento" => 61,
        "largura" => 41,
        "altura" => 35,
        "pesoMaximo" => 80
    )
);

$itens_caixa = array(); // Armazenar os itens
$caixas_utilizadas = array("P" => 0, "M" => 0, "G" => 0); // Contador de caixas utilizadas

function calcula_volume($comprimento, $largura, $altura) {
    return $comprimento * $largura * $altura;
}

foreach ($itens as $item) {
    $quantidade_restante = $item["quantidade"];
    
    while ($quantidade_restante > 0) {
        $item_encaixado = false;
        
        foreach ($caixas as $chave => $caixa) {
            $caixa_id = $chave . "_" . $caixas_utilizadas[$chave]; // ID único para cada caixa
            
            if (!isset($itens_caixa[$caixa_id])) {
                $itens_caixa[$caixa_id] = array(
                    "tipo" => $chave,
                    "itens" => array(),
                    "peso_atual" => 0,
                    "volume_atual" => 0
                );
            }

            $volume_item = calcula_volume($item["comprimento"], $item["largura"], $item["altura"]);
            $volume_caixa = calcula_volume($caixa["comprimento"], $caixa["largura"], $caixa["altura"]);
            
            // Verifica se o item cabe na caixa e se não ultrapassa o peso máximo ou volume máximo
            if (
                $volume_item <= $volume_caixa &&
                $itens_caixa[$caixa_id]["peso_atual"] + $item["peso"] <= $caixa["pesoMaximo"] &&
                $itens_caixa[$caixa_id]["volume_atual"] + $volume_item <= $volume_caixa
            ) {
                // Caso couber na caixa, incluir na lista de itens para essa caixa.
                $itens_caixa[$caixa_id]["itens"][] = array(
                    "nome" => $item["nome"],
                    "comprimento" => $item["comprimento"],
                    "largura" => $item["largura"],
                    "altura" => $item["altura"],
                    "peso" => $item["peso"],
                    "quantidade" => 1 // Adiciona uma unidade por vez
                );
                $itens_caixa[$caixa_id]["peso_atual"] += $item["peso"];
                $itens_caixa[$caixa_id]["volume_atual"] += $volume_item;
                $quantidade_restante--;
                $item_encaixado = true;
                break;
            }
        }
        
        // Caso não couber em nenhuma caixa atual, criar uma nova caixa do mesmo tipo
        if (!$item_encaixado) {
            foreach ($caixas as $chave => $caixa) {
                if ($caixa_id == $chave . "_" . $caixas_utilizadas[$chave]) {
                    $caixas_utilizadas[$chave]++;
                    break;
                }
            }
        }
    }
}

// Corrigir a contagem de caixas utilizadas
foreach ($caixas_utilizadas as $tipo => $quantidade) {
    if (isset($itens_caixa[$tipo . "_" . $quantidade])) {
        $caixas_utilizadas[$tipo]++;
    }
}

// Itens inseridos em cada caixa
foreach ($itens_caixa as $caixa_id => $dados_caixa) {
    echo "<p>Itens na caixa $caixa_id ({$dados_caixa['tipo']}):</p><ul>";
    $quantidade_por_item = array();
    
    // Agrupar quantidades de itens iguais
    foreach ($dados_caixa["itens"] as $item) {
        if (isset($quantidade_por_item[$item["nome"]])) {
            $quantidade_por_item[$item["nome"]]["quantidade"]++;
        } else {
            $quantidade_por_item[$item["nome"]] = $item;
        }
    }

    foreach ($quantidade_por_item as $item) {
        echo "<li>" . $item['quantidade'] . " unidades do item: " . $item['nome'] . "</li>";
    }

    echo "</ul><p>Peso total: {$dados_caixa['peso_atual']} kg.</p><br>";
}

// Quantidade final de caixas utilizadas
foreach ($caixas_utilizadas as $tipo => $quantidade) {
    echo "<p>Caixas $tipo utilizadas: " . $quantidade . "</p>";
}

if (empty($itens_caixa)) {
    echo "ERRO, Verifique os dados!";
}
?>
