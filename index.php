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
            <form method="post" action="calculo.php">
                <h2>Informações do produto</h2>
                <div class="select-container">
                    <div class="input-group">
                        <label for="descricao">Descrição do Item:</label>
                        <input type="text" name="descricao" id="descricao" required>
                    </div>
                    <div class="input-group">
                        <label for="comprimento-cadastro">Comprimento do Item:</label>
                        <input type="number" name="comprimento" id="comprimento" step="any" required>
                    </div>
                    <div class="input-group">
                        <label for="largura">Largura do Item:</label>
                        <input type="number" name="largura" id="largura" step="any" required>
                    </div>
                    <div class="input-group">
                        <label for="altura">Altura do Item:</label>
                        <input type="number" name="altura" id="altura" step="any" required>
                    </div>
                    <div class="input-group">
                        <label for="peso-cadastro">Peso do Item:</label>
                        <input type="number" name="peso" id="peso" step="any" required>
                    </div>

                    <div class="select-quantidade">
                        <label for="quantidade">Quantidade de itens:</label>
                        <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade de itens" required>
                    </div>
                    <div class="button-container">
                        <input type="submit" class="button calcular" name="calcular" value="Calcular">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>