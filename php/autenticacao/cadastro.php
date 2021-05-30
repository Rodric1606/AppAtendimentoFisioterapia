<?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if ($btnCadUsuario) {
    include_once 'conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

    $result_usuario = "INSERT INTO usuarios (nome_usuario, email, usuario, senha) VALUES (
                    '" .$dados['nome_usuario']. "',
                    '" .$dados['email']. "',
                    '" .$dados['usuario']. "',
                    '" .$dados['senha']. "'
                    )";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_insert_id($conn)) {
        $_SESSION ['msgcad'] = "<div class='alert alert-success'>Usuário cadastrado com sucesso</div>";
        header ("Location: http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php");

    }else{
        $_SESSION ['msgcad'] = "<div class='alert alert-danger'>Erro ao cadastrar o usuário</div>";

    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <title>Cadastrar</title>
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

    ?>

<main class="card container-fluid btn-sm" style="max-width: 25rem;">
            <!--<img. src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
                <h5 class="card-title">CADASTRAR</h5>
    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome_usuario" placeholder="Digite o seu nome completo" aria-describedby="emailHelp" >
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="text" class="form-control" name="email" placeholder="Digite o seu e-mail">
        </div>
        <div class="mb-3">
            <label class="form-label">Usuário</label>
            <input type="text" class="form-control" name="usuario" placeholder="Digite o seu usuário">
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Digite a senha">
        </div>
        <div class="d-grid gap-2">
        <button type="submit" class="btn btn-success mb-3" name="btnCadUsuario" value="Cadastrar">Cadastrar</button>
        </div>

        <h6>Lembrou? <a href="http://127.0.0.1/AppAtendimentoFisioterapia/php/autenticacao/login.php" style="color: #00FFFF;">Clique aqui</a> para logar</h6>
    </form>
        </div>
</main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body> 
</html>