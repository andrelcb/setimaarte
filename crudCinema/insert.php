<?php
header("Content-type:text/html; charset=utf-8");
require_once $_SERVER["DOCUMENT_ROOT"]."/SetimaArte2/db.class.php";
$objetobd = new db();
$link = $objetobd->conecta_mysql();



if(isset($_POST["nome_cinema"])&& isset($_POST["nome_shopping"])&& isset($_POST["email"])){	

$sql = "insert into cinema(nome_cinema,shopping_idshopping,email_cinema) values ('".$_POST['nome_cinema']."','".$_POST['nome_shopping']."','".$_POST['email']."')";
  
    if(mysqli_query($link, $sql)== true)
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
            alert('Erro ao cadastrar!')
            window.location.href='index.php' 
        </script>";
    }
}
else
{ 
    header("location:index.php");
}
?>
