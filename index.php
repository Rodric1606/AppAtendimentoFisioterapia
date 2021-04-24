
<?php
session_start();
    if(!empty($_SESSION ['idusuario'])) {
        echo "Olá ".$_SESSION ['nome_usuario'].", Bem vindo "." <a href='http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/sair.php'>Sair</a>";
    }else{
        $_SESSION ['msg'] = "Área restrita";
        header("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php");
    }
?>

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
    <title>Atendimento</title>
</head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">  Atendimento Fisioterapia      </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Relatório</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastro
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Fisioterapeuta</a></li>
                                <li><a class="dropdown-item" href="#">Procedimento</a></li>
                                <li><a class="dropdown-item" href="#">Paciente</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <section>  
             <div class="btnReg">                        
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoRegistro" style="float: right; margin:20px 20px 0px 20px">Adicionar atendimento</button>
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
                                <th scope="col">Duração sessão</th>
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
                                        <td><?php echo $registro["dtduracao"];?></td>
                                        <td><?php echo $registro["dsprocedimento"];?></td>
                                        <td><?php echo $registro["vlreceber"];?></td>
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
                            <label for="exampleDataList" class="form-label">Fisioterapeuta</label>
                            <input name="fisioterapeuta" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                            <datalist id="datalistOptions">
                                <option value="Rodrigo Cardozo">
                                <option value="Gabriel Borges Cardozo">
                                <option value="Diego Cruz">
                            </datalist>
                        </div>     


                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nome do Paciente</label>
                            <input name="paciente" type="input" class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="col-sm mb-3">
                            <label for="exampleInputPassword1" class="form-label">Data do atendimento</label>
                            <input name="dtAtendimento" type="date" class="form-control" placeholder="Date" aria-label="State">
                        </div>

                        <div class="col-sm mb-3">
                            <label for="exampleInputPassword1" class="form-label">Duração da sessão</label>
                            <input name="duracao" type="time" class="form-control" placeholder="time" aria-label="time">
                        </div>
                        <div class="col-sm mb-3">           
                            <label for="exampleDataList" class="form-label">Procedimento</label>
                            <input name="procedimento" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                            <datalist id="datalistOptions">
                                <option value="Procedimento 1">
                                <option value="Procedimento 2">
                                <option value="Procedimento 3">
                            </datalist>
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