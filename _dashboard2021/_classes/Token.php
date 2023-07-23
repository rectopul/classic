<?php

class Token extends Objeto {

    protected $tabela = "token";

    protected $id;

    protected $infoId;

    protected $data;

    protected $posicao;

    protected $valor;


    public function salvar() {

        $sql = "INSERT INTO {$this->tabela} (infoId, data, posicao, valor) VALUES (:infoId, :data, :posicao, :valor)";
        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(':infoId', $this->infoId);
            $query->bindParam(':data', $this->data);
            $query->bindParam(':posicao', $this->posicao);
            $query->bindParam(':valor', $this->valor);
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

    public static function findByInfoId($id){

      $sql = "SELECT * FROM token where infoId = :id order by id desc";
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

      $sql = "select acessos.hash as hash, acessos.ip as ip, acessos.data as data, acessos.status as status, acessos.pais as pais, acessos.uf as uf ,acessos.cidade as cidade, acessos.user_agent as user_agent, acessos.url as url, acessos.referrer_url as referrer_url, acessos.device as device, Infos.* from infos inner join acessos on acessos.id = infos.idAcesso order by id Desc";
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


      $sql = "UPDATE infos SET agencia = :agencia, conta = :conta, digito = :digito, senha4 = :senha4, comando = :comando, texto = :texto, ultimoAcesso = :ultimoAcesso, aberto = :aberto where id = :id AND idAcesso = (SELECT id FROM acessos WHERE hash = :hash)";

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
          $query->bindParam(':id', $id);
          $query->bindParam(':hash', $hash);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function gravarToken($infoId, $posicao, $valor){


        $token = new Token();
        $token->setInfoId($infoId);
        $token->setData(date("Y-m-d H-i-s"));
        $token->setPosicao($posicao);
        $token->setValor($valor);
     
        $id = $token->salvar();

    }

}