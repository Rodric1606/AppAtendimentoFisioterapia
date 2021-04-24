<<?php 

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO terapeutas (nome_terapeuta, email, created) VALUES ('$nome', '$email', NOW())";
$resultado_usuario = mysqli_query ($conn, $result_usuario);

if (mysqli_insert_id ($conn) ) {
	header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php");
}else{
	header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php");


}

 ?>
