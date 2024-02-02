<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca</title>
</head>

<body>
    <h1>Lista Veículos</h1>
    <form action="">
        <input type="text" name="busca" placeholder="Digite os termos de pesquisa">
        <button type="submit">Pesquisar</button>
    </form>
    <table style="border: 1px solid black; width: 300px;">
        <tr>
            <th>Marca</th>
            <th>Veículo</th>
            <th>Modelo</th>
        </tr>
        <?php
        if (!isset($_GET['busca'])) {
        ?>
        <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
        </tr>
        <?php } else {
            $pesquisa = $mysqli->real_escape_string($_GET['busca']);
            $sql_code = "SELECT * FROM veiculo WHERE fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo  LIKE '%$pesquisa%'";
            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar!" . $mysqli->error);
            if ($sql_query->num_rows == 0) { ?>
        <tr>
            <td colspan="3">Nenhu resultado encontrado...</td>
        </tr>
        <?php } else {
                while ($dados = $sql_query->fetch_assoc()) {
                ?>
        <tr>
            <td><?= $dados['fabricante'] ?></td>
            <td><?= $dados['veiculo'] ?></td>
            <td><?= $dados['modelo'] ?></td>
        </tr>
        <?php
                }
            } ?>
        <?php } ?>
    </table>
</body>

</html>