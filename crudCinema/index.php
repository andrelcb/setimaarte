<?php
header("Content-Type:text/html;charset=utf8");
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/SetimaArte2/listar.php";

$dados = listarCinemas();
$dadosShopping = listarShopping();


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
    <title>Cadastrar Shopping</title>
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
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- css - link Pasta -->
    <link href="../css/estilo.css" type="text/css" rel="stylesheet">

    <!-- js - link Pasta -->
    <script language="JavaScript" src="..js/script.js"></script>

    <!-- bootstrap - link Pasta -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <main>
    <!--Barra de navegação -->
        <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand h1 mb-0" href="../index_restrito.php"><span style="color: red;">Setima</span>Arte</span></a>

            <!-- Botao para abrir modal -->
        <form class="form-inline">
            <button style="position: relative; right: 30px; color:white;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#CadastrarShopping" type="button">Cadastrar Cinema</button>
            <div class="dropdown">
                <button style="position: relative; right: 20px;" class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu de Cadastro
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="../crudShopping/index.php" >Cadastrar Shopping</a>               
                    <a class="btn btn-primary dropdown-item"href="../crudUsuario/index.php">Cadastrar Usuario</a>
                    <a class="btn btn-primary dropdown-item" href="../index_restrito.php">Cadastrar Filme</a>
                </div>
            </div>
        <ul class="navbar-nav mr-right">
            <li class="nav-item">
                <a style="" class="nav-link mr-right" href="../sair.php">Sair<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        </form>
        <div class="modal fade" id="CadastrarShopping" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 style="color: red;" class="modal-title" id="Login">Cadastrar Cinema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="insert.php" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" name="nome_cinema" placeholder="Digite o nome do cinema" required>
                    </div>

                    <div class="form-group">
                       <select class="form-control" name="nome_shopping" id="">
                        <?php
                            foreach($dadosShopping as $shopping)
                            {
                        ?>
                            <option value="<?php echo $shopping['idshopping']?>"><?php echo $shopping['nome_shopping']?></option>
                        <?php
                            }
                        ?>
                       </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Digite o emal" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Sair</button>
                    </div>                                                       
                </form>                     
            </div>                  
        </div>

    </nav>      
</main>

<div  style ="margin-top: 20px;" class="container">
    <table class="table table-striped table-bordered table-hover" id="tabela">
        <thead>
            <tr style="background-color:red;">
                <th style="color:white;">CINEMA</th>
                <th style="color:white;">SHOPPING</th>
                <th style="color:white;">EMAIL</th>
                <th style="color:white;">EDITAR</th>
            </tr>
        </thead>

        <tbody>
            <?php if($dados) : ?>

            <!-- utilizar o foreach para percorrer todos os dados -->	
            <?php foreach($dados as $cinema)  : ?>
            <tr style="background-color: white;">
                <td><?php echo $cinema['nome_cinema']; ?></td>
                <td><?php echo $cinema['nome_shopping']; ?></td>
                <td><?php echo $cinema['email_cinema']; ?></td>

                <td>
                    <a href="delete.php?codigo=<?php echo $cinema['idcinema']; ?>" class="btn btn-danger">Excluir</a>            				
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
</body>
</html>