<?php
   

echo   $dsprocedimento = $_POST['procedimento'];
echo   $dtatendimento = $_POST['dtAtendimento'];
echo   $dtduracao = $_POST['duracao'];
echo   $nmfisioterapeuta = $_POST['fisioterapeuta'];
echo   $nmpaciente =  $_POST['paciente'];
echo   $vlreceber = '20.0';



$bd = mysqli_select_db($conn, 'registroatendimento');

  if(isset($_POST['inserirReg'])){
        $idreg = '';
        $dsprocedimento = $_POST['procedimento'];
        $dtatendimento = $_POST['dtAtendimento'];
        $dtduracao = $_POST['duracao'];
        $nmfisioterapeuta = $_POST['fisioterapeuta'];
        $nmpaciente =  $_POST['paciente'];
        $vlreceber = '20.00';

        $query = "INSERT INTO 'registroatendimento'('idreg', 'nmfisioterapeura', 'nmpaciente', 'dtatendimento', 'dtduracao', 'dsprocedimento', 'vlreceber') VALUES ('$idreg', '$nmfisioterapeuta' ,'$nmpaciente','$dtatendimento','$dtduracao','$dsprocedimento','$vlreceber')";

        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo '<script> alert("Atendimento salvo");</script>';
            header('location: http://127.0.0.1/AppAtendimentoFisioterapia2/index.php');
        }else{
            echo '<script> alert("Atendimento não salvo");</script>';
        }
    }
?>
