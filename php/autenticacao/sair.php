<?php
session_start();
unset($_SESSION ['idusuario'], $_SESSION ['nome_usuario'], $_SESSION ['email']);

$_SESSION ['msg'] = "<div class='alert alert-success'>Deslogado com sucesso</div>";
header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php");

?>