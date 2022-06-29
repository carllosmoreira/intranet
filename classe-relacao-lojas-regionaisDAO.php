<?php
session_start();
/* Inclui bibliotecas de classes */
include 'classe-relacao-lojas-regionais.php';
include_once "config.php";


class Classe_Relacao_lojas_regionais_DAO{

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
 		public function inserir($Relacao_lojas_regionais){

 			/* Primeiro cria a query do MySQL */
 			$insert_query =	"INSERT INTO lojasRegionais (idLojasRegionais, regional, loja, data) VALUES (DEFAULT,".$Relacao_lojas_regionais->regional.",".$Relacao_lojas_regionais->loja.", ".$Relacao_lojas_regionais->data.")";
			
			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $insert_query)
			or $_SESSION['msg'] = "Erro de SQL ao inserir relação entre lojas e regionais.";

			$linhas=mysqli_affected_rows($this->conexao);
			
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Relação entre lojas e regionais inserida com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi inserido.";
			}

 		}

 		/* Função para atualizar os dados de um dos produtos já cadastrados */
 		public function atualizar($Relacao_lojas_regionais){
 			
 			/* Primeiro cria a query do MySQL */
 			$update_query =	"UPDATE lojasregionais SET regional = ".$Relacao_lojas_regionais->regional.", loja = ".$Relacao_lojas_regionais->loja.", data = ".$Relacao_lojas_regionais->data." WHERE idLojasRegionais = ".$Relacao_lojas_regionais->idLojasRegionais;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $update_query)
			or $_SESSION['msg'] = "Erro de SQL ao atualizar relação entre lojas e regionais. ";

			$linhas=mysqli_affected_rows($this->conexao);
			if(($linhas>0) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Relação entre loja e regional atualizada com sucesso!";
				
			}elseif(($linhas<1) && (!isset($_SESSION['msg']))){
				$_SESSION['msg'] = "Nenhum registro foi atualizado.";
			}
 							
 		}

 		/* Função para excluir uma entrada de produto do banco de dados */
 		public function excluir($id){

 			/* Primeiro cria a query do MySQL */
 			$delete_query = "DELETE FROM lojasregionais WHERE idLojasRegionais = " . $id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
			mysqli_query($this->conexao, $delete_query)
			or die("Erro ao excluir lojasregionais: ");

 		}

 		/*  */
 		public function buscaPorId($id){

 			/* Primeiro cria a query do MySQL */
 			$id_query = "SELECT * FROM lojasregionais WHERE idLojasRegionais = ".$id;

 			/* Envia a query para o banco de dados e verifica se funcionou */
 			$result = mysqli_query($this->conexao, $id_query)
 			or die("Erro ao listar lojasregionais por ID: ");

 			/* Cria variável de retorno e inicializa com NULL */
 			$retorno = null;

 			/* Se encontrou algo, pega todos os campos do resultado obtido */
 			if( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
 				//Cria nova instância da classe produto
 				$retorno = new Relacao_lojas_regionais();
 				//Preenche todos os campos do novo objeto
 				$retorno->idLojasRegionais = $row["idLojasRegionais"];
				$retorno->regional = $row["regional"];
				$retorno->loja = $row["loja"];
				$retorno->data = $row["data"];
 			}
 			
 			return $retorno;

		 }
		 
		 public function listarPorMes($mes, $ano){

			/* Primeiro cria a query do MySQL */
			$list_query = "SELECT * FROM lojasregionais WHERE MONTH(data) = ".$mes." and YEAR(data) = ".$ano;

			/* Envia a query para o banco de dados e verifica se funcionou */
			$result = mysqli_query($this->conexao, $list_query)
			or die("Erro ao listar lojas regionais: ");

			/* Cria um array que receberá as linhas da tabela */
			$lista = array();

			/* Loop que que vai pegando linha por linha do resultado obtido */
			while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
				//Cria nova instância da classe Produto
				$retorno = new Relacao_lojas_regionais();
				//Preenche todos os campos do novo objeto
				$retorno->idLojasRegionais = $row["idLojasRegionais"];
				$retorno->regional = $row["regional"];
				$retorno->loja = $row["loja"];
				$retorno->data = $row["data"];
				//Coloca no array
				$lista[] = $retorno;
			}

			return $lista;

	   }

}
?>