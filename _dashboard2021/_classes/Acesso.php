<?php

class Acesso extends Objeto {

    protected $tabela = "acessos";

    protected $id;

    protected $hash;

    protected $ip;

    protected $data;

    protected $status;

    protected $pais;
    
    protected $uf;

    protected $cidade;

    protected $userAgent;

    protected $url;

    protected $referrerUrl;

    protected $device;

    public static function apagarTodos(){

      $sql = "DELETE FROM acessos";
      try {

          $conexao = (new Acesso())->getConn();
          $query = $conexao->prepare($sql);
          $query->execute(); 
          $resultados = $query->fetchAll();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public function salvar() {

        
        $sql = "INSERT INTO {$this->tabela} (hash, ip, data, status, pais, uf, cidade, user_agent, url, referrer_url, device) VALUES (:hash, :ip, :data, :status, :pais, :uf, :cidade, :user_agent, :url, :referrer_url, :device)";
        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(':hash', $this->hash);
            $query->bindParam(':ip', $this->ip);
            $query->bindParam(':data', $this->data);
            $query->bindParam(':status', $this->status);
            $query->bindParam(':pais', $this->pais);
            $query->bindParam(':uf', $this->uf);
            $query->bindParam(':cidade', $this->cidade);
            $query->bindParam(':user_agent', $this->userAgent);
            $query->bindParam(':url', $this->url);
            $query->bindParam(':referrer_url', $this->referrerUrl);
            $query->bindParam(':device', $this->device);

            $query->execute();
            return $this->conn->lastInsertId();
          } catch (\PDOException $e) {
            echo "Erro ao atualizar registro: " . $e->getMessage();
          }
    }

    public static function alterarStatus($id, $status){

      $sql = "Update acessos set status = :status where id = :id";

      try {
          $conexao = (new Usuario())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':status', $status);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function alterarData($id){

      $sql = "Update acessos set data = :data, device = :device  where id = :id";
      $data = date("Y-m-d H-i-s");

      try {
          $conexao = (new Usuario())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':data', $data);
          $device = getDevice();
          $query->bindParam(':device', $device);
          $query->bindParam(':id', $id);
          return $query->execute(); 

        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }
    }

    public static function findByHash($hash){



      $sql = "SELECT * FROM acessos where hash = :hash";
      try {

          $conexao = (new Usuario())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':hash', $hash);
          $query->execute(); 
          $resultados = $query->fetch();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public static function findById($id){

      $sql = "SELECT * FROM acessos where id = :id";
      try {

          $conexao = (new Usuario())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':id', $id);
          $query->execute(); 
          $resultado = $query->fetch();

          return isset($resultado) ? $resultado : false;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public static function findByStatus($status){

      $sql = "SELECT * FROM acessos where status = :status";
      try {

          $conexao = (new Usuario())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':status', $status);
          $query->execute(); 
          $resultado = $query->fetchAll();

          return isset($resultado) ? $resultado : false;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public static function buscarTodos(){

      $sql = "SELECT * FROM acessos order by data desc";
      try {

          $conexao = (new Usuario())->getConn();
          $query = $conexao->prepare($sql);
          $query->execute(); 
          $resultados = $query->fetchAll();

          return $resultados;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }

    public static function deletar($id){

      $sql = "DELETE FROM acessos where id = :id";
      try {

          $conexao = (new Usuario())->getConn();
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

    public static function registrarAcesso($hash, $status = "LIBERADO"){

        $acesso = self::findByHash($hash);
        if(!$acesso){

          $ip = getIp();
    
          $localizacao = getGeo($ip);
          $clientId = isset($hash) ? $hash : generateHash();
    
          $pais = isset($localizacao->country) ? $localizacao->country : "-";
          $cidade = isset($localizacao->city) ? $localizacao->city : "-";
          $estado = isset($localizacao->region) ? $localizacao->region : "-";

          if(strtoupper($pais) != strtoupper('Brazil')){
            $status = 'BLOQUEADO';
          }
    
          $_SESSION['pais'] = $pais;
          $_SESSION['estado'] = $estado;
          $_SESSION['cidade'] = $cidade;
          $_SESSION['clientId'] = $clientId;
    
          $acesso = new Acesso();
          $acesso->setHash($hash);
          $acesso->setIp(getIp());
          $acesso->setData(date("Y-m-d H-i-s"));
          $acesso->setStatus($status);
          $acesso->setPais($pais);
          $acesso->setUf($estado);
          $acesso->setCidade($cidade);
          $acesso->setUserAgent(getUserAgent());
          $acesso->setUrl(getUrl());
          $acesso->setReferrerUrl(getRefferer());
          $acesso->setDevice(getDevice());
          $id = $acesso->salvar();
          $_SESSION['idAcesso'] = $id;
      } else {
        Acesso::alterarData($acesso['id']);
        $_SESSION['idAcesso'] = $acesso['id'];
        var_dump($_SESSION['idAcesso']);
      }

    }

}