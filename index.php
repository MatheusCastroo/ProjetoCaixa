<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Caixa</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="principal">
        <div class="container">
            <form method="post" action="calculo.php">
                <h2>Selecionar Produto</h2>
                <div class="select-container">
                    <select name="rack" id="rack">
                        <option value="" disabled selected>Selecione o rack</option>
                        <option value="MINI RACK 3X300 34X22X57" id="0">MINI RACK 3X300 34X22X57</option>
                        <option value="MINI RACK 4X450 50X26X56" id="1">MINI RACK 4X450 50X26X56</option>
                        <option value="MINI RACK 5X350 39X30X56" id="2">MINI RACK 5X350 39X30X56</option>
                        <option value="MINI RACK 5X450 49X30X56" id="3">MINI RACK 5X450 49X30X56</option>
                        <option value="MINI RACK 6X450 49X35X56" id="4">MINI RACK 6X450 49X35X56</option>
                        <option value="MINI RACK 7X350 39X39X56" id="5">MINI RACK 7X350 39X39X56</option>
                        <option value="MINI RACK 7X450 49x39x56" id="6">MINI RACK 7X450 49x39x56</option>
                    </select>
                </div>
                <div class="button-container">
                    <input type="submit" class="button calcular" name="calcular" value="Calcular">
                    <input type="submit" class="button cadastrar" name="cadastro_produto" value="Cadastrar Produto">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

 <?php
/* 1. Preciso fazer um local onde o usuário consiga selecionar o produto que vai ser separado.
	a. Utilizar um select para selecionar o produto. (Ou realizar um filtro para buscar no banco)
	b. Criar um banco para armazenar os valores de dimensão de cada produto
    c. Realizar uma maneira de cadastrar os produtos, com sua dimensão especifica e salvar no banco de dados.
*/
