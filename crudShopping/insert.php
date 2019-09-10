<?php
header("Content-type:text/html; charset=utf-8");
require_once $_SERVER["DOCUMENT_ROOT"]."/SetimaArte2/db.class.php";
$objetobd = new db();
$link = $objetobd->conecta_mysql();



if(isset($_POST["nome_shopping"])&& isset($_POST["endereco"])&& isset($_POST["telefone"])){

			

$sql = "insert into shopping(idshopping,nome_shopping,endereco,tel_fixo) values (null,'".$_POST['nome_shopping']."','".$_POST['endereco']."','".$_POST['telefone']."')";
        
//die($sql);
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
