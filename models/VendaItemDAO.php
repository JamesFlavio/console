<?php

class VendaItemDAO{

    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     *
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    
    public function createOrUpdate(VendaItem $vendaItem){
        try {
            if ($vendaItem->getId() != "") {
                $stmt = $this->conn->prepare("UPDATE 
                                                venda_item
                                              SET
                                                venda_id = ?,
                                                produto_id = ?,
                                                quantidade = ?,
                                                valor_unitario = ?
                                              WHERE id = ?");
                $stmt->bindValue(5, $vendaItem->getId());
            } else {
                $stmt = $this->conn->prepare("INSERT INTO venda_item (venda_id,produto_id,quantidade,valor_unitario) VALUES (?,?,?,?)");
            }
            $stmt->bindValue(1, $vendaItem->getVenda_id());
            $stmt->bindValue(2, $vendaItem->getProduto_id());
            $stmt->bindValue(3, $vendaItem->getQuantidade());
            $stmt->bindValue(4, $vendaItem->getValor_unitario());
            
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
}

