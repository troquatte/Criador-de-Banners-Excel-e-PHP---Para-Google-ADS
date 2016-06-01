<?php

class dir_and_url
{

## VARIAVÉIS #########################
public	$_DIR,
		$_URL;
## VARIAVÉIS fim #####################


	public function __construct()
	{

		$init_path = 'JARVIS/banner-footer'; // deixar null/false quando for subir no servidor
		$this->_DIR($init_path);
		$this->_URL($init_path);

	}



###  DIRETORIO DO ARQUIVO ############
	public function _DIR($PATH=null, $ROOT=null)
	{
		
		if(empty($ROOT)) $ROOT = $this->TOGGLE_STRIPE($_SERVER['CONTEXT_DOCUMENT_ROOT']);
		
		if(!empty($PATH))
		{
			$PATH = $this->TOGGLE_STRIPE($PATH);
		}else
		{
			$PATH = '';	
		}


		return $this->_DIR = $ROOT . $PATH;
	}









###  URL DO ARQUIVO ############
	public function _URL($PATH=null, $URL='http://backoffice.despegar.com/backoffice/jarvis/gerador-banner-marketing/download/banners/')
	{
		
		if(!empty($PATH)) 
			{
				$PATH;
			}else
			{
				$PATH = '';
			};

		 return $this->_URL = $URL . $PATH;
	}








### ADD_BAR  => /      ####################
	function TOGGLE_STRIPE($url=null, $type=2) // $type =>   1 = first     2= last     3= first + last
{
		$result=null;


	// caso não tenha $path
		if($type === 1){
			$filter = substr($url,  0, - (strlen($url)-1));
			$result = $filter == '/' || $filter == '\\' ? $url : '/' . $url;

			//reomover barra do final -- caso tenha
			$filter2 = substr($result,  (strlen($result)-1));
			if($filter2 == '/' || $filter2 == '\\') $result = substr($result,  0, (strlen($result)-1));



		}elseif($type === 2){
			$filter = substr($url,  (strlen($url)-1));
			$result = $filter == '/' || $filter == '\\' ? $url : $url . '/';


						// remover barra do inicio -- caso tenha
			$filter2 = substr($result,  0, - (strlen($result)-1));
			if($filter2 == '/' || $filter2 == '\\') $result = substr($result, 1,  ( strlen($result) ) );


		}elseif($type === 3){
			$filter =  add_bar($url, 1);
			return add_bar($filter, 2);
		}

		return $result;
}

}