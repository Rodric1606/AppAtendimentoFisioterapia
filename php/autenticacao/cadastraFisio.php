<?php
session_start();
ob_start();
include_once 'conexao.php';

	$nomefisio = $_POST['nome_fisioterapeutas'];
	$emailfisio = $_POST['email_fisio'];


	$sql = "INSERT INTO fisioterapeuta (nome_fisioterapeutas, email_fisio, created) VALUES ('$nomefisio', '$emailfisio', NOW())";
	$res = mysqli_query($conn, $sql);
	$linhas = mysqli_affected_rows($conn);

if (mysqli_insert_id($conn)) {

	$_SESSION ['msgcadfisio'] = "<div class='alert-sucess'>Cadastro realizado com sucesso</div>";
    header ("location: http://127.0.0.1/AppAtendimentoFisioterapia/index.php");

}else{
	$_SESSION ['msgcadfisio'] = "<div class='alert alert-danger'>Erro ao cadastrar</div>";
   
}

?>
