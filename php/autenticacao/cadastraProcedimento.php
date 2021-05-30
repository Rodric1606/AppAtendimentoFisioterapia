<?php
session_start();
ob_start();

include_once 'conexao.php';

$nprocedimento=$_POST['nome_procedimento'];
$vprocedimento=$_POST['valor_procedimento'];

$sql="INSERT INTO procedimento (nome_procedimento, valor_procedimento) VALUES ('$nprocedimento', '$vprocedimento')";
$res=mysqli_query($conn, $sql);
$linhas=mysqli_affected_rows($conn);

if (mysqli_insert_id($conn)) {
    $_SESSION ['msgcadproc'] = "<div class='alert-sucess'>Procedimento cadastrado com sucesso</div>";
    header ("location: http://127.0.0.1/AppAtendimentoFisioterapia/index.php");
}else{
    $_SESSION ['msgcadproc'] = "<div class='alert alert-danger'>Erro ao cadastrar procedimento</div>";
}


?>

<?php
