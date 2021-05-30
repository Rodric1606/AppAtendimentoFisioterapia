<?php
session_start();

    if(!empty($_SESSION ['idusuario'])) {

    }else{
        $_SESSION ['msg'] = "<div class='alert alert-danger'>Área restrita</div>";
        header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php");
    }
?>

<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand"></a>
    <button class="btn btn-outline-primary"> <a href="http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/sair.php" type="submit">Sair</a></button> 
</nav>

<?php
    include("../AppAtendimentoFisioterapia/php/autenticacao/conexao.php");
    $consultaReg = "select * from registroatendimento";
    $con = $conn -> query($consultaReg) or die($conn ->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../AppAtendimentoFisioterapia/bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <title>Atendimento</title>
</head>
    <body  style=" background-color: #DCDCDC">

        <?php
        if (isset($_SESSION ['msgcadfisio'])) {
            echo $_SESSION ['msgcadfisio'];
            unset($_SESSION ['msgcadfisio']);
        }

         if (isset($_SESSION ['msgcadproc'])) {
            echo $_SESSION ['msgcadproc'];
            unset($_SESSION ['msgcadproc']);
        }

        if (isset($_SESSION ['msgcadPaciente'])) {
            echo $_SESSION ['msgcadPaciente'];
            unset($_SESSION ['msgcadPaciente']);
        }

    ?>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid" style="background-color: #2F4F4F">
                    <a class="navbar-brand" href="#">  Atendimento Fisioterapia</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <!--<a class="nav-link active" aria-current="page" href="#">Home</a>-->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Administrativo</a>
                        </li>

                        <button style="background-color: #2F4F4F" type="button" class="btn btn-dark" data-toggle="modal" data-target="#addfisioModal">Fisioterapeuta</button>

                        <div id="addfisioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="addfisioModal">Cadastrar Fisioterapeuta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <form method="POST" action="http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/cadastraFisio.php">


                                    <div class="mb-3">
                                        <label class="form-label">Nome Fisioterapeuta</label>
                                        <input type="text" class="form-control" name="nome_fisioterapeutas" placeholder="Digite o nome completo da fisioterapeuta" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control" name="email_fisio" placeholder="Digite o e-mail da fisioterapeuta">
                                    </div>

                                     <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success mb-3" name="btnCadFisio" value="Cadastrar">Cadastrar</button>
                                    </div>

                                </form>

                              </div>
                            </div>
                          </div>
                        </div>

                        <button style="background-color: #2F4F4F" type="button" class="btn btn-dark" data-toggle="modal" data-target="#addProcedModal">Procedimento</button>

                        <div id="addProcedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="addProcedModal">Cadastrar Procedimento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <form method="POST" action="http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/cadastraProcedimento.php">
                                    

                                    <div class="mb-3">
                                        <label class="form-label">Nome Procedimento</label>
                                        <input type="text" class="form-control" name="nome_procedimento" placeholder="Digite o nome do procedimento" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Valor Procedimento</label>
                                        <input type="text" class="form-control" name="valor_procedimento" placeholder="Digite o valor/hora do procedimento" aria-describedby="emailHelp" >
                                    </div>

                                    <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success mb-3" name="btnCadFisio" value="Cadastrar">Cadastrar</button>
                                    </div>

                                </form>

                              </div>
                            </div>
                          </div>
                        </div>

                        <button style="background-color: #2F4F4F" type="button" class="btn btn-dark" data-toggle="modal" data-target="#addPacienteModal">Paciente</button>

                        <div id="addPacienteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="addPacienteModal">Cadastrar Paciente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <form method="POST" action="http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/cadastraPaciente.php">
                                    

                                    <div class="mb-3">
                                        <label class="form-label">Nome Paciente</label>
                                        <input type="text" class="form-control" name="nome_paciente" placeholder="Digite o nome do paciente" aria-describedby="emailHelp" >
                                    </div>
       
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-success mb-3" name="btnCadFisio" value="Cadastrar">Cadastrar</button>
                                    </div>

                                </form>

                              </div>
                            </div>
                          </div>
                        </div>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Relatório</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>-->
                    </ul>
                </div>
            </nav>
        </header>
        <section>  
             <div class="btnReg">                        
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#novoRegistro" style="float: right; margin:20px 20px 0px 20px">Adicionar atendimento</button>

            </div>                       
        </section> 
        <section style="margin: 100px 50px">
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Fisioterapeuta</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Data</th> 
                                <th scope="col">Duração (minutos)</th>
                                <th scope="col">Procedimento</th>
                                <th scope="col">valor a receber</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($registro = $con ->fetch_array()){ ?>
                                    <tr>
                                        <td><?php echo $registro["nmfisioterapeura"];?></td>
                                        <td><?php echo $registro["nmpaciente"];?></td>
                                        <td><?php echo date("d/m/Y", strtotime($registro["dtatendimento"]));?></td>
                                        <td style="text-align:center;"><?php echo $registro['dtduracao'];?></td>
                                        <td><?php echo $registro["dsprocedimento"];?></td>
                                        <td style="text-align:center;"><?php echo $registro["vlreceber"];?></td>
                                        <td>
                                            <img class="icon" src="../AppAtendimentoFisioterapia/img/pencil.svg" alt="">
                                            <img class="icon" src="../AppAtendimentoFisioterapia/img/trash.svg" alt="">
                                        </td>
                                    </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
        </section>
        <section>
        <!-- Modal -->
            <div class="modal fade" id="novoRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar novo atendimento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="http://127.0.0.1/AppAtendimentoFisioterapia/php/sistema/novoRegistro.php" method="POST">
                        <div class="modal-body">       
                        <div class="col-sm mb-3">           
                            <label  class="form-label">Fisioterapeuta</label>
                            <?php
 
                                $conTerap = "select * From fisioterapeuta";
                                $sqlTerap = $conn -> query($conTerap) or die($conn ->error);
                            ?>
                                    <select name="fisioterapeuta" class="form-select" aria-label="Default select example">
                                            <option selected>Selecione uma opção...</option>
                                        <?php while($terapeuta = $sqlTerap -> fetch_array()){ ?>
                                            <option value="<?php echo $terapeuta["nome_fisioterapeutas"];?>"><?php echo $terapeuta["nome_fisioterapeutas"];?></option>
                                        <?php }?>    
                                    </select>   
                        </div>     
                        <div class="mb-3">
                            <?php
                                $conPacie = "select * from paciente";
                                $sqlPacie = $conn -> query($conPacie) or die($conn ->error);
                            ?>
                            <label  class="form-label">Paciente</label>
                            <select name="paciente" class="form-select" aria-label="Default select example">
                                    <option selected>Selecione uma opção...</option>
                                <?php while($paciente = $sqlPacie -> fetch_array()){ ?>
                                    <option value="<?php echo $paciente["nome_paciente"];?>"><?php echo $paciente["nome_paciente"];?></option>    
                                <?php } ?>    
                            
                            </select>
                        </div>

                        <div class="col-sm mb-3">
                            <label for="exampleInputPassword1" class="form-label">Data do atendimento</label>
                            <input name="dtAtendimento" type="date" class="form-control" placeholder="Date" aria-label="State">
                        </div>

                        <div class="col-sm mb-3">
                            <label  class="form-label">Duração (minutos)</label>
                            <input name="duracao" type="number" class="form-control" aria-label="time">
                        </div>

                        <div class="col-sm mb-3">
                            <?php
                                $conProc = "Select * From procedimento";
                                $sqlProc = $conn -> query($conProc) or die ($conn -> error);
                            ?>
                            <label class="form-label">Procedimento</label>
                            <select name="procedimento"  class="form-select" aria-label="Default select example">
                                    <option selected>Selecione uma opção...</option>
                                <?php while($procedimento = $sqlProc -> fetch_array()){ ?>
                                    <option value="<?php echo $procedimento["nome_procedimento"];?>"><?php echo $procedimento['nome_procedimento']?></option>
                                    <?php }?>
                            </select>
                        </div>  
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="inserirReg"class="btn btn-primary">Salvar atendimento</button>
                        </div>



                    </form>
                    </div>
                </div>
            </div>
        </section>


     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>                                 
     <script src="../AppAtendimentoFisioterapia/bootstrap/bootstrap.min.js"></script>

                             

    </body>
</html>