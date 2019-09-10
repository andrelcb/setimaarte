<?php
session_start();

//conexao com banco de dados
require_once('db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

//recuperando valores da variaveis.

if(isset($_POST['senha']) && isset($_POST['email']))
{
    $email = $_POST['email'];
    $senha = $_POST['senha'];

        $sql = "SELECT *
                  FROM usuario 
                 WHERE email = '".$email."' 
                   AND senha = '".$senha."'; ";

        $resultado_sql = $link->query($sql);


        //testa se a query foi executada corretamente
        if($dados_usuarios = mysqli_fetch_assoc($resultado_sql))            
        {   

            $_SESSION['email'] = $dados_usuarios['email'];
            header('location: index_restrito.php');
              
        }
        else
        {
            header("location:index.php");
            echo 'Erro na execucação do banco de dados, por favor informar ao adminstrador';
        }
       
}
else
{
    $_SESSION['mensagem'] = "E-mail ou senha incorretos!!";
    header("location:index.php");

    
}

?>