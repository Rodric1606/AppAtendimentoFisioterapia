<?php 

include_once("conexao.php");

$nome_fisioterapeutas = filter_input(INPUT_POST, 'nome_fisioterapeutas', FILTER_SANITIZE_STRING);
$email_fisio = filter_input (INPUT_POST, 'email_fisio', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO fisioterapeuta (nome_fisioterapeutas, email_fisio, created) VALUES ('$nome_fisioterapeutas', '$email_fisio', NOW())";
$resultado_usuario = mysqli_query ($conn, $result_usuario);

if (mysqli_insert_id ($conn) ) {
	header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/sistema/fisioterapeuta.php");
}else{
	header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/index.php");


}

 ?>
