<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if ($btnLogin) {
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if ((!empty($usuario)) AND (!empty($senha))) {
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuario no BD
		$result_usuario = "SELECT idusuario, nome_usuario, email, senha FROM usuarios WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario) {
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION ['idusuario'] = $row_usuario ['idusuario'];
				$_SESSION ['nome_usuario'] = $row_usuario ['nome_usuario'];
				$_SESSION ['email'] = $row_usuario ['email'];

				header("Location: http://127.0.0.1/AppAtendimentoFisioterapia2/index.php");

			}else{
				$_SESSION ['msg'] = "Login ou Senha incorreto!";
				header("Location: http://127.0.0.1/AppAtendimentoFisioterapia2/php/autenticacao/login.php");

			}
		}

		}else{
			$_SESSION ['msg'] = "Login ou Senha incorreto!";
			header("Location: http://127.0.0.1/AppAtendimentoFisioterapia2/php/autenticacao/login.php");
		}
}else{
	$_SESSION ['msg'] = "Página nome_usuario, email, senha não encontrada!";
			header("Location: http://127.0.0.1/AppAtendimentoFisioterapia2/php/autenticacao/login.php");
}