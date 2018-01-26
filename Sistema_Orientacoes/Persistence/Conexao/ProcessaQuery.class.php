<?php
	require_once('Conexao.class.php');
	//Classe que processa as querys
	class ProcessaQuery{
		private static $mostrarErros = true;//seta se os erros devem ser exibidos ou nao

		//Conecta com o banco e executa a query passada, pode ser passado uma lista de querys
		public static function executarQuery($query){
			$retorno = new stdClass();

			//conecta
			$conexao = new Conexao('localhost', 'orientacoes', 'usuario', 'usuario@123');
			if(!$conexao->getErros()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroConectarBanco'];
				if(self::$mostrarErros)
					print_r($conexao->getErros());die("<br/>Erro!");
				return $retorno;
			}

			//comeca transacao
			if(!$conexao->iniciarTransacao()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroIniciarTransacao'];
				if(self::$mostrarErros)
					print_r($conexao->getErros());die("<br/>Erro!");
				return $retorno;
			}

			//executa query
			if(is_array($query)){
				foreach ($query as $q) {
					$result = $conexao->executarQuery($q);
					if($result == false && $result[2] != ""){
						$conexao->rollbackTransacao();
						$retorno->status = false;
						$retorno->resposta = $GLOBALS['msgErroExecQuery'];
						if(self::$mostrarErros)
							echo "Query: ".$q."<br/>";print_r($conexao->getErros());die("<br/>Erro!");
						return $retorno;
					}
				}
			}
			else{
				if($conexao->executarQuery($query) != 1){
					$conexao->rollbackTransacao();
					$retorno->status = false;
					$retorno->resposta = $GLOBALS['msgErroExecQuery'];
					if(self::$mostrarErros)
						echo "Query: ".$query."<br/>";print_r($conexao->getErros());die("<br/>Erro!");
					return $retorno;
				}
			}


			$conexao->commitTransacao();

			$retorno->status = true;
			return $retorno;
		}

		//Conecta com o banco e consulta a query passada, pode ser passado uma lista de querys
		//se for passado um array a resposta do retorno tera um array onde cada posicao e relativa a uma query
		public static function consultarQuery($query){
			$retorno = new stdClass();

			//conecta
			$conexao = new Conexao('localhost', 'orientacoes', 'usuario', 'usuario@123');
			if(!$conexao->getErros()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroConectarBanco'];
				if(self::$mostrarErros)
					print_r($conexao->getErros());die("<br/>Erro!");
				return $retorno;
			}

			//comeca transacao
			if(!$conexao->iniciarTransacao()){
				$retorno->status = false;
				$retorno->resposta = $GLOBALS['msgErroIniciarTransacao'];
				if(self::$mostrarErros)
					print_r($conexao->getErros());die("<br/>Erro!");
				return $retorno;
			}

			//executa query
			$retorno->resposta = array();
			if(is_array($query)){
				foreach ($query as $q) {
					$consultaResposta = $conexao->consultarQuery($q);
					if($consultaResposta == false){
						$conexao->rollbackTransacao();
						$retorno->status = false;
						$retorno->resposta = $GLOBALS['msgErroExecQuery'];
						if(self::$mostrarErros)
							echo "Query: ".$q."<br/>";print_r($conexao->getErros());die("<br/>Erro!");
						return $retorno;
					}

					$umaConsulta = array();
					while($obj = $consultaResposta->fetchObject()){
						array_push($umaConsulta, $obj);
					}
					array_push($retorno->resposta, $umaConsulta);
				}
			}
			else{
				$consultaResposta = $conexao->consultarQuery($query);
				if(!$consultaResposta){
					$conexao->rollbackTransacao();
					$retorno->status = false;
					$retorno->resposta = $GLOBALS['msgErroExecQuery'];
					if(self::$mostrarErros)
						echo "Query: ".$query."<br/>";print_r($conexao->getErros());die("<br/>Erro!");
					return $retorno;
				}

				while($obj = $consultaResposta->fetchObject()){
					array_push($retorno->resposta, $obj);
				}
			}

			$conexao->commitTransacao();

			$retorno->status = true;
			return $retorno;
		}
	}
?>
