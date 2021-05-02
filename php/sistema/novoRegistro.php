<?php
   include("../autenticacao/conexao.php");


  if(isset($_POST['inserirReg'])){
        $idreg = "0";
        $dsprocedimento = $_POST['procedimento'];
        $dtatendimento = $_POST['dtAtendimento'];
        $dtduracao = $_POST['duracao'];
        $nmfisioterapeuta = $_POST['fisioterapeuta'];
        $nmpaciente =  $_POST['paciente'];

        /*
        $query = "INSERT INTO 'registroatendimento'('nmfisioterapeura', 'nmpaciente', 'dtatendimento', 'dtduracao', 'dsprocedimento', 'vlreceber') VALUES ('$nmfisioterapeuta' ,'$nmpaciente','$dtatendimento','$dtduracao','$dsprocedimento','$vlreceber')";
        */


        $consultaValor = "SELECT valor_procedimento FROM procedimento WHERE nome_procedimento='procedimento' LIMIT 1";
        $con = $conn -> query($consultaValor) or die($conn ->error);

        $valorProc = $con -> fetch_array();
        $vlreceber = ($dtduracao * $valorProc) / 60;
        

        $query = "INSERT INTO `registroatendimento`(`idreg`, `nmfisioterapeura`, `nmpaciente`, `dtatendimento`, `dtduracao`, `dsprocedimento`, `vlreceber`) VALUES ('$idreg','$nmfisioterapeuta','$nmpaciente','$dtatendimento','$dtduracao','$dsprocedimento','$vlreceber')";

        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo '<script> alert("Atendimento salvo");</script>';
            header('location: http://127.0.0.1/AppAtendimentoFisioterapia2/index.php');
        }else{
           echo '<script> alert("Atendimento não salvo");</script>';
        }
    }
?>
