<?php

class Usuario extends Objeto {

    protected $tabela = "usuarios";

    protected $id;

    protected $usuario;

    protected $senha;

    public function autenticar($usuario, $senha) {
        
        $sql = "SELECT * FROM {$this->tabela} where usuario = :usuario AND senha = :senha";
        $senha = md5($senha);
        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':senha', $senha);
            $query->execute(); 
            $resultados = $query->fetchAll();
            if(count($resultados)) {
              $this->popularObjeto($resultados[0]);
            }
            return count($resultados) > 0 ? true : false;
          } catch (\PDOException $e) {
            echo "Erro ao atualizar registro: " . $e->getMessage();
          }
    }

    public function registrarToken($token) {
        
        $sql = "Update {$this->tabela} set token = :token where id = :id";

        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(':id', $this->id);
            $query->bindParam(':token', $token);
            return $query->execute(); 

          } catch (\PDOException $e) {
            echo "Erro ao atualizar registro: " . $e->getMessage();
          }
    }

    public function popularObjeto($obj) {
        $this->setId($obj['id']);
        $this->setUsuario($obj['usuario']);
        $this->setSenha($obj['senha']);
        return $this;
    }

    public static function validarToken($usuario, $token){

      $sql = "SELECT * FROM usuarios where usuario = :usuario AND token = :token";
      try {

          $conexao = (new Usuario())->getConn();
          $query = $conexao->prepare($sql);
          $query->bindParam(':usuario', $usuario);
          $query->bindParam(':token', $token);
          $query->execute(); 
          $resultados = $query->fetchAll();

          return count($resultados) > 0 ? true : false;
        } catch (\PDOException $e) {
          echo "Erro ao atualizar registro: " . $e->getMessage();
        }

    }




}