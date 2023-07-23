<?php

class Sessao extends Objeto {

    protected $tabela = "sessoes";

    protected $id;

    protected $token;

    protected $usuario;

    protected $ip;

    protected $data;

    public static function registrarSessao($usuario, $token) {
        
        $sql = "INSERT INTO sessoes (token, usuario, ip, data) VALUES (:token, :usuario, :ip, :data)";
        try {
            $data = date("Y-m-d H-i-s");
            $ip = getIp();
            $conexao = (new Usuario())->getConn();
            $query = $conexao->prepare($sql);
            $query->bindParam(':token', $token);
            $query->bindParam(':usuario', $usuario);
            $query->bindParam(':ip', $ip);
            $query->bindParam(':data', $data);

            $query->execute();
            return $conexao->lastInsertId();
          } catch (\PDOException $e) {
            echo "Erro ao atualizar registro: " . $e->getMessage();
          }
    }

    public static function validarToken($usuario, $token){


      $sql = "SELECT * FROM sessoes where usuario = :usuario AND token = :token";
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


    public static function deletar($id){

        $sql = "DELETE FROM sessoes where id = :id";
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

      public static function buscarTodos(){

        $sql = "SELECT * FROM sessoes order by id desc";
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


}