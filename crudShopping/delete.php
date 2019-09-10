<?php 
header("Content-type:text/html; charset=utf-8");

require_once('../db.class.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

if(isset($_GET['codigo']) ){


		$sql = "delete from shopping where idshopping = ".$_GET['codigo'].";";
		
		
	
		if(mysqli_query($link, $sql)== true){
			echo 			
			"<script>   
				alert('Shopping excluído com sucesso!');
				window.location.href='index.php';
			</script>";
		}else{ 
			echo 			
			"<script>   
				alert('Erro ao excluir o shopping!');
				window.location.href='index.php';
			</script>";
		}
	

	}

	else{ 
		header("location:index.php");
	}






?>




 ?>