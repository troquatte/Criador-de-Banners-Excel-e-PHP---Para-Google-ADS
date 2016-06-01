<?php

class CriaPasta extends LeituraDePlanilhas 
{
	public function CriaPastaCampanha()
	{	
		//Essa função cria pastas com o nome do destino que é a array [0]
		//Verifica todos as regiões e cria a pasta

		//Faz a leitura da Planilha
		$LeituraDePlanilhas[] = $this->RetornoPlanilha();
		$iterator = new RecursiveArrayIterator($LeituraDePlanilhas);

		$iterator = $iterator->getChildren();
		if(!is_dir(getcwd() . "/../download/" . $this->CaminhoUpload)){
			//Cria a pasta com o nome da campanha
		    mkdir(getcwd() . "/../download/" . $this->CaminhoUpload, 0777);
		    chmod(getcwd() . "/../download/" . $this->CaminhoUpload, 0777);
		}

			//Foreach de toda a Tabela retornando chave e valor
			foreach ($iterator as $key => $value) {
				//Foreach de toda a Tabela retornando Linha e Coluna
				foreach ($value as $linha => $coluna) {
					//Pergunta se o caminho da pasta é = o campo do destino
					// && e se é diferente da linha 1 o Excel

					if(!file_exists(getcwd() . "/download/" . $coluna[0]) && $linha !== 0){

						//*****
				    	//Temos um pequeno problema com o a celula vazia ela retorna bool(true)
				        //E sempre cria uma pasta com o valor 1
				        //Antes de criar perguntamos se value é diferente de bool(true)
				        //*****
						if($coluna !== true){
				        	//*****
				        	//Procura se dentro da pasta ../downloads/ o destino X
				        	//Se não existir ela cria uma pasta
				        	//*****
				        	if(!is_dir($coluna[0]))
					      	{
					        	//$nomePasta é = o nome do destino
					        	//mb_convert_encoding converte caracteres especiais que vem no AUTO
					        	//e Converte em ISO-8859-1
					        	$nomePasta = utf8_decode($coluna[0]);
					        	if(!is_dir(getcwd() . "/../download/" . $this->hashIp)){
						        	//Cria a pasta com o nome da campanha
						        	//mkdir(getcwd() . "/../download/" . $this->hashIp, 0777);
					        	}
					        	//Final IF
					        }
					        //Final IF
				        }
						//Final IF
				  	}
				   	//Final IF
				}
				//Final Foreach
			}
			//Final Foreach
	}
	//Final public function CriaPastaCampanha()
}