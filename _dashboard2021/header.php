<?php
require_once 'config.php';
$totalAcessos = Acesso::total();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{TITLE}}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="css/all.css"></link>
    <link rel="stylesheet" href="css/custom.css"></link>
    <!--INCLUDE CSS-->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        
        <a class="navbar-brand" href="#"><img width="200" src="images/logo.png"></a>
        
        
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="acessos.php">Acessos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="infos.php">Infos</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link"  href="do.php?action=SAIR_SESSAO&id=<?php echo $_SESSION['sessaoId'];?>">Sair</a>
            </li>
        </ul>
       
    </div>
</nav>
