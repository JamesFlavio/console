<?php
/**
 * @author James Flávio Nunes da Cruz
 * @since 1.0.0 Primeira versão criada e bem resumida.
 * @since 1.0.1 Implantado as funções para executar o INSERT.
 */

class BancoMysql {
	
	/**
	 * Dados para conexão com o banco:
	 * @method string $host		IP do servidor
	 * @param $usuario	Nome de usuário do banco
	 * @param $senha	Senha de conexão
	 * @param $banco	Nome do banco de dados Mysql
	 */
	private $host		= "169.254.27.210";
	private $usuario	= "usuario";
	private $senha		= "senha";
	private $banco		= "emporioa_desenvolvimento";
	
	private $conexao;
	private $select;
	private $insert;
	
	/**
	 * Já da inicio na conexão com o banco ao criar um objeto
	 * @param $c SELECT que será executado no banco através da função mysqli_query.
	 */
	function __construct(){
		$this->setConecta();
	}
	
	/**
	 * Conecta no banco de dados com os dados citados acima para conexão.
	 * 
	 */
	protected	function setConecta(){
		$this->conexao = mysqli_connect($this->host,$this->usuario,$this->senha,$this->banco);
		if(!$this->conexao){
			die ("<pre>Erro na conexão!</pre>");
		}
	}
	
	/**
	 *
	 */
	protected	function getConecta(){
		return $this->conexao;
	}
	
	public		function getDesconecta(){
		 mysqli_close($this->conexao);
	}
	
	/**
	 *
	 */
	public		function setSelect($select){
		$this->select = mysqli_query($this->conexao,$select);
		if(!$this->select){
			die ("<pre>Erro no query!</pre>");
		}
	}
	
	/**
	 *
	 */
	public		function getSelect(){
		return mysqli_fetch_assoc($this->select);
	}
	
	/**
	 *
	 */
	public		function getInsert(){
		return $this->insert;
	}
	
	/**
	 * Faz todos inputs no banco definido da segunte forma ("Nome da tabela", "Array com os dados a serem inseridos").
	 * @param $tabela	Nome da tabela a ser inputado os valores.
	 * @param $dados	Array com dados a serem inseridos da especificado de acordo com o exemplo: Inserir Brasília
	 * na tabela cidades - Array[nome => "Brasília"].
	 */
	public		function setInsert($tabela,$dados){
		foreach($dados as $key => $value){
			$campo[] 	= $key;
			$valores[]	= $value;
		}
		
		$this->insert = mysqli_query($this->conexao,"INSERT INTO ".$tabela." (".implode(",",$campo).") VALUES ('".implode("','",$valores)."')");
		
		// echo "<br>INSERT INTO ".$tabela." (".implode(",",$campo).") VALUES ('".implode("','",$valores)."')";

		if(!$this->insert){
			die("<pre>Erro no insert!</pre>");
		} else {
			echo("<pre>Cadastro efetuado!</pre>");
		}

		$this->getInsert();
	}
	
}

?>