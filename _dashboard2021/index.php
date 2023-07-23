<?php
require_once 'config.php';

if(isset($_POST['usuario']) && strlen($_POST['usuario']) > 0 && isset($_POST['senha']) && strlen($_POST['senha']) > 0){

    $usuarioInfomado = $_POST['usuario'];
    $senhaInformada = $_POST['senha'];

    $usuario = new Usuario();

    if($usuario->autenticar($usuarioInfomado, $senhaInformada)) {
        $token = random(30);


        $sessaoId = Sessao::registrarSessao($usuario->getUsuario(),$token);
        if($sessaoId) {
            $_SESSION['token'] = $token;
            $_SESSION['usuario'] = $usuario->getUsuario();
            $_SESSION['sessaoId'] = $sessaoId;
            header("Location: lista.php");
         }
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"></link>
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        
        <a class="navbar-brand" href="#"><img width="200" src="images/logo.png"></a>
        
    </div>
</nav>
<div class="container-fluid">
<div class="row pt-5">
    <div class="col-md-4 mx-auto">
        <div class="card rounded-0">

            <div class="card-header">
                <h3 class="mb-0">Login</h3>
            </div>

            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Usuário</label>
                        <input type="text" id="usuario" name="usuario" class="form-control rounded-0" formControlName="usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="senha" name="senha" class="form-control rounded-0" formControlName="senha">
                    </div>
                    <button type="submit" class="btn btn-success float-right">Login</button>
                </form>

            </div>

        </div>
    </div>
</div>
</div>


</body>
</html>