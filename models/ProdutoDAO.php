<?php
require_once 'Produto.php';

class ProdutoDAO{

    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     *
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    
    public function createOrUpdate(Produto $produto){
        try {
            if ($produto->getId() != "") {
                $stmt = $this->conn->prepare("UPDATE cadastro SET   tipo = ?,
                                                                    fabrica = ?,
                                                                    barra = ?,
                                                                    nome = ?,
                                                                    unidade = ?,
                                                                    ncm_ncm = ?,
                                                                    cest = ?,
                                                                    grupo = ?,
                                                                    cfop_entrada_cfop_cfop = ?,
                                                                    cfop_saida_cfop_cfop = ?,
                                                                    estoque = ?,
                                                                    minimo = ?,
                                                                    maximo = ?,
                                                                    preco_custo = ?,
                                                                    preco_venda = ?,
                                                                    preco_minimo = ?,
                                                                    observacao = ?
                                                            WHERE id = ?");
                $stmt->bindValue(18, $produto->getId());
            } else {
                $stmt = $this->conn->prepare("INSERT INTO cadastro (tipo,
                                                                    fabrica,
                                                                    barra,
                                                                    nome,
                                                                    unidade,
                                                                    ncm_ncm,
                                                                    cest,
                                                                    grupo,
                                                                    cfop_entrada_cfop_cfop,
                                                                    cfop_saida_cfop_cfop,
                                                                    estoque,
                                                                    minimo,
                                                                    maximo,
                                                                    preco_custo,
                                                                    preco_venda,
                                                                    preco_minimo,
                                                                    observacao)
                                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            }
            $stmt->bindValue(1, $produto->getTipo());
            $stmt->bindValue(2, $produto->getFabrica());
            $stmt->bindValue(3, $produto->getBarra());
            $stmt->bindValue(4, $produto->getNome());
            $stmt->bindValue(5, $produto->getUnidade());
            $stmt->bindValue(6, $produto->getNcm_ncm());
            $stmt->bindValue(7, $produto->getCest());
            $stmt->bindValue(8, $produto->getGrupo());
            $stmt->bindValue(9, $produto->getCfop_entrada_cfop_cfop());
            $stmt->bindValue(10, $produto->getCfop_saida_cfop_cfop());
            $stmt->bindValue(11, $produto->getEstoque());
            $stmt->bindValue(12, $produto->getMinimo());
            $stmt->bindValue(13, $produto->getMaximo());
            $stmt->bindValue(14, $produto->getPreco_custo());
            $stmt->bindValue(15, $produto->getPreco_venda());
            $stmt->bindValue(16, $produto->getPreco_minimo());
            $stmt->bindValue(17, $produto->getObservacao());
            
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
    
    public function deleteProduto($id){
        try {
            $stmt = $this->conn->prepare("DELETE FROM produto WHERE id = ?");
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
    
    public function listById($id){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM produto WHERE id = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Produto');
                return $stmt->fetch();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    
    public function listByNome($nome){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM produto WHERE nome LIKE ?");
            $stmt->bindValue(1, "%$nome%");
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Produto');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
}

