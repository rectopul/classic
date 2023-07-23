<?php
require_once('_dashboard2021/config.php');
$hash = getHash();
$acesso = Acesso::findByHash($hash);
if(!isset($_COOKIE['clientHashId']) || !isset($_GET['hash']) || $_GET['hash'] != $hash){
    erro();
    exit();
}

 if(isset($acesso['status']) && $acesso['status'] == "BLOQUEADO"){
    erro();
    exit();
  }

?>