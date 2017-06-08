<?php

class BancoMysql {
	
	private $host		= "169.254.27.210";
	private $usuario	= "usuario";
	private $senha		= "senha";
	private $banco		= "emporioa_desenvolvimento";
	private $conexao;
	private $consulta;
	private $resultado;
	
	
	function __construct($c){
		$this->setConecta();
		$this->setConsulta($c);
	}

	protected function setConecta(){
		$this->conexao = mysqli_connect($this->host,$this->usuario,$this->senha,$this->banco);
		if(!$this->conexao){
			die ("<pre>Erro na conexão!<?pre>");
		}
	}
	
	protected function getConecta(){
		return $this->conexao;
	}
	
	public function getDesconecta(){
		 mysqli_close($this->conexao);
	}
	
	protected function setConsulta($consulta){
		$this->consulta = mysqli_query($this->conexao,$consulta);
		if(!$this->consulta){
			die ("<pre>Erro no query!<?pre>");
		}
	}
	
	protected function getConsulta(){
		return $this->consulta;
	}
	
	protected function setResultado(){}
	
	public function getResultado(){
		return mysqli_fetch_assoc($this->getConsulta());
	}
	
	protected function mysqlInsere($tabela,$dados){
		foreach($dados as $key => $value){
			$campo[] 	= $key;
			$valores[]	= $value;
		}
		$sql = "INSERT INTO ".$tabela." (".implode(",",$campo).") VALUES (".implode(",",$valores).")";
		echo $sql;
	}
	
}

?>