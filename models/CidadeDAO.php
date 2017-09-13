<?php

class CidadeDAO{

    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     *
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    
    public function listByIbge($ibge){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cidade WHERE ibge LIKE ?");
            $stmt->bindValue(1, "$ibge%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cidade');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByNome($nome){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cidade WHERE nome LIKE ?");
            $stmt->bindValue(1, "$nome%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cidade');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByEstadoUf($estadoUf){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cidade WHERE estado_uf = ?");
            $stmt->bindValue(1, "$estadoUf%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cidade');
                return $stmt->fetch();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
}

