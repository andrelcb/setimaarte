<?php
// recuperar os valores de configuracao do arquivo config.php
require_once $_SERVER["DOCUMENT_ROOT"] . "/SetimaArte2/db.class.php";
$objDb = new db();
$link = $objDb->conecta_mysql();


if (isset($_GET['codigo'])) {
	$codigo = $_GET['codigo'];

	// criar o comando sql / query
	$sql = "update filmes set nome_filme ='" . $_POST['nome_filme'] . "',preco_sessao='" . $_POST['preco_sessao'] . "',classificacao='" . $_POST['classificacao'] . "',horario_filme='" . $_POST['horario_filme'] . "',cinema_idcinema='" . $_POST['cinema_idcinema'] . "',foto_filme='" . $_POST['foto_filme'] . "',opcao='" . $_POST['opcao'] . "' where idfilmes = " . $codigo;
	if (mysqli_query($link, $sql) == true) {
		echo
			"<script>   
			alert('Alteração realizado!');
			window.location.href='../index_restrito.php';
		</script>";
	} else {
		echo
			"<script>   
			alert('Erro ao alterar!');
			window.location.href='../index_restrito.php'; 
		</script>";
	}
}
