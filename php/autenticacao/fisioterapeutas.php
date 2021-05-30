<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <title>Cadastro Fisioterapeuta</title>
</head>
<body>

     <?php
        if (isset($_SESSION ['msgcadfisio'])) {
            echo $_SESSION ['msgcadfisio'];
            unset($_SESSION ['msgcadfisio']);
        }

    ?>

<main class="card container-fluid btn-sm" style="max-width: 25rem;">
            <!--<img. src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
                <h5 class="card-title">CADASTRAR FISIOTERAPEUTA</h5>
    <form method="POST" action="cadastraFisio.php">

        <div class="mb-3">
            <label class="form-label">Nome Fisioterapeuta</label>
            <input type="text" class="form-control" name="nome_fisioterapeutas" placeholder="Digite o nome da fisioterapeuta" aria-describedby="emailHelp" >
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
</main>
</body>
</html>