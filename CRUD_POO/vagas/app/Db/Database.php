<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database
{
    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';
    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'wdev_vagas';
    /**
     * Usuário do banco
     * @var string
     */
    const USER = 'root';
    /**
     * Senha de acesso ao banco de dados
     * @var string
     */
    const PASS = "";
    /**
     * Nome da tabela
     * @var string
     */
    private $table;
    /**
     * Instância de conexão com o banco de dados
     * @var PDO
     */
    private $connection;
    /** 
     * Define a tabela e instância e conexão 
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }
    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }
    /**
     * Método responsável por inserir dados no banco
     * @param array [ field => value ]
     * @return integer
     */
    public function insert($values)
    {
        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        //MONTA A QUERY
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        echo $query;
        exit;
    }
}
