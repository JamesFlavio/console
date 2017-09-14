<?php
require_once 'Connection.php';
require_once 'Cadastro.php';

class CadastroDAO{
    
    private $conn;
    
    /**
     * Construtor com injeção de dependência.
     * 
     * @param Connection $conn Conexão com o banco de dados.
     */
    public function __construct(Connection $conn){
        $this->conn = $conn->getPdo();
    }
    /**
     * Cria um registro na tabela 'Cadastro'
     * 
     * @param Cadastro $cadastro Objeto a ser inserido.
     * @throws PDOException se falhar ao executar o sql.
     * @return void.
     */
    public function createOrUpdate(Cadastro $cadastro){
        try {
            if ($cadastro->getId() != "") {
                $stmt = $this->conn->prepare("UPDATE cadastro SET tipo = ?,
                                                                    cnpj_ou_cpf = ?,
                                                                    ie_ou_rg = ?,
                                                                    im = ?,
                                                                    razao_social_ou_nome = ?,
                                                                    nome_fantasia_ou_sobrenome = ?,
                                                                    apelido = ?,
                                                                    cep_cep = ?,
                                                                    endereco = ?,
                                                                    numero = ?,
                                                                    bairro = ?,
                                                                    complemento = ?,
                                                                    telefone = ?,
                                                                    ramal = ?,
                                                                    fax = ?,
                                                                    celular = ?,
                                                                    responsavel = ?,
                                                                    site = ?,
                                                                    novidade = ?,
                                                                    promocao = ?,
                                                                    observacao = ?  
                                            WHERE id = ?");
                $stmt->bindValue(22, $cadastro->getId());
            } else {
                $stmt = $this->conn->prepare("INSERT INTO cadastro (  tipo,
                                                                    cnpj_ou_cpf,
                                                                    ie_ou_rg,
                                                                    im,
                                                                    razao_social_ou_nome,
                                                                    nome_fantasia_ou_sobrenome,
                                                                    apelido,
                                                                    cep_cep,
                                                                    endereco,
                                                                    numero,
                                                                    bairro,
                                                                    complemento,
                                                                    telefone,
                                                                    ramal,
                                                                    fax,
                                                                    celular,
                                                                    responsavel,
                                                                    site,
                                                                    novidade,
                                                                    promocao,
                                                                    observacao  )
                                            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            }
            $stmt->bindValue(1, $cadastro->getTipo());
            $stmt->bindValue(2, $cadastro->getCnpj_cpf());
            $stmt->bindValue(3, $cadastro->getIe_rg());
            $stmt->bindValue(4, $cadastro->getIm());
            $stmt->bindValue(5, $cadastro->getRazao_social_nome());
            $stmt->bindValue(6, $cadastro->getNome_fantasia_sobrenome());
            $stmt->bindValue(7, $cadastro->getApelido());
            $stmt->bindValue(8, $cadastro->getCep_cep());
            $stmt->bindValue(9, $cadastro->getEndereco());
            $stmt->bindValue(10, $cadastro->getNumero());
            $stmt->bindValue(11, $cadastro->getBairro());
            $stmt->bindValue(12, $cadastro->getComplemento());
            $stmt->bindValue(13, $cadastro->getTelefone());
            $stmt->bindValue(14, $cadastro->getRamal());
            $stmt->bindValue(15, $cadastro->getFax());
            $stmt->bindValue(16, $cadastro->getCelular());
            $stmt->bindValue(17, $cadastro->getResponsavel());
            $stmt->bindValue(18, $cadastro->getSite());
            $stmt->bindValue(19, $cadastro->getNovidade());
            $stmt->bindValue(20, $cadastro->getPromocao());
            $stmt->bindValue(21, $cadastro->getObservacao());
            
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
    /**
     * Remove um registro da tabela 'Cadastro'
     * 
     * @param int $id O id da linha a ser removida.
     * @throws PDOException se falhar ao executar o sql.
     * @return void
     */
    public function deleteCadastro($id){
        try {
            $stmt = $this->conn->prepare("DELETE FROM cadastro WHERE id = ?");
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
    /**
     * Retorna um objeto da classe Cadastro.
     * 
     * @param int $id O id a ser pesquisado.
     * @throws PDOException se falahr ao executar o sql.
     * @return Cadastro
     */
    public function listById($id){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cadastro WHERE id = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cadastro');
                return $stmt->fetch();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    /** 
     * Retona um array de objetos da classe Cadastro.
     * 
     * @param string $tipo Tipo do cliente (0 = Cliente, 1 = Fornecedor, 2 = Transportador).
     * 
     * @throws PDOException se falhar ao executar o sql.
     * @return array Cadastro.
     */
    public function listByTipo($tipo){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cadastro WHERE tipo = ?");
            $stmt->bindParam(1, $tipo, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cadastro');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }

        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
    /**
     * Retona um array de objetos da classe Cadastro.
     *
     * @param string $cnpj_cpf Numero do CNPJ/CPF do cliente.
     *
     * @throws PDOException se falhar ao executar o sql.
     * @return array Cadastro.
     */
    public function listByCnpjCpf($cnpj_cpf){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM cadastro WHERE cnpj_ou_cpf = ?");
            $stmt->bindParam(1, $cnpj_cpf, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cadastro');
                return $stmt->fetchAll();
            }else {
                throw new PDOException("Não foi possível executar a declaração sql.");
            }
            
        }catch(PDOException $erro){
            echo "Erro: ".$erro->getMessage();
        }
    }
   /**
    * Atribui os valores em um objeto Cadastro.
    * 
    * @param object $row Objeto standard contendo os mesmos atributos de Cadastro.
    * @return Cadastro $cadastro O objeto preenchido.
    */
    public function setCadastro($row){
        $cadastro = new Cadastro();    
       
        $cadastro->setCnpj_cpf($row->cnpj_cpf);
        $cadastro->setIe_rg($row->ie_rg);
        $cadastro->setIm($row->im);
        $cadastro->setRazao_social_nome($row->razao_social_nome);
        $cadastro->setNome_fantasia_sobrenome($row->nome_fantasia_sobrenome);
        $cadastro->setApelido($row->apelido);
        $cadastro->setCep_cep($row->cep_cep);
        $cadastro->setEndereco($row->endereco);
        $cadastro->setNumero($row->numero);
        $cadastro->setBairro($row->bairro);
        $cadastro->setComplemento($row->complemento);
        $cadastro->setTelefone($row->telefone);
        $cadastro->setRamal($row->ramal);
        $cadastro->setFax($row->fax);
        $cadastro->setCelular($row->celular);
        $cadastro->setResponsavel($row->responsavel);
        $cadastro->setSite($row->site);
        $cadastro->setNovidade($row->novidade);
        $cadastro->setPromocao($row->promocao);
        $cadastro->setObservacao($row->observacao);

        return $cadastro;
    }
    
}

