<?php
header("Content-Type:text/html;charset=utf8");
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/SetimaArte2/listar.php";

$dadosCinema = listarCinemas();
$dados = listar_filmes();  

//testar se a super global session foi sessioanda
if(!isset($_SESSION['email'])){
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Area Restrita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>

  <!-- viewport responsivo - link cdn -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <!-- MASCARA JQUERY -->   
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>

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
        <a class="navbar-brand h1 mb-0" href="index_restrito.php"><span style="color: red;">Setima</span>Arte</span></a>

            <!-- Botao para abrir modal -->
        <form class="form-inline">
            <button style="position: relative; right: 30px; color:white;" type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg" type="button">Cadastrar Filme</button>
            <div class="dropdown">
                <button style="position: relative; right: 20px;" class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu de Cadastro
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="crudShopping/index.php">Cadastrar Shopping</a>
                    <a class="dropdown-item" href="crudCinema/index.php">Cadastrar Cinema</a>
                    <a class="btn btn-primary dropdown-item"href="crudUsuario/index.php" >Cadastrar Usuario</a>               
                </div>
            </div>
        <ul class="navbar-nav mr-right">
            <li class="nav-item">
                <a style="" class="nav-link mr-right" href="sair.php">Sair<span class="sr-only">(current)</span></a>
            </li>                   
        </ul>
        </form>


            <!-- MODAL PARA CADASTRAR FILMES-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="color: red;" class="modal-title" id="Login">Inserir Novo Filme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="crud/insert.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome Filme</label>
                                <input type="text" class="form-control" name="nome_filme" placeholder="Digite o nome do filme" required>
                            </div>

                            <div class="form-group">
                                <label>Classificação</label>
                                <input type="number" class="form-control" name="classificacao" placeholder="Digite a classificação do filme" required>
                            </div>

                            <div class="form-group">
                                <label>Cinema</label>
                                <select class="form-control" name="cinema" id="">
                                <?php
                                    foreach ($dadosCinema as $cinemas) 
                                    {                                               
                                ?>
                                        <option value="<?php echo $cinemas['idcinema'] ?>"><?php echo $cinemas['nome_cinema'] ?></option>
                                <?php 
                                    }
                                    ?>
                                </select>                                  
                            </div>

                            <div class="form-group">
                                <label>Preço</label>
                                <input type="number" step="0.05" class="form-control " id="preco" name="preco_sessao" placeholder="Digite o preço" required>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <label>Horario</label>                                    
                            <div class="form-group">
                                <input type="datetime" class="form-control" name="horario_filme" placeholder="Digite o Horario do filme" required>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>     
                                <input type="file" class="form-control" name="foto_filme" placeholder="Foto" required>
                            </div>

                            <div class="custom-control custom-radio">
                            <label>Opção</label>     
                                <input type="radio" id="3D" value="3D" class="custom-control-input" name="opcao" required>
                                <label class="custom-control-label" for="3D">3D</label>                            
                            </div>

                            <div class="custom-control custom-radio">
                            <label>Opção</label>  
                                <input type="radio" id="2D" value="2D" class="custom-control-input" name="opcao" required>
                                <label class="custom-control-label" for="2D">2D</label>                            
                            </div>

                            
                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <button style="max-width: 80%; margin-left: 60px;" type="submit" class="btn btn-primary btn-block">Inserir</button>
                        <button style="max-width: 80%; margin-left: 60px;" type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Sair</button>
                    </div>                                                     
                </form>
            </div>
            </div>
            </div>
        </div>

       
    </nav>      
</main>

<div  style ="margin-top: 20px;" class="container">
    <table class="table table-striped table-bordered table-hover" id="tabela">
        <thead>
            <tr style="background-color:red;">
                <th style="color:white;">FILMES</th>
                <th style="color:white;">NOME</th>
                <th style="color:white;">CLASSIFCAÇÃO</th>
                <th style="color:white;">CINEMA</th>
                <th style="color:white;">PREÇO</th>
                <th style="color:white;">OPÇÃO</th>
                <th style="color:white;">EDITAR</th>
             
            </tr>
        </thead>

        <tbody>
            <?php if($dados) : ?>

            <!-- utilizar o foreach para percorrer todos os dados -->	
            <?php foreach($dados as $filmes)  : ?>
            <tr style="background-color: white;">
                <td><img src="imagens/<?php echo $filmes['foto_filme']; ?>" class="rounded" width="75" height="75" ></td>

                <td><?php echo $filmes['nome_filme']; ?></td>
                <td><?php echo $filmes['classificacao']; ?></td>
                <td><?php echo $filmes['nome_cinema']; ?></td>
                <td><?php echo $filmes['preco_sessao']; ?></td>
                <td><?php echo $filmes['opcao']; ?></td>

                <td>
                    <a href="crud/editar.php?codigo=<?php echo $filmes['idfilmes']; ?>" class="btn btn-success">Alterar</a>
                    <a href="crud/delete.php?codigo=<?php echo $filmes['idfilmes']; ?>" class="btn btn-danger">Excluir</a>            				
                </td>
            </tr>
            <!-- fim do laco foreach -->
            <?php endforeach;?>
            <!-- se a variavel dados nao retornou valores -->
			<?php else : ?>
			 <tr>
			 <!-- imprimir mensagem na tela -->
			<td colspan="7">Nenhum registro encontrado.</td>
			 </tr>
            <!-- fim do laco if -->
            <?php endif; ?>
        </tbody>
    </table>
<div>

        <!-- bootstrap - link Pasta -->
       <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>