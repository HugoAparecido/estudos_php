<?php
include("./conexao.php");
if (isset($_GET['deletar'])) {
    $id = intval(($_GET['deletar']));
    $sql_query = $mysqli->query("SELECT * FROM arquivo WHERE id = '$id'") or die($mysqli->error);
    $arquivo = $sql_query->fetch_assoc();
    if (unlink($arquivo['path'])) {
        $deu_certo = $mysqli->query("DELETE FROM arquivo WHERE id = '$id'") or die($mysqli->error);
        if ($deu_certo)
            echo "Arquivo excluido com sucesso!";
    }
}
function EnviarArquivo($error, $size, $name, $tmp_name)
{
    include("./conexao.php");
    if ($error)
        die("Falha ao enviar o arquivo");
    if ($size > 2097152)
        die("Arquivo muito grande!! Max: 2MB");
    $pasta = "arquivos/";
    $nomeDoArquivo = $name;
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if ($extensao != "jpg" && $extensao != 'png')
        die("Tipo de extensão não aceita");
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($tmp_name, $path);
    if ($deu_certo) {
        $mysqli->query("INSERT INTO arquivo (nome, path) VALUES ('$nomeDoArquivo','$path')") or die($mysqli->error);
        return true;
    } else
        return false;
}
if (isset($_FILES['arquivos'])) {
    $arquivos = $_FILES['arquivos'];
    $tudo_certo = true;
    foreach ($arquivos['name'] as $index => $arq) {
        $deu_certo = EnviarArquivo($arquivos['error'][$index], $arquivos['size'][$index], $arquivos['name'][$index], $arquivos['tmp_name'][$index]);
        if (!$deu_certo)
            $tudo_certo = false;
    }
    if ($tudo_certo)
        echo "<p>Todos os arquivos foram enviados com sucesso!</p>";
    else
        echo "<p>Falha ao enviar um ou mais arquivos!</p>";
}
$sql_query = $mysqli->query("SELECT * FROM arquivo") or die($mysqli->error);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivo</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form enctype="multipart/form-data" action="" method="post">
        <label for="arquivos[]">Selecione o arquivo</label>
        <input multiple type="file" name="arquivos[]" id="arquivos[]">
        <button name="upload" type="submit">Enviar Arquivo</button>
    </form>
    <h1>Lista de Arquivos</h1>
    <table>
        <thead>
            <th>Preview</th>
            <th>Arquivo</th>
            <th>Data de Envio</th>
            <th></th>
        </thead>
        <tbody>
            <?php
            while ($arquivo = $sql_query->fetch_assoc()) {
            ?>
            <tr>
                <td><img height="50" src="<?= $arquivo['path'] ?>" alt=""></td>
                <td><a target="_blank" href="<?= $arquivo['path'] ?>"><?= $arquivo['nome'] ?></a></td>
                <td><?= date("d/m/Y H:i", strtotime($arquivo['data_upload'])) ?></td>
                <th><a href="index.php?deletar=<?= $arquivo['id'] ?>">Deletar</a></th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>