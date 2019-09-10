<?php
header("Content-type:text/html; charset=utf-8");
require_once $_SERVER["DOCUMENT_ROOT"]."/SetimaArte2/db.class.php";
$objetobd = new db();
$link = $objetobd->conecta_mysql();



if(isset($_POST['nome_usuario']) && isset($_POST['email']) && isset($_POST['senha']))
{
    $sql = "insert into usuario (idusuario, nome_usuario, email, senha) values (null, '".$_POST['nome_usuario']."', '".$_POST['email']."', '".$_POST['senha']."')";
    if(mysqli_query($link, $sql) == true)
    {
        echo "<script>";
        echo "alert('Cadastro realizado!')
				window.location.href='index.php'";
        echo "</script>";
    }
    else
    {
        echo 
        "<script>
            alert('Erro ao realizar o cadastro!');
			window.location.href='index.php';
        </script>";
    }
}
else
{
    header("location:index.php");
}










?>