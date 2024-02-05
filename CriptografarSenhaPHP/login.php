<?php
if (isset($_POST['email'])) {
    include('./conexao.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql_code = "SELECT * FROM senha WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
    $usuario = $sql_exec->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
        echo "Usuario logado!";
    } else {
        echo "Falha ao logar! Senha ou e-mail incorretos";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="email">
        <input type="text" name="senha">
        <button type="submit">LOGAR</button>
    </form>
</body>

</html>