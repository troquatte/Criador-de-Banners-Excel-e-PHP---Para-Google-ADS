<?php

class TextoImages extends LeituraDePlanilhas
{	

	private function tiraCaracteresEspeciais( $string ) {
	    $string = preg_replace("/[áàâãä]/", "a", $string);
	    $string = preg_replace("/[ÁÀÂÃÄ]/", "A", $string);
	    $string = preg_replace("/[éèê]/", "e", $string);
	    $string = preg_replace("/[ÉÈÊ]/", "E", $string);
	    $string = preg_replace("/[íì]/", "i", $string);
	    $string = preg_replace("/[ÍÌ]/", "I", $string);
	    $string = preg_replace("/[óòôõö]/", "o", $string);
	    $string = preg_replace("/[ÓÒÔÕÖ]/", "O", $string);
	    $string = preg_replace("/[úùü]/", "u", $string);
	    $string = preg_replace("/[ÚÙÜ]/", "U", $string);
	    $string = preg_replace("/ç/", "c", $string);
	    $string = preg_replace("/Ç/", "C", $string);
	    $string = preg_replace("/[][><}{)(:;,!?*%~^`&#@]/", "", $string);
	    $string = preg_replace("/ /", "_", $string);
	    return $string;	
	}

	//Classe Privada - chama configuração de layout
	//Cores = RGB e Fonte = Arial
	private function ConfigJsonLayout()
	{
		//Chama o arquivo configTexto.json
		$arquivoConfig	= $this->NomePlanilha . 'json/configTexto.json';
		//Copia todo o conteúdo do json em uma string
		$informacaoJson = file_get_contents($arquivoConfig);
		//Converte o json em array
		$leitura 		= json_decode($informacaoJson, true);
		//retorna o array ['config']
		return $leitura["config"]; 
	}

	//Class Privada - chama toda a configuração do banner
	//Tamanhos, posições, etc.
	private function ConfigJsonTexto()
	{
		//Chama o arquivo config.json
		$arquivoConfig	= $this->NomePlanilha . 'json/config.json';
		//Copia Todo o conteúdo do json em uma string
		$informacaoJson = file_get_contents($arquivoConfig);
		//Converte o json em aray
		$leitura 		= json_decode($informacaoJson, true);
		//retorna o array ['config']
		return $leitura["config"]; 
	}

	//Retorna o texto da planilha
	public function RetornaTexto()
	{	
		//retorna os valores da Planilha
		//Da Classe LeituraDePlanilhas -> $this->RetornoPlanilha()
		$Planilha[] = $this->RetornoPlanilha();

		//Chama o RecursiveArrayIterator para eliminar 1 foreach
		$iterator = new RecursiveArrayIterator($Planilha);
		//Chama os filhos do array assim ajudando eliminar 1 foreach
		$iterator = $iterator->getChildren();
		//retorna o array com os valores dos textos
		return $Planilha = $iterator;	
	}

	public function RetornaImagem()
	{
		//Chama o Metodo RetornaTexto
		//Com os valores das planilhas
		$ValoresPlanilha = $this->RetornaTexto();

		//chama o metodo ConfigJsonTexto() para retornar as configurações
		//Retorna em array
		$config = $this->ConfigJsonTexto();

		//Foreach de toda a Tabela retornando chave e valor
		foreach ($ValoresPlanilha as $key => $value) {
				
				//Foreach de toda a Tabela retornando Linha e Coluna
				foreach ($value as $linha => $coluna) {
					//Pergunta se a linha é diferente que 0
					//Seria a primeira linha com titulos, etc
					
					if($linha !== 0){
						//Valor da configuração do metodo ConfigJsonTexto()
						//Lembrando eliminou a linha 0
						$destino		= $coluna[0];
						$moeda			= $coluna[1];
						$valor			= $coluna[2];

						//Configuração Valor Json -> ConfigJsonLayout
						$configConfigJsonLayout 	= $this->ConfigJsonLayout();
						$configEstilo				= "style";
						$configCaminhoPastaFont		= $configConfigJsonLayout['layoutTexto'][0][$configEstilo][0];
						$configCorTexto				= $configConfigJsonLayout['layoutTexto'][0][$configEstilo][0];
						//Roda o arquivo de configuração para puxar todas as posições, cores etc
					
						foreach ($config as $tamanhoImagens => $value) {

							//$configTexto, $configMoeda e $configValor 
							//Puxamos os valores da array de cada tamanho
							$configTexto = $value[0]["texto"][0];
							$configMoeda = $value[0]["moeda"][0];
							$configValor = $value[0]["valor"][0];
							
							//Puxa imagens da Pasta com Nome da Campanha e Tamanho da Imagem
							$caminhoPastaImagem = $this->NomePlanilha . "images/" . $tamanhoImagens . ".png";

								//Pergunta se tem a imagem dentro da pasta, partindo das variaveis $destino e $tamanhoImavem
								//Se existir ela vai começar a criação
								if(file_exists($caminhoPastaImagem)){

									//Cria uma imagem aparir da imagem existente
									$imagem = imagecreatefrompng($caminhoPastaImagem);

									//Insere a Fonte / Arial
									$font = $this->NomePlanilha . "font/" . $configCaminhoPastaFont["fonte"];
									
									//Cor do Texto
									$corTexto = imagecolorallocate( $imagem, $configCorTexto["r"],$configCorTexto["g"],$configCorTexto["b"]);
									// Formatação de Quebra de Linha
									$texto = wordwrap($destino, $configTexto["quebraDeLinha"], PHP_EOL);
									//Criação da Imagem
									
									imagettftext($imagem, $configTexto["tamanho"], $configTexto["angulo"], $configTexto["positionX"], $configTexto["positionY"], $corTexto, $font, $texto);
									imagettftext($imagem, $configMoeda["tamanho"], $configMoeda["angulo"], $configMoeda["positionX"], $configMoeda["positionY"], $corTexto, $font, $moeda);
									imagettftext($imagem, $configValor["tamanho"], $configValor["angulo"], $configValor["positionX"], $configValor["positionY"], $corTexto, $font, $valor);
									// Salva a Imagem na Pasta com o nome da campanha
									imagepng($imagem, getcwd() . "/../download/" . $this->CaminhoUpload . "/" . $this->tiraCaracteresEspeciais($destino) . "-" . $tamanhoImagens . ".png");
									//imagepng($imagem,  getcwd() . "/../download/" . $this->CaminhoUpload . '/' . $destino . "/" . $destino . "-" . $tamanhoImagens . ".png");
								}
								// Final If Exsists
						}
						//Final foreach
					}
					//Final if
				}
				//Final foreach
		}
		//Final foreach
	}
	//Final RetornaImagem
}
