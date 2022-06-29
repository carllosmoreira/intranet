<?php
session_start();
/* Inclui bibliotecas de classes */
include 'classe-regional.php';
include_once "config.php";


class Classe_Regional_DAO{

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
 		public function inserir($Regional){

 			/* Primeiro cria a query do MySQL */
 			$insert_query =	"INSERT INTO regionais (idRegional, regional) VALUES (DEFAULT,'".$Regional->regional."')";
			
			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $insert_query)
			or $_SESSION['msg'] = "Erro de SQL ao inserir regional.";

			$linhas=mysqli_affected_rows($this->conexao);
			
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Regional inserida com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi inserido.";
			}

 		}

 		/* Função para atualizar os dados de um dos produtos já cadastrados */
 		public function atualizar($Regional){
 			
 			/* Primeiro cria a query do MySQL */
 			$update_query =	"UPDATE regionais SET regional = '".$Regional->regional."' WHERE idRegional = ".$Regional->idRegional;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $update_query)
			or $_SESSION['msg'] = "Erro de SQL ao atualizar regional.";

			$linhas=mysqli_affected_rows($this->conexao);
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Regional atualizada com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi atualizado.";
			}
 							
 		}

 		/* Função para excluir uma entrada de produto do banco de dados */
 		public function excluir($id){

 			/* Primeiro cria a query do MySQL */
 			$delete_query = "DELETE FROM regionais WHERE idRegional = " . $id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $delete_query)
			or $_SESSION['msg'] = "Erro de SQL ao excluir regional.";

			$linhas=mysqli_affected_rows($this->conexao);
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Regional excluída com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi excluído.";
			}

 		}


		 /* Função que retorna posição de determinado ID dentro de um select em ordem alfabética */
 		public function posicaoSelect($id){

			/* Primeiro cria a query do MySQL */
			$list_query = "SELECT * FROM regionais ORDER BY regional";

			/* Envia a query para o banco de dados e verifica se funcionou */
			$result = mysqli_query($this->conexao, $list_query)
			or die("Erro ao listar regional: ");

			$i = 0;
			$j = 0;
			/* Loop que que vai pegando linha por linha do resultado obtido */
			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
				$i = $i + 1;
				if($id == $row["idRegional"]){
					$j = $i;
				}
			}
			
			return $j;

		}

 		/* Função que lista todos os produtos e devolve em ordem alfabética */
 		public function listar(){

 			/* Primeiro cria a query do MySQL */
 			$list_query = "SELECT * FROM regionais ORDER BY regional";

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $list_query)
 			or die("Erro ao listar regional: ");

 			/* Cria um array que receberá as linhas da tabela */
 			$lista = array();

 			/* Loop que que vai pegando linha por linha do resultado obtido */
 			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe Produto
 				$retorno = new Regional();
 				//Preenche todos os campos do novo objeto
 				$retorno->idRegional = $row["idRegional"];
				 $retorno->regional = $row["regional"];
 				//Coloca no array
 				$lista[] = $retorno;
 			}

 			return $lista;

		 }

 		/*  */
 		public function buscaPorId($id){

 			/* Primeiro cria a query do MySQL */
 			$id_query = "SELECT * FROM regionais WHERE idRegional = ".$id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $id_query)
 			or die("Erro ao listar regional por ID: ");

 			/* Cria variável de retorno e inicializa com NULL */
 			$retorno = null;

 			/* Se encontrou algo, pega todos os campos do resultado obtido */
 			if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe produto
 				$retorno = new Regional();
 				//Preenche todos os campos do novo objeto
 				$retorno->idRegional = $row["idRegional"];
 				$retorno->regional = $row["regional"];
 			}
 			
 			return $retorno;

 		}

}
?>