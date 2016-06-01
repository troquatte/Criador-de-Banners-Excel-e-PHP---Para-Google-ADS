<?php 
header('Content-Type: text/html; charset=utf-8');
	//Chamada classe de config Url
	require_once('src/config_dir_and_url.php'); 
	//Chamada classe de config Url
	require_once('src/constants.php'); 
	
	//Vars Link Url
	$link = new dir_and_url();
	
	//Link URL Banner Zip 
	//Caminho Alterado /ArquivosUpload/download/
	//$link->_URL('banner.zip'); 
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Gerador de Banner - Display / Capa</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="front-end/css/material.indigo-pink.min.css">
	<script src="front-end/js/material.min.js"></script>
	
	<link rel="stylesheet" href="front-end/css/icon.css">
	<link rel="stylesheet" type="text/css" href="front-end/css/layout.css"> 
</head>
<body>

<div class="modal" id="geradorbanner">
		<div class="page-content">
			<div class="mdl-grid">
			  <div class="mdl-cell mdl-cell--3-col"></div>
			  
			  <div class="mdl-cell mdl-cell--6-col">
				
				<div class="mdl-cell--12-col mdl-shadow--2dp" style="background:#FFF">
				  <div class="mdl-card__title">
				    <h2 class="mdl-card__title-text">Carregando...</h2>
				  </div>
				  
				  <div class="mdl-card__supporting-text">
				    <div  class="mdl-cell mdl-progress mdl-cell--12-col mdl-js-progress mdl-progress__indeterminate" ></div>
				  </div>
				
				</div>
		
			  </div>

			  <div class="mdl-cell mdl-cell--3-col"></div>
			</div>
		</div>
</div>

<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Gerador de Banner - Display / Capa</span>
    </div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Banners</a>
      <a href="#fixed-tab-2" class="mdl-layout__tab">Como usar?</a>
    </div>
  </header>

  <main class="mdl-layout__content">
    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
      <div class="page-content">
      	<div class="mdl-grid">
		  <div class="mdl-cell mdl-cell--3-col"></div>
		  	<div class="mdl-cell mdl-cell--6-col">
		  		
		  		<!-- Card Sucess-->
		  		<div class="mdl-cell--12-col mdl-shadow mdl-shadow--3dp msg-success" id="geradorbanner-success"> 
		  		  	<div class="mdl-card__title" >
				    	<i class="material-icons">check_circle</i> <h2 class="mdl-card__title-text">Banners Gerados com Sucesso!</h2>
				 	</div>

  					<div class="mdl-card__actions mdl-card--border">
				    	<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="linkDownloadZip" href="#">
				      		Download
				    	</a>
				  	</div>
				</div>
			  	<!-- Final Card Sucess-->

		  		<!-- Card Error-->
		  		<div class="mdl-cell--12-col mdl-shadow mdl-shadow--3dp msg-error" id="geradorbanner-error"> 
			  		<div class="mdl-card__title" >
					   <i class="material-icons">error</i> <h2 class="mdl-card__title-text">Opss!!!</h2>
					</div>
					<div class="mdl-card__supporting-text" id="NomeDoErro">
					   	 
					</div>

  					<div class="mdl-card__actions mdl-card--border">
				    	<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="mailto:design@decolar.com?subject=Erro no sistema de Banner!">
				      		Enviar e-mail
				    	</a>
				  	</div>
				</div>
			  	<!-- Final Card Error-->


			  	<!-- Card -->
		  		<div class="mdl-cell--12-col mdl-shadow mdl-shadow--3dp" id="chamadaInicio"> 
		  		  <div class="mdl-card__title">
				    <h2 class="mdl-card__title-text">Gerador de Banner - Display / Capa</h2>
				  </div>
				  <div class="mdl-card__supporting-text">
				    Sistema gerador de banners Marketing Decolar.com
				  </div>

				</div>
			  	<!-- Final Card -->

			  	<!-- Form -->
			  	<div class="mdl-cell--12-col mdl-shadow mdl-shadow--3dp"> 
			      	<form method="POST" enctype="multipart/form-data" id="GeradorDeImagem" action="src/bootstrap.php" style="padding:25px 0; margin-top:10px">
						<label for="Excel" class="mdl-cell mdl-cell--12-col">Upload da Planilha</label>
						<input type="file" name="Excel" id="Excel" class="mdl-cell mdl-cell--12-col mdl-button mdl-button--raised  mdl-button--colored" required>
						
						<label for="Zip" class="mdl-cell mdl-cell--12-col">Upload do Zip</label>
						<input type="file" name="Zip" id="Zip" class="mdl-cell mdl-cell--12-col mdl-button mdl-button--raised  mdl-button--colored" required>
						
						<input type="submit" value="Gerar Banners" class="mdl-cell mdl-cell--12-col mdl-button mdl-button--raised  mdl-button--accent" >
					
					</form>
				</div>
			  	<!-- Final Form -->
		  	</div>
		  <div class="mdl-cell mdl-cell--3-col"></div>
		</div>
      </div>
    </section>

    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content">
		
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--3-col"></div>

		  		<!-- Card Error-->
		  		<div class="mdl-cell--6-col mdl-shadow mdl-shadow--3dp"> 
			  		<div class="mdl-card__title" >
					   <h2 class="mdl-card__title-text">Passo a Passo</h2>
					</div>
					<div class="mdl-card__supporting-text">
					   <!-- Download arquivos -->
					   <p>
					   	<strong>Download arquivos</strong><br>
					   	<a href="front-end/downloadArquivos/config.zip">
					   		Config.zip
					   	</a>
						<br>
					   	<a href="front-end/downloadArquivos/modelo-planilha.xlsx">
					   		Modelo-Planilha.xlsx
					   	</a>
						<br>
					   	<a href="front-end/downloadArquivos/modelo-banners.ai">
					   		Modelo-Banners.ai
					   	</a>
					   </p>

					   <!-- Passo 1 -->
					   <p>
					   	<strong>Saiba como gerar os banners!</strong><br>
					   	Temos 3 arquivos para download:<br>
					   	<a href="front-end/downloadArquivos/config.zip">
					   		---- Config.zip<br>
					   	</a>
					   	--Config.zip é a pasta de configuração dos banners, composto por 3 pastas:<br>
					   	--Font ( fonte utilizada no projeto );<br>
					   	--Images ( contém os modelos de banners = layout );<br>
					   	--Json ( configuração dos banners  ).

					   	<br><br>
					   	<a href="front-end/downloadArquivos/modelo-planilha.xlsx">
						   	---- modelo-planilha.xlsx<br>
						</a>
					   	-- Arquivo modelo para trabalhar com destinos, moeda e valor (Marketing).

					   	<br><br>
					   	<a href="front-end/downloadArquivos/modelo-banners.ai">
					   		---- modelo-banners.ai<br>
					   	</a>
					   	-- Arquivo modelo para trabalhar o layout dos banners (Designers).
					   </p>

					   <!-- Passo 2 -->
					   <p>
					   	<strong>Designers</strong> <br>
					   	Assim que os modelos de banners estiverem prontos exporte-os como TamanhoDaImagem.png (exp.: 200x200.png) .<br>
					   	Abra o config.zip e na pasta --Images insira os novos banners.<br>
					   	Envie a pasta config.zip para o responsável.
					   </p>

					   <!-- Passo 3 -->
					   <p>
					   	<strong>Marketing</strong> <br>
					   	Assim que estiver configurado config.zip faça o upload dos arquivos:<br>
					   	-- Planilha.xlsx<br>
					   	-- Config.zip
					   	<br><br>

					   	Se estiver tudo ok aparecera uma mensagem de sucesso com botão para download.
					   	<img src="front-end/images/banner-gerado-sucesso.jpg" alt="">
					   </p>

					  
					</div>

  					<div class="mdl-card__actions mdl-card--border">
				    	<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="mailto:design@decolar.com?subject=Dúvidas!">
				      		Dúvidas? Envie um e-mail para equipe!
				    	</a>
				  	</div>
				</div>
			  	<!-- Final Card Error-->

			<div class="mdl-cell mdl-cell--3-col"></div>
		</div>

      </div>
    </section>

  </main>
</div>


<script type="text/javascript" src="front-end/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
		//**Envio de arquivos Upload
		$('#GeradorDeImagem').on('submit', function(e) {
    		//Faz a ação = Envia sem sair da Página
    		e.preventDefault();

    		if($('#Excel').val() && $('#Zip').val() ){
    			//Mostra Gerador de Banner
	    		$('#geradorbanner').css({'display':'block'});	
    		} 
    		
    		//Retira mensagem Inicio Gerador de Banners
    		$('#chamadaInicio').css({'display':'none'});

    		//Variavel Ajax
			var ajax = $.ajax({
				type: 'POST', // Tipo de envio = POST
			    url: 'src/bootstrap.php', //Link de envio
			    cache: false,	// Cache
			    data: new FormData(this), // FormData para envio de arquvos
			    contentType: false,
			    processData: false
			});

			//Como usamos ajax com php não tem erro é apenas sucesso
			//Trate o erro com a Mensagem
			ajax.success(function(data) {
		        //Pergunta se Data é verdadeiro se tem algum valor
		        //Nesse caso mostra se tem algum erro
		        if(data.length === 32){
		        	$('#linkDownloadZip').attr("href", "http://backoffice.despegar.com/backoffice/jarvis/gerador-banner-marketing/download/" + data + "/banner.zip");
					//mensagem Feito
			 		$('#geradorbanner-success').css({'display':'block'});
					//Mostra opção de Erro
					$('#geradorbanner-error').css({'display':'none'});
					//Some com o Load depois da Execução Total do Job
					$('#geradorbanner').fadeOut('slow');
				}else{

			 		//Retira Gerador de Banner
    				$('#geradorbanner').css({'display':'none'});

					//Mostra opção de Erro
					$('#geradorbanner-error').css({'display':'block'});
    				
		        	if($('#NomeDoErro').html(data) == null){
		        		$('#NomeDoErro').html('Ocorreu um erro, tente novamente ou entre em contato com a equipe de desenvolvimento! ');
		        	}
				}
			});
		})

</script>
</body>
</html>