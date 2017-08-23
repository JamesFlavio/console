<?php
// namespace Models;

// use PDO;
// use PDOException;

class Connection{
    
    private $dsn = 'mysql:host=localhost;dbname=desenvolvimento';
    private $user = 'usuario';
    private $password = 'senha';
    
    private $pdo;
    
    public function __construct(){
        try{
            $this->pdo = new PDO ($this->dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("set names utf8");
        }catch(PDOException $erro){
            echo "Erro na conexão: " . $erro->getMessage();
        }
    }
    
    public function getPdo(){
        return $this->pdo;
    }

}

