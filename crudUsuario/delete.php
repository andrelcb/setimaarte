<?php 
header("Content-type:text/html; charset=utf-8");

require_once('../db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

if(isset($_GET['codigo']) ){


		$sql = "delete from usuario where idusuario = ".$_GET['codigo'].";";
		
		
	
		if(mysqli_query($link, $sql)== true){
			echo 			
			"<script>   
				alert('Usuário excluído com sucesso!');
				window.location.href='index.php';
			</script>";
		}else{ 
			echo 			
			"<script>   
				alert('Erro ao excluir o usuário!');
				window.location.href='index.php';
			</script>";
		}
	

	}

	else{ 
		header("location:index.php");
	}






?>




 ?>