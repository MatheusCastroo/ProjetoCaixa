<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Caixa</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="form">
            <form method="post" action="cadastro_action_produto.php">
                <h2>Cadastre o Produto</h2>
                <div class="input-group">
                    <label for="item-cadastro">Descrição do Item:</label>
                    <input type="text" name="item-cadastro" id="item-cadastro">
                </div>
                <div class="input-group">
                    <label for="comprimento-cadastro">Comprimento do Item:</label>
                    <input type="number" name="comprimento-cadastro" id="comprimento-cadastro" step="any">
                </div>
                <div class="input-group">
                    <label for="largura-cadastro">Largura do Item:</label>
                    <input type="number" name="largura-cadastro" id="largura-cadastro" step="any">
                </div>
                <div class="input-group">
                    <label for="altura-cadastro">Altura do Item:</label>
                    <input type="number" name="altura-cadastro" id="altura-cadastro" step="any">
                </div>
                <div class="input-group">
                    <label for="peso-cadastro">Peso do Item:</label>
                    <input type="number" name="peso-cadastro" id="peso-cadastro" step="any">
                </div>
                <div class="button-container">
                    <input type="submit" class="button cadastrar" name="cadastro_produto" value="Cadastrar Produto">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
