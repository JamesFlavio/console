<?php

require_once 'Connection.php';
require_once 'Ncm.php';

class NcmDAO{

    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     *
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    
    public function listByNcm($ncm){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM ncm WHERE ncm LIKE ?");
            $stmt->bindValue(1, "$ncm%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ncm');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByDescricao($descricao){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM ncm WHERE descricao LIKE ?");
            $stmt->bindValue(1, "%$descricao%", PDO::PARAM_STR);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ncm');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByNcmOrDescricao($ncm){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM ncm WHERE ncm LIKE ? OR descricao LIKE ?");
            $stmt->bindValue(1, "$ncm%");
            $stmt->bindValue(2, "%$ncm%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ncm');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
}

