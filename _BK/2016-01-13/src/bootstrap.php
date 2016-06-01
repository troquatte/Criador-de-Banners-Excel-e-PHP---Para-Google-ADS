<?php 

//Chama o Controller de Leitura de Planilha
include(getcwd() . '/Controller/LeituraDePlanilhas/LeituraDePlanilhas.php');
//Chama o Controller de Texto Imagens
include(getcwd() . '/Controller/TextoImages/TextoImages.php');
//Chama o Controller de Criação de Pasta
include(getcwd() . '/Controller/CriaPastas/CriaPastas.php');
//Chama o Vendor PHP excel
include(getcwd() . '/../vendor/autoload.php');


DEFINE('DS', DIRECTORY_SEPARATOR);

//Faz a leitura da Planilha e cria a Pasta para Download
$CriaPasta  = new CriaPasta();
$CriaPasta->CriaPastaCampanha();

//Faz a leitura da Planilha e cria as imagens dentro da pasta Download
$CriaImagem = new TextoImages();
$CriaImagem->RetornaImagem();