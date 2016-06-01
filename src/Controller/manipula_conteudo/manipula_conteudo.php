<?php

class ManipulaConteudo extends LeituraDeArquivos
{

	public function __construct()
	{
		//Nome do zip para download
		$this->nomePasta = '/banners.zip';
	}

	public function ZiparBanners()
	{
	//Diretorio para zipar os arquivos
	$dir = getcwd() . '/../download/'. $this->hashIp() . '/';

		//Classe do Zip
		$zip = new ZipArchive();

		//Abre o zip
		if($zip->open($dir . 'banner.zip', ZIPARCHIVE::CREATE) == TRUE)
		{
			//Spl Iterator Directory. Verifica todos os arquivos da pasta
	        $it = new directoryIterator($dir);
	        //Mostra todos os arquivos
	        while( $it->valid())
	        {
	            /*** Retira os dots (. ..) ***/
	            if( !$it->isDot() )
	            {
	            	//Zipa Tudo
	            	$zip->addFile($dir.$it->current(),$it->current());
	            }
	            /*** Vai para o proximo elemento ***/
	            $it->next();
	        }
	       $zip->close();

		}

	}

	public function CookieDownload()
	{
		// Retorna $this->hashIp();
		echo $this->hashIp();
	}

	public function ApagaArquivos()
	{
		//Cria o construtor com o caminho fixo da Planilha
		//$this->NomePlanilha = getcwd() . '/arquivos_upload/' . $this->hashIp() . '/';
		$source = getcwd() . '/arquivos_upload/' . $this->hashIp();
		if($objs = glob($source."/*")){
			foreach($objs as $obj) {

				@is_dir($obj);
				@unlink($obj);

			}
		}
	}	
}