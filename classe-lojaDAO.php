<?php
session_start();
/* Inclui bibliotecas de classes */
include 'classe-loja.php';
include_once "config.php";


class Classe_Loja_DAO{

	/* Variável privada que armazena o identificador da conexão com o banco */
	private $conexao = null;

		/* Construtor da classe: estabelece conexão com o banco */
		/* Utiliza o método estático da classe GerenciadorConexao */
		public function __construct(){
			/* Recebe o identificador da conexão e armazena */
			$this->conexao = GerenciadorConexao::conectar();
		}

		/* Destrutor da classe: finaliza conexão com o banco */
		public function __destruct(){
			/* Verifica se a conexão havia sido estabelecida anteriormente */
			if($this->conexao)
				mysqli_close($this->conexao);
		}

/* -----------------------------------------------------------------------------
 * Aqui começa a implementação do CRUD
 *
 * C = Create 		-> 		Insere novas linhas na tabela
 * R = Retrieve 	-> 		Busca entradas na tabela
 * U = Update 		-> 		Atualiza linhas da tabela
 * D = delete 		->		Deleta linhas da tabela
 -----------------------------------------------------------------------------*/

 		/*Função para inserir novo produto na tabela produto do banco de dados*/
 		public function inserir($Loja){

 			/* Primeiro cria a query do MySQL */
 			$insert_query =	"INSERT INTO lojas (idLoja, nomeLoja, AGLoja, cnpjLoja) VALUES (DEFAULT,'".$Loja->nomeLoja."','".$Loja->AGLoja."','".$Loja->cnpjLoja."')";
			
			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $insert_query)
			or $_SESSION['msg'] = "Erro de SQL ao inserir loja.";

			$linhas=mysqli_affected_rows($this->conexao);
			
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Loja inserida com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi inserido.";
			}

 		}

 		/* Função para atualizar os dados de um dos produtos já cadastrados */
 		public function atualizar($Loja){
 			
 			/* Primeiro cria a query do MySQL */
 			$update_query =	"UPDATE lojas SET nomeLoja = '".$Loja->nomeLoja."', AGLoja = '".$Loja->AGLoja."', cnpjLoja = '".$Loja->cnpjLoja."' WHERE idLoja = ".$Loja->idLoja;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $update_query)
			or $_SESSION['msg'] = "Erro de SQL ao atualizar loja.";
			 
			$linhas=mysqli_affected_rows($this->conexao);
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Loja atualizada com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi atualizado.";
			}
 							
 		}

 		/* Função para excluir uma entrada de produto do banco de dados */
 		public function excluir($id){

 			/* Primeiro cria a query do MySQL */
 			$delete_query = "DELETE FROM lojas WHERE idLoja = " . $id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $delete_query)
			or $_SESSION['msg'] = "Erro de SQL ao excluir loja.";

			$linhas=mysqli_affected_rows($this->conexao);
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Loja excluída com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi excluído.";
			}

 		}

		/* Função que retorna posição de determinado ID dentro de um select em ordem alfabética */
 		public function posicaoSelect($id){

			/* Primeiro cria a query do MySQL */
			$list_query = "SELECT * FROM lojas ORDER BY nomeLoja";

			/* Envia a query para o banco de dados e verifica se funcionou */
			$result = mysqli_query($this->conexao, $list_query)
			or die("Erro ao listar produtos: ");

			$i = 0;
			$j = 0;
			/* Loop que que vai pegando linha por linha do resultado obtido */
			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
				$i = $i + 1;
				if($id == $row["idLoja"]){
					$j = $i;
				}
			}
			
			return $j;

		}

 		/* Função que lista todos os produtos e devolve em ordem alfabética */
 		public function listar(){

 			/* Primeiro cria a query do MySQL */
 			$list_query = "SELECT * FROM lojas ORDER BY nomeLoja";

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $list_query)
 			or die("Erro ao listar produtos: " . mysql_error() );

 			/* Cria um array que receberá as linhas da tabela */
 			$lista = array();

 			/* Loop que que vai pegando linha por linha do resultado obtido */
 			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe Produto
 				$retorno = new Loja();
 				//Preenche todos os campos do novo objeto
 				$retorno->idLoja = $row["idLoja"];
 				$retorno->nomeLoja = $row["nomeLoja"];
 				$retorno->AGLoja = $row["AGLoja"];
 				$retorno->cnpjLoja = $row["cnpjLoja"];
 				//Coloca no array
 				$lista[] = $retorno;
 			}

 			return $lista;

		 }

 		/*  */
 		public function buscaPorId($id){

 			/* Primeiro cria a query do MySQL */
 			$id_query = "SELECT * FROM lojas WHERE idLoja = ".$id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $id_query)
 			or die("Erro ao listar produtos por ID: " . mysql_error() );

 			/* Cria variável de retorno e inicializa com NULL */
 			$retorno = null;

 			/* Se encontrou algo, pega todos os campos do resultado obtido */
 			if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe produto
 				$retorno = new Loja();
 				//Preenche todos os campos do novo objeto
 				$retorno->idLoja = $row["idLoja"];
 				$retorno->nomeLoja = $row["nomeLoja"];
 				$retorno->AGLoja = $row["AGLoja"];
 				$retorno->cnpjLoja = $row["cnpjLoja"];
 			}
 			
 			return $retorno;

 		}

}
?>