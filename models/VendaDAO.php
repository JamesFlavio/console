<?php

class VendaDAO{

    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     *
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    
    public function createOrUpdate(Venda $venda){
        try {
            if ($venda->getId() != "") {
                $stmt = $this->conn->prepare("UPDATE venda
                                              SET cadastro_id = ?, data = ?
                                              WHERE id = ?");
                $stmt->bindValue(3, $venda->getId());
            } else {
                $stmt = $this->conn->prepare("INSERT INTO cadastro (cadastro_id,data) VALUES (?,?)");
            }
            $stmt->bindValue(1, $venda->getCadastro_id());
            $stmt->bindValue(2, $venda->getData());
            
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
    
    public function deleteVenda($id){
        try {
            $stmt = $this->conn->prepare("DELETE FROM venda WHERE id = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return;
            }else{
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByCadastroId($cadastroId){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM venda WHERE id = ?");
            $stmt->bindParam(1, $cadastroId, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Venda');
                return $stmt->fetch();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    
}

