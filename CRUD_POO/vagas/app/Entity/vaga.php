<?php

namespace App\Entity;

use \App\Db\Database;

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
    /**
     * Método responsá por cadastrar uma nova vaga no banco
     * @return boolean
     */
    public function cadastrar()
    {
        //DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');
        //INSERIR A VAGA NO BANCO
        $obDatabase = new Database('vaga');
        $this->id = $obDatabase->insert([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
            'data' => $this->data
        ]);
        //RETORNAR SUCESSO
        return true;
    }
}
