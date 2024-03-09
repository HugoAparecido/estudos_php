<?php
class UserModel extends Database
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }
    public function fetch()
    {
        $stm = $this->pdo->query("SELECT * FROM senha");
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function fetchById($id)
    {
        //O prepare é para não permitir valores errados na query, tipo uma string ao invés de um número, etc. A exclamação significa um dado a ser colocado
        $stm = $this->pdo->prepare("SELECT * FROM senha WHERE id = ?");
        //"Troca" o ponto de interrogação por um valor
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}