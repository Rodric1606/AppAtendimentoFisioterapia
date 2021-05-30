<?php

include_once 'conexao.php';

$npaciente=$_POST['nome_paciente'];

$sql="INSERT INTO paciente (nome_paciente) VALUES ('$npaciente')";
$res=mysqli_query($conn, $sql);
$linhas=mysqli_affected_rows($conn);

if (mysqli_insert_id($conn)) {

	$_SESSION ['msgcadPaciente'] = "<div class='alert-sucess'>Cadastro realizado com sucesso</div>";
    header ("location: http://127.0.0.1/AppAtendimentoFisioterapia/index.php");

}else{
	$_SESSION ['msgcadPaciente'] = "<div class='alert alert-danger'>Erro ao cadastrar</div>";
   
}

?>
