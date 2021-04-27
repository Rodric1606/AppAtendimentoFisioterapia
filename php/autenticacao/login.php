<!--
REGRAS DE LOGIN E LOGOUT
TELA DE LOGIN


---------------------------------------->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        
        .card {
            background-color: #2F4F4F;
        }

        body {
            background-color: #B0E0E6;

        }

        h5, label {
            color: #FFEBCD;
        }

        h6 {
            color: #FFEBCD;
            text-align: center; 
        }

     </style>
</head>
<body>
    
    <?php
        if (isset($_SESSION ['msg'])) {
            echo $_SESSION ['msg'];
            unset($_SESSION ['msg']);
        }

        if (isset($_SESSION ['msgcad'])) {
            echo $_SESSION ['msgcad'];
            unset($_SESSION ['msgcad']);
        }

    ?>

<section class="card container-fluid btn-sm" style="max-width: 25rem;">
      <!--<img src="..." class="card-img-top" alt="..."> -->
    <div class="card-body">
        <h5 class="card-title">LOGIN</h5>    
    <form method="POST" action="http://127.0.0.1/AppAtendimentoFisioterapia2/php/autenticacao/valida.php">
          <div class="mb-3">
            <label class="form-label">Usuário</label>
            <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha">
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success mb-3" name="btnLogin" value="Acessar">Acessar</button>
          </div>

            <h6>Ainda não tem acesso?
                <a href="http://127.0.0.1/AppAtendimentoFisioterapia2/php/autenticacao/cadastro.php" style="color:  #00FFFF">Cadastre-se</a></h6>
    </form>
        </div>

    </form>
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body> 
</html>