<?php

require_once 'Connection.php';
require_once 'Cep.php';

class CepDAO{

    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     *
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    
    public function createOrUpdate(Cep $cep){
        try {
            if ($cep->getCep() != "") {
                $stmt = $this->conn->prepare("UPDATE cadastro 
                                              SET bairro = ?, cidade_ibge = ?
                                              WHERE cep = ?");
                $stmt->bindValue(1, $cep->getBairro());
                $stmt->bindValue(2, $cep->getCidade_ibge());
                $stmt->bindValue(3, $cep->getCep());
            } else {
                $stmt = $this->conn->prepare("INSERT INTO cadastro (cep,bairro,cidade_ibge) VALUES (?,?,?)");
                $stmt->bindValue(1, $cep->getCep());
                $stmt->bindValue(2, $cep->getBairro());
                $stmt->bindValue(3, $cep->getCidade_ibge());
            }
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    //sucesso
                    return;
                } else {
                    //falha
                    echo "Erro ao tentar efetivar cadastro";
                    return;
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByCep($cep){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cep WHERE cep = ?");
            $stmt->bindParam(1, $cep, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cep');
                return $stmt->fetch();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByBairro($bairro){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cep WHERE bairro = ?");
            $stmt->bindParam(1, $bairro, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cep');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
            
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByCidadeIbge($cidade){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cep WHERE cidade_ibge = ?");
            $stmt->bindParam(1, $cidade, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cep');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
}

