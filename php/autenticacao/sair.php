<?php
session_start();
unset($_SESSION ['idusuario'], $_SESSION ['nome_usuario'], $_SESSION ['email']);

$_SESSION ['msg'] = "Deslogado com sucesso";
header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php");

?>