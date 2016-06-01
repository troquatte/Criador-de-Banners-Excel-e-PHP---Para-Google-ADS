<?php 

//Chama o Controller de Leitura de Arquivos
include(getcwd() . '/controller/leitura_de_arquivos/leitura_de_arquivos.php');
//Chama o Controller de Leitura de Planilha
include(getcwd() . '/controller/leitura_de_planilhas/leitura_de_planilhas.php');
//Chama o Controller de Texto Imagens
include(getcwd() . '/controller/texto_images/texto_images.php');
//Chama o Controller de Criação de Pasta
include(getcwd() . '/controller/cria_pastas/cria_pastas.php');
//Chama o Controller que apaga Pasta
include(getcwd() . '/controller/manipula_conteudo/manipula_conteudo.php');
//Chama o Vendor PHP excel
include(getcwd() . '/../vendor/autoload.php');

//Faz o upload do zip e da planilha
//leituraZip() = Upload e Leitura do Zip
// leituraPlanilha() = Upload da Planilha


// try(tentar)
try {
	//Faz o upload do zip e da planilha
	//LeituraZip() = Upload e Leitura do Zip
	//LeituraPlanilha() = Upload da Planilha
	$leituraArquivos = new LeituraDeArquivos();
	$leituraArquivos->deletaBanners();
	$leituraArquivos->hashIp();
	$leituraArquivos->leituraPlanilha();
	$leituraArquivos->leituraZip();
	//Faz a leitura da Planilha e cria a Pasta para Download
	$CriaPasta = new CriaPasta();
	$CriaPasta->CriaPastaCampanha();
	//Faz a leitura da Planilha e cria as imagens dentro da pasta Download
	$CriaImagem = new TextoImages();
	$CriaImagem->RetornaImagem();
	//Apaga Conteúdo da Pasta
	$ManipulaConteudo = new ManipulaConteudo();
	$ManipulaConteudo->ApagaArquivos();
	$ManipulaConteudo->CookieDownload();
	$ManipulaConteudo->ZiparBanners();
}catch(CampoVazio $e){
	echo $e->getMessage();
}catch(ArquivoInvalido $e){
	echo $e->getMessage();
}catch(ZipInvalido $e){
	echo $e->getMessage();
}catch(ExcelInvalido $e){
	echo $e->getMessage();
}catch(UsuarioInvalido $e){
	echo $e->getMessage();
}