<?php
//Classe de Exception
class CampoVazio extends Exception { }

class LeituraDeArquivos
{

	//Classe HashIp: Verifica se tem permissão de uso
	public function hashIp()
	{
	
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		      $ip_user = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		      $ip_user = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		      $ip_user = $_SERVER['REMOTE_ADDR'];
		}

		$regiaoDoPc = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		
		$md5 = md5($regiaoDoPc[0] . $ip_user);

		return $md5;

		//$chaveSeguranca = 'banners';
		//return $chaveSeguranca; //Retorna valor correto
	}

	public function upload($queryFile)
	{
		//Classe de Upload
		//Faz o Upload dos arquivos
		@$upload = $_FILES[$queryFile];
		//MimeType Excel e zip
		$queryTypeXlsx = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
		$queryTypeZip  = 'application/octet-stream';

		//Valor nome do Usuário
		$hashIp = $this->hashIp(); 
		//Faz upload na pasta do  usuário logado
		$uploadDir	= getcwd() . '/arquivos_upload/'. $hashIp . '/';

		//Verifica o Tipo de arquivo
		if(!empty($upload["type"])){
			//Upload Xlsx, Xls e Zip
			if($upload["type"] === $queryTypeXlsx || $upload["type"] === $queryTypeZip){
				//Cria uma pasta com o nome do usuário Logado 
				if(!is_dir(getcwd() . '/arquivos_upload/'. $hashIp)){
					mkdir(getcwd() . "/arquivos_upload/" . $hashIp, 0777);
					chmod(getcwd() . "/arquivos_upload/" . $hashIp, 0777);
				}
				//Move os arquivos para a pasta do usuário 
				$uploadName	= getcwd() . '/arquivos_upload/'. $hashIp . '/' . basename($upload['name']);
				move_uploaded_file($upload['tmp_name'], $uploadName);

				//Retorna os valores do Upload
				$retorno = $upload;
			}else{
				throw new ArquivoInvalido('Erro: Arquivo invalido = ' . $upload['name']); //Erro do arquivo Invalido 
			}
		}else{
			throw new CampoVazio('Campo vazio = ' . $queryFile); // Erro do campo vazio
		}
		return $retorno; //retorna o valor do Upload
	}

	public function leituraPlanilha(){
		//Upload da planilha
		$leituraPlanilha = $this->upload('Excel');
		//MimeTipe
		$queryTypeXlsx = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
		//Faz a leitura do aqrquivo da planilha para upload e pasta
		if($leituraPlanilha["type"] !== $queryTypeXlsx){
			throw new ExcelInvalido('Erro: Não é um arquivo Excel = ' . $leituraPlanilha["name"]); // Manda o erro se não for excel
		}

		//Retorna a planilha 
		return $leituraPlanilha;
	}

	public function leituraZip(){
		//Faz o upload do arquivo
		$leituraZip = $this->upload('Zip');
		
		//Upload Zip, se for zip ele descompacta ou da Erro!
		$hashIp = $this->hashIp(); 
		$uploadDir	= getcwd() . '/arquivos_upload/'. $hashIp . '/';
				
		// Criando o objeto
		$zip = new ZipArchive();

		// Abrindo o arquivo para leitura/escrita
		$abriu = $zip->open($uploadDir . $leituraZip["name"]);
		
		//Tipo de arquivo
		$queryTypeZip  = 'application/octet-stream';

		if($leituraZip["type"] === "application/octet-stream"){
			if($abriu === true) {

				// Extraindo todo conteudo no diretorio "/home/rubens/"
				$zip->extractTo($uploadDir);

				// Fechando o arquivo
				$zip->close();

			} else {
				//Erro(2) Não é um arquivo ZIp 
			    throw new ZipInvalido('Erro (2): Não é um arquivo Zip = ' . $leituraZip["name"]); //Erro se n~~ao for um Zip
			}
		}else{
			//Erro(2) MIMETYPE
			throw new ZipInvalido('Erro(1): Não é um arquivo Zip = ' . $leituraZip["name"]); //Erro se n~~ao for um Zip
		}
	}
	
	public function deletabanners()
	{
		//Cria o construtor com o caminho fixo da Planilha
		//$this->NomePlanilha = getcwd() . '/arquivos_upload/' . $this->hashIp() . '/';
		$source = getcwd() . '/../download/' . $this->hashIp();
		if($objs = glob($source."/*")){
			foreach($objs as $obj) {

				@is_dir($obj);
				@unlink($obj);

			}
		}
	}

}