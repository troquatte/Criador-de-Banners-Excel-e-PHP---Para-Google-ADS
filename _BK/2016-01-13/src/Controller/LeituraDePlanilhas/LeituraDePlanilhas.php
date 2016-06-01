<?php

class LeituraDePlanilhas
{
	//Cria o construtor com o caminho da Planilha
	public function __construct()
	{
		//Cria o construtor com o caminho fixo da Planilha
		$this->NomePlanilha = getcwd() . '/Planilhas';
	}

	public function RetornoPlanilha()
	{
		//Essa Função retorna a planilha php em formato de array com todos os seus valores

		//Busca planilha na Pasta
		$iterator = new directoryIterator($this->NomePlanilha);
		
		//Cria foreach dos arquivos da pasta
		foreach ($iterator as $plailhas) {
			//Retira os pontos que vem na array
			if(!$plailhas->isDot()){
				//Pega o nome de cada arquivo .xlsx
				$inputFileName = $plailhas->getBasename(); 
				//Utiliza a Função do PHP Excel
				//Carrega a planilha do Excel
				$objPHPExcel = PHPExcel_IOFactory::load(getcwd() . "/Planilhas/" . $inputFileName);
				//Carrega os valores do Excel em uma array
				$sheetData[] = $objPHPExcel->getActiveSheet()->toArray(true,true,true,false);
			} 
				
		}
		//Retorna os valores do Excel em uma array
		return $sheetData;
	}
}