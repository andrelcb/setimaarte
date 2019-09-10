<?php
header("Content-type:text/html; charset=utf-8");

require_once('../db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();



if(isset($_POST["nome_filme"])&& isset($_POST["preco_sessao"])&& isset($_POST["classificacao"])&& isset($_POST["horario_filme"])&& isset($_POST["cinema"])&& isset($_POST["foto_filme"])&& isset($_POST["opcao"])){

			

$sql = "insert into filmes  (idfilmes,nome_filme,preco_sessao,classificacao,horario_filme,cinema_idcinema,foto_filme,opcao) values (null,'".$_POST['nome_filme']."','".$_POST['preco_sessao']."','".$_POST['classificacao']."',str_to_date('".$_POST['horario_filme']."','%d/%m/%Y' '%H:%i:%s'),'".$_POST['cinema']."','".$_POST['foto_filme']."','".$_POST['opcao']."')";
		//die($sql);
					
		if(mysqli_query($link, $sql)== true){
			

			echo 			
			"<script>   
				alert('Cadastro realizado!');
				window.location.href='../index_restrito.php';
			</script>";
		}else

		{
			echo 			
			"<script>   
				alert('Erro ao cadastrar!');
				window.location.href='../index_restrito.php'; 
			</script>";
		}
	

	}
	
	else{ 
		header("location:../index_restrito.php");
	}






?>

?>



 