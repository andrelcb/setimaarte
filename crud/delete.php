<?php 
header("Content-type:text/html; charset=utf-8");

require_once('../db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

if(isset($_GET['codigo']) ){


		$sql = "delete from filmes where idfilmes = ".$_GET['codigo'].";";
		
		
	
		if(mysqli_query($link, $sql)== true){
			echo 			
			"<script>   
				alert('Filme excluído com sucesso!');
				window.location.href='../index_restrito.php';
			</script>";
		}else{ 
			echo 			
			"<script>   
				alert('Erro ao excluir o filme!');
				window.location.href='../index_restrito.php';
			</script>";
		}
	

	}

	else{ 
		header("location:../index_restrito.php");
	}






?>




 