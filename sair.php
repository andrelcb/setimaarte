<?php
session_start();

//matar sessão
session_destroy();
unset($_SESSION['email']);
header("location:index.php")
?>