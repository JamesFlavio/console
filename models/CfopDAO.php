<?php

class CfopDAO{

    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     *
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    
    public function listByCfop($cfop){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cfop WHERE cfop LIKE ?");
            $stmt->bindValue(1, "$cfop%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cfop');
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
            $stmt = $this->conn->prepare("SELECT * FROM cfop WHERE descricao LIKE ?");
            $stmt->bindValue(1, "%$descricao%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cfop');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
}

