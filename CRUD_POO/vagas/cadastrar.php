<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Vaga;
//VALIDAÇÃO DO POST
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $obvaga = new Vaga;
    $obvaga->titulo = $_POST['titulo'];
    $obvaga->descricao = $_POST['descricao'];
    $obvaga->ativo = $_POST['ativo'];
    echo "<pre>";
    print_r($obvaga);
    echo "</pre>";
    exit;
}
include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
