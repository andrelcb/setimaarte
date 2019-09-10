<?php
    session_start();
	header("Content-Type:text/html;charset=utf8");	
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Sétima Arte</title>
        <link rel="icon" type="imagem/png" href="imagens/icon.png"/>
		
        <!-- viewport responsivo - link cdn -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

		<!-- bootstrap - link Pasta -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

        <!-- css - link Pasta -->
        <link href="css/estilo.css" type="text/css" rel="stylesheet">

        <!-- js - link Pasta -->
        <script language="JavaScript" src="js/script.js"></script>   

	</head>

	<body>
        <main>
        <!--Barra de navegação -->
             <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand h1 mb-0" href="index.php"><span style="color: red;">Setima</span>Arte</span></a>

                <!-- Botao para abrir modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Acesso Restrito
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Login">Acesso Restrito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="validar_login.php" method="post">

                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Digite seu email" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Fechar</button>
                            </div>

                            <?php  if(!empty($_SESSION['mensagem'])) : ?>
                                <strong><?php echo $_SESSION['mensagem']; ?></strong>
                            <?php endif; ?>                                                          
                        </form>
                        </div>                        
                    </div                  
                </div>
            </div>  
            </nav>          

            <!--Barra efeito-->
             <nav class="navbar fixed-top navbar-dark bg-dark" id="navbar">
                    <a class="navbar-brand h1 mb-0" href="index.php"><span style="color: red;">S</span>A</span></a>
            </nav>


            

    	    <div class="container" id="campo_pesquisa">

                    <form  id="formPesquisa">
                        <!-- os campo registros_por_pagina e offset atualmente estão escondidos (hidden)
                        mas sua visualização pode ser ativida no formulário trocando o type de hidden para text -->
                        <input type="hidden" name="registros_por_pagina" id="registros_por_pagina" value="10" />
                        <input type="hidden" name="offset" id="offset" value="0" />

                        <div id="conjunto">
                            <div class="input-group mb-3" id="div_procurar">
                                <input type="search" class="form-control" id="procurar" name="filme" placeholder="Ex: Capitao America" required>
                            
                            <div class="input-group-append">
                                <button class="btn btn-primary form-btn" id="btn_pesquisar">Buscar
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

    		</div>

            <br><br>
            <div  class="container" id="conteudo_filme">
                <div type="hidden" class="row">
                    <div class="col-md-12 col-lg-12">
                        <div id="div_resultado_paginacao"></div>
                    </div>
                </div>  
            </div>
    </main>
        <!-- bootstrap - link Pasta -->
	   <script src="bootstrap/js/bootstrap.min.js"></script>
	
	</body>
</html>