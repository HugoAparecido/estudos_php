<?php
$sql = "INSERT INTO categoria (nome_categoria) VALUES ('" . $_POST["nome_categoria"] . "')";
$res = $conn->query($sql);
if ($res == true) {
    print "<script>alert('Cadastrou com sucesso');</script>";
    print "<script>location.href='?page=listar-categoria';</script>";
} else {
    print "<script>alert('Não foi possível cadastrar');</script>";
    print "<script>location.href='?page=listar-categoria';</script>";
}
