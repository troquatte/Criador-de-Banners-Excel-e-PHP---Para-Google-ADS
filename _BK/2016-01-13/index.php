<?php require_once('src/constants.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Gerador de Banner - Marketing online</title>
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
      <span class="mdl-layout-title">Gerador de Banners</span>
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

  					<div class="mdl-card__supporting-text">
					   	Abra a Pasta > <?php echo __DIR__ . DIRECTORY_SEPARATOR . "download" . DS;?> 
					</div>
				</div>
			  	<!-- Final Card Sucess-->

		  		<!-- Card Error-->
		  		<div class="mdl-cell--12-col mdl-shadow mdl-shadow--3dp msg-error" id="geradorbanner-error"> 
			  		<div class="mdl-card__title" >
					   <i class="material-icons">error</i> <h2 class="mdl-card__title-text">Opss!!!</h2>
					</div>
					<div class="mdl-card__supporting-text">
					   	Ocorreu um erro, tente novamente ou entre em contato com a equipe de desenvolvimento! 
					</div>

  					<div class="mdl-card__actions mdl-card--border">
				    	<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="mailto:design@decolar.com?subject=Erro no sistema de Banner!">
				      		Enviar e-mail
				    	</a>
				  	</div>
				</div>
			  	<!-- Final Card Error-->


			  	<!-- Card -->
		  		<div class="mdl-cell--12-col mdl-shadow mdl-shadow--3dp"> 
		  		  <div class="mdl-card__title">
				    <h2 class="mdl-card__title-text">Gerador de Banners</h2>
				  </div>
				  <div class="mdl-card__supporting-text">
				    Sistema gerador de banners Marketing Decolar.com
				  </div>

				</div>
			  	<!-- Final Card -->

			  	<!-- Form -->
		      	<form method="POST">
			
					<input type="button" value="Gerar Banners" class="mdl-cell mdl-cell--12-col mdl-button mdl-button--raised  mdl-button--accent" id="GeradorDeImagem">
				
				</form>
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
					   <!-- Passo 1 -->
					   <p>
					   	<strong>1-</strong> Abra a Pasta -> <?php echo __DIR__ ?>	
					   </p>

					   <!-- Passo 2 -->
					   <p>
					   	<strong>2-</strong> 
					   	Procure a pasta " images " e insira os modelos de banners
					   	enviados pelos Designers.
					   </p>

					   <!-- Passo 3-->
					   <p>
					   	<strong>3-</strong> 
					   	Abra a pasta -> " <?php echo __DIR__ . DS . "src" . DS . "planilhas" . DS ?> ".
					   </p>

					   <!-- Passo 4-->
					   <p>
					   	<strong>4-</strong> 
					   	Abra a planilha, teremos 3 opções de valores:

						   	<ul>
							   	<li>Destino</li>
							   	<li>Moeda</li>
							   	<li>Preço</li>
						   	</ul>
						
						<p>
					   		Insiras os valores correspondentes a baixo das opções.
					   
					   		<img src="front-end/images/planilha.jpg" alt="" width="">
					   	</p>

					   	<p>
					   		Salve e Feche a planilha.
					   	</p>
					   </p>

					   <!-- Passo 5-->
					   <p>
					   	<strong>5-</strong> 
					   	Clique no botão Gerar Banners, aguarde...
					   	<img src="front-end/images/btn-gerar-banners.jpg" alt="" >
					   	<p>
					   		Assim que que aparecer a mensagem:
					   		<img src="front-end/images/banners-gerado-sucesso.jpg" alt="" >
					   	</p>
					   	
					   	<p>
						   	Abra a pasta -> " <?php echo __DIR__ . DS . "download" . DS ?> " e pronto!
						</p>
						
						<p>
						   	Banners Gerados com sucesso!
						</p>
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

		$('#GeradorDeImagem').on('click', function(){

			var criarImagens = $.ajax( "src/bootstrap.php" );
			$('#geradorbanner').css({'display':'block'});

			//Deu Ruim
			criarImagens.fail(function() {
				$('#geradorbanner-error').css({'display':'block'});
			});

			//Completo
			criarImagens.always(function() {
			  $('#geradorbanner').css({'display':'none'});
			  $('#geradorbanner-success').css({'display':'block'});
			});
		})

</script>
</body>
</html>