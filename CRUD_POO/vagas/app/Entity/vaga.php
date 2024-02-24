<?php

namespace App\Entity;

class Vaga
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;
    /**
     * Título da vaga
     * @var string
     */
    public $titulo;
    /**
     * Descrição da vaga (pode conter html)
     * @var string
     */
    public $descricao;
    /**
     * Define se a vaga é ativa
     * @var string(s/n)
     */
    public $ativo;
    /**
     * Data de publicação da vaga
     * @var string
     */
    public $data;
}
