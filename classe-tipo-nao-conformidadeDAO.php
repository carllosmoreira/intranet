<?php
session_start();
/* Inclui bibliotecas de classes */
include 'classe-tipo-nao-conformidade.php';
include_once "config.php";


class Classe_Nao_Conformidade_DAO{

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
 		public function inserir($TipoNaoConformidade){

 			/* Primeiro cria a query do MySQL */
 			$insert_query =	"INSERT INTO tipoNaoConformidade (id, nome) VALUES (DEFAULT,'".$TipoNaoConformidade->nome."')";
			
			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $insert_query)
			or die("Erro ao inserir tipo não conformidade: " . mysql_error() );

 		}

 		/* Função para atualizar os dados de um dos produtos já cadastrados */
 		public function atualizar($TipoNaoConformidade){
 			
 			/* Primeiro cria a query do MySQL */
 			$update_query =	"UPDATE tiponaoconformidade SET nome = '".$TipoNaoConformidade->nome."' WHERE id = ".$TipoNaoConformidade->id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $update_query)
			or die("Erro ao atualizar tipo não conformidade: " . mysql_error() );
 							
 		}

 		/* Função para excluir uma entrada de produto do banco de dados */
 		public function excluir($id){

 			/* Primeiro cria a query do MySQL */
 			$delete_query = "DELETE FROM tiponaoconformidade WHERE id = " . $id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $delete_query)
			or die("Erro ao excluir tipo não conformidade: " . mysql_error() );

 		}


		 /* Função que retorna posição de determinado ID dentro de um select em ordem alfabética */
 		public function posicaoSelect($id){

			/* Primeiro cria a query do MySQL */
			$list_query = "SELECT * FROM tiponaoconformidade ORDER BY nome";

			/* Envia a query para o banco de dados e verifica se funcionou */
			$result = mysqli_query($this->conexao, $list_query)
			or die("Erro ao listar naoconformidade: ");

			$i = -1;
			$j = 0;
			/* Loop que que vai pegando linha por linha do resultado obtido */
			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
				$i = $i + 1;
				if($id == $row["id"]){
					$j = $i;
				}
			}
			
			return $j;

		}

 		/* Função que lista todos os produtos e devolve em ordem alfabética */
 		public function listar(){

 			/* Primeiro cria a query do MySQL */
 			$list_query = "SELECT * FROM tiponaoconformidade ORDER BY nome";

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $list_query)
 			or die("Erro ao listar tipo não conformidade: " . mysql_error() );

 			/* Cria um array que receberá as linhas da tabela */
 			$lista = array();

 			/* Loop que que vai pegando linha por linha do resultado obtido */
 			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe Produto
 				$retorno = new Tipo_Nao_Conformidade();
 				//Preenche todos os campos do novo objeto
 				$retorno->id = $row["id"];
 				$retorno->nome = $row["nome"];
 				//Coloca no array
 				$lista[] = $retorno;
 			}

 			return $lista;

 		}

 		/*  */
 		public function buscaPorId($id){

 			/* Primeiro cria a query do MySQL */
 			$id_query = "SELECT * FROM tipoNaoConformidade WHERE id = ".$id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $id_query)
 			or die("Erro ao listar tipo não conformidade por ID: " . mysql_error() );

 			/* Cria variável de retorno e inicializa com NULL */
 			$retorno = null;

 			/* Se encontrou algo, pega todos os campos do resultado obtido */
 			if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe produto
 				$retorno = new tipoNaoConformidade();
 				//Preenche todos os campos do novo objeto
 				$retorno->id = $row["id"];
 				$retorno->nome = $row["nome"];
 			}
 			
 			return $retorno;

 		}

 		/*  */
 		public function buscaPorNome($nome){

 			/* Primeiro cria a query do MySQL */
 			$nome_query = "SELECT * FROM tipoNaoConformidade WHERE nome like '".$nome."'";

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $nome_query)
 			or die("Erro ao listar tipo não conformidade por nome: " . mysql_error() );

 			/* Cria um array que receberá as linhas da tabela */
 			$lista = array();

 			/* Loop que que vai pegando linha por linha do resultado obtido */
 			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe produto
 				$retorno = new tipoNaoConformidade();
 				//Preenche todos os campos do novo objeto
 				$retorno->id = $row["id"];
 				$retorno->nome = $row["nome"];
 				//Coloca no array
 				$lista[] = $retorno;
 			}

 			return $lista;

 		}
}
?>