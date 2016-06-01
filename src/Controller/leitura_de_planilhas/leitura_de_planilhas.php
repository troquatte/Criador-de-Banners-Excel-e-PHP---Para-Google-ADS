<?php

class LeituraDePlanilhas extends LeituraDeArquivos
{
	//Cria o construtor com o caminho da Planilha
	public function __construct()
	{
		$this->CaminhoUpload = $this->hashIp();
		//Cria o construtor com o caminho fixo da Planilha
		$this->NomePlanilha = getcwd() . '/arquivos_upload/' . $this->CaminhoUpload . '/';
	}


	public function RetornoPlanilha()
	{
		$lituraPlan = $this->leituraPlanilha();

		//Essa Função retorna a planilha php em formato de array com todos os seus valores
		$objPHPExcel = PHPExcel_IOFactory::load($this->NomePlanilha . $lituraPlan['name']);

		//Carrega os valores do Excel em uma array
		$sheetData[] = $objPHPExcel->getActiveSheet()->toArray(true,true,true,false);
		
		//Retorna os valores do Excel em uma array
		return $sheetData;	
	}
}