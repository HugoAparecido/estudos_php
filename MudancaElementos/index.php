<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/custom.css">
    <title>Arrastar e Soltar Valores</title>
</head>

<body>
    <h2 class="titulo">Cadastrar Acessórios</h2>
    <div class="areaDados">
        <h2>Disponível</h2>
        <ul class="containerItem">
            <!-- Criar item disponível -->
            <!-- O atributo draggable é usado para controlar se um elemento HTML pode ser arrastado pelo usuário ou não -->
            <li draggable="true" class="itemArrastavel" data-acessorio-id="1">Ar-condicionado</li>
            <li draggable="true" class="itemArrastavel" data-acessorio-id="2">Vidro Elétrico</li>
            <li draggable="true" class="itemArrastavel" data-acessorio-id="3">Direção Elétrica</li>
        </ul>
    </div>
    <div class="areaDados">
        <h2>Selecionados</h2>
        <ul class="containerItem">
            <!-- Recebe item selecionado -->
        </ul>
    </div>
    <script src="./js/custom.js"></script>
</body>

</html>