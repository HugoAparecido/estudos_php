<?php
$sql = "INSERT INTO livro (categoria_cod_categoria, titulo_livro, autor_livro) VALUES (
    " . $_POST["categoria_cod_categoria"] . ",
     '" . $_POST["titulo_livro"] . "', 
     '"  . $_POST["autor_livro"] . "')";
$res = $conn->query($sql);
if ($res == true) {
    print "<script>alert('Cadastrou com sucesso');</script>";
    print "<script>location.href='?page=listar-livro';</script>";
} else {
    print "<script>alert('Não foi possível cadastrar');</script>";
    print "<script>location.href='?page=listar-livro';</script>";
}
