<?php
require_once 'config.php';
include 'validaLogin.php';
getHeader();
?>
<div class="container-fluid">
<div class="pt-5">
    <?php
        $acessos = Acesso::buscarTodos();
    ?>
    <div class="container-fluid mb-3" style="padding: 0px;">
        <div class="row">
          <div class="col-6">
            <span class="contador"><?php echo count($acessos);?> Acessos(s)</span>
            <a href="javascript:;" class="excluirTodos">Excluir Todos</a>
          </div>
          <div class="col-6 text-right pt-1">
                <a title="Atualizar Página" href="" class="btn btn-outline-primary btn-sm ml-2"><i class="fas fa-redo-alt"></i> Atualizar</a>
          </div>
        </div>
    </div>
    
    <table class="table">
        <thead>
          <tr>
            <th width="3%" class="center">ITEM</th>
            <th width="10%">IP</th>
            <th width="15%">Hash</th>
            <th width="12%">Data</th>
            <th width="5%">País</th>
            <th width="5%">Estado</th>
            <th width="9%">Cidade</th>
            <th width="28%">User Agent</th>
            <th width="5%">Device</th>
            <th width="8%" class="center">OPÇÕES</th>
          </tr>
        </thead>
        <tbody>

            <?php
                
                $contador = 1;
                foreach($acessos as $data):
                    $status = strtolower($data['status']);
            ?>
                <tr class="table-active <?php echo $status; ?>">
                    <td class="center"><?php echo $contador;?></td>
                    <td><?php echo $data['ip'];?></td>
                    <td><?php echo $data['hash'];?></td>
                    <td><?php echo \DateTime::createFromFormat("Y-m-d H-i-s", $data['data'])->format("d/m/Y H:i:s");?></td>
                    <td><?php echo $data['pais'];?></td>
                    <td><?php echo $data['uf'];?></td>
                    <td><?php echo $data['cidade'];?></td>
                    <td><?php echo $data['user_agent'];?></td>
                    <td><?php echo $data['device'];?></td>
                    <td class="center">
                    <div class="dropdown opcoes">
                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" onclick="return confirm('Você tem Certeza?')" href="do.php?action=APAGAR_ACESSO&id=<?php echo $data['id'];?>"><i class="fas fa-times"></i> Excluir</a>
                            <?php if($status == "bloqueado"): ?>
                                <a class="dropdown-item" onclick="return confirm('Você tem Certeza?')" href="do.php?action=ALTERAR_STATUS_ACESSO&id=<?php echo $data['id'];?>&status=LIBERADO"><i class="fas fa-unlock"></i> Desbloquear</a>
                            <?php else: ?>
                                <a class="dropdown-item" onclick="return confirm('Você tem Certeza?')" href="do.php?action=ALTERAR_STATUS_ACESSO&id=<?php echo $data['id'];?>&status=BLOQUEADO"><i class="fas fa-lock"></i> Bloquear</a>
                            <?php endif; ?>

                        </div>
                    </div>
                    </td>
                </tr>
            <?php
                $contador++;
                endforeach;
            ?>
       
        </tbody>
        
      </table>

</div>
</div>
<?php
getFooter(['js/acessos.js']);
?>