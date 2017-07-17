<?php

class produto extends BancoMysql
{
    private $ncm = $_GET["ncm"];
    private $descricao;
    
    /**
     * @return the $ncm
     */
    public function getNcm()
    {
        return $this->ncm;
    }

    /**
     * @param field_type $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return the $descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
    
    /**
     * @param field_type $Descricao
     */
    public function setDescricao($descricao)
    {
        $bd = new BancoMysql();
        $bd->setConsulta("SELECT * FROM ncm WHERE ncm = '$this->getNcm()'");
        $rows = $bd->getConsulta();
    
        $descricao  = $rows['descricao'];
    
        $this->descricao = $descricao;
    }
    
    
    
}

?>