<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/SetimaArte2/listar.php";

// variavel para receber o resultado do select do arquivo select.php

$dadosAlterar = listarFilmeCodigo( $_GET['codigo'] );  
$dados = listarCinemas();

//testar se a super global session foi sessioanda
if(!isset($_SESSION['email'])){
    header('location: index.php');
}

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
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">


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
                <form class="form-inline">
                    <ul class="navbar-nav mr-right">
                        <li class="nav-item">
                            <a style="" class="nav-link mr-right" href="../sair.php">Sair<span class="sr-only">(current)</span></a>
                        </li>                   
                    </ul>
                </form>
            </nav>      
        </main>
                <!-- bootstrap - link Pasta -->
       <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>


<div  style="margin-top: 10px;" class="container">
    <div>
        <form action="update.php?codigo=<?php echo $dadosAlterar['idfilmes'] ?>" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome Filme</label>
                        <input type="text" class="form-control" name="nome_filme" value="<?php echo $dadosAlterar['nome_filme'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Classificação</label>
                        <input type="number" class="form-control" name="classificacao" value="<?php echo $dadosAlterar['classificacao']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Cinema</label>
                        <select class="form-control" name="cinema_idcinema" id="">
                        <?php
                            foreach ($dados as $cinemas) 
                            {                                               
                        ?>
                                <option value="<?php echo $cinemas['idcinema'] ?>" selected="<?php echo $dadosAlterar['nome_cinema'] ?>" ><?php echo $cinemas['nome_cinema'] ?></option>
                        <?php 
                            }
                            ?>
                        </select>                                  
                    </div>

                    <div class="form-group">
                        <label>Preço</label>
                        <input type="number" class="form-control" name="preco_sessao" value="<?php echo $dadosAlterar['preco_sessao']; ?>" required>
                    </div>
                    <div class="form-group ">
                         <button style="max-width: 40%; margin-left: 60px;" type="submit" class="btn btn-primary btn-block">Alterar</button>
                    </div>  
                </div> 
                <div class="col-md-6">
                <label>Horario</label>                                    
                    <div class="form-group">
                        <input type="datetime" class="form-control" name="horario_filme"  value="<?php echo $dadosAlterar['horario_filme']; ?>"required>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>     
                        <input type="file" class="form-control" name="foto_filme" value="<?php  echo $dadosAlterar['foto_filme']; ?>" required>
                    </div>
                    
                    <?php
                        $checked3D ='';
                        $checked2D ='';
                        if($dadosAlterar['opcao'] == '3D')
                        {
                            $checked3D = 'checked';
                        }
                        else if( $dadosAlterar['opcao']== '2D')
                        {
                            $checked2D = 'checked';
                        }
                    ?>
                    <div class="custom-control custom-radio">
                        <label>Opção</label>     
                        <input type="radio" id="3D" value="3D" class="custom-control-input" name="opcao" <?php echo $checked3D ?> required>
                        <label class="custom-control-label" for="3D">3D</label>                            
                    </div>

                    <div class="custom-control custom-radio">
                        <label>Opção</label>  
                        <input type="radio" id="2D" value="2D" class="custom-control-input" name="opcao" <?php echo $checked2D ?> required>
                        <label class="custom-control-label" for="2D">2D</label>                            
                    </div>

                    <div style="margin-top:95px;"  class="form-group">
                        <a href="../index_restrito" class="btn btn-secondary" style="max-width: 40%; margin-left: 60px;">Voltar</a>                                                  
                     </div>   
                 </div>
                </div>
            </div> 
        </form>
    </div>
</div>
        <!-- bootstrap - link Pasta -->
       <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>