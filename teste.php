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

// Função para calcular o volume de um item
function calcularVolume($item) {
    return $item["comprimento"] * $item["largura"] * $item["altura"];
}

// Ordenando itens por volume (do maior para o menor)
usort($itens, function($a, $b) {
    return calcularVolume($b) - calcularVolume($a);
});

$caixas = array(
    "G" => array(
        "comprimento" => 41,
        "largura" => 35,
        "altura" => 61,
        "peso_maximo" => 60
    ),
    "M" => array(
        "comprimento" => 38,
        "largura" => 24,
        "altura" => 56,
        "peso_maximo" => 40
    ),
    "P" => array(
        "comprimento" => 28,
        "largura" => 27,
        "altura" => 35,
        "peso_maximo" => 20
    )
);

$itens_caixa = array(); // Armazenar os itens em caixas
$quantidade_caixas = array(); // Armazenar a quantidade de caixas utilizadas

foreach ($itens as $item) {
    $item_restante = $item['quantidade'];
    foreach ($caixas as $tamanho => $caixa) {
        while (
            $item_restante > 0 &&
            $item["comprimento"] <= $caixa["comprimento"] &&
            $item["largura"] <= $caixa["largura"] &&
            $item["altura"] <= $caixa["altura"] &&
            $item["peso"] * $item_restante <= $caixa["peso_maximo"]
        ) {
            // Verificar quantos itens cabem na caixa
            $quantidade_caixa = min(floor($caixa["peso_maximo"] / $item["peso"]), $item_restante);
            $itens_caixa[$tamanho][] = array_merge($item, array("quantidade" => $quantidade_caixa)); // incluir na lista de itens para essa caixa
            $item_restante -= $quantidade_caixa; // atualizar a quantidade restante de itens
        }
    }
}

// Calcular a quantidade de caixas utilizadas
foreach ($itens_caixa as $tamanho => $itens_na_caixa) {
    $quantidade_caixas[$tamanho] = count($itens_na_caixa);
}

// Mostrar resultados
echo "<p>Quantidade de caixas utilizadas:</p>";
foreach ($quantidade_caixas as $tamanho => $quantidade) {
    echo "<p>Caixa $tamanho: $quantidade</p>";
    echo "<p>Itens na caixa $tamanho:</p><ul>";
    foreach ($itens_caixa[$tamanho] as $item) {
        echo "<li>" . $item['quantidade'] . " unidades do item: " . $item['nome'] . " </li>";
    }
    echo "</ul>";
}
?>
