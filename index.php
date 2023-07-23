<?php
require_once('_dashboard2021/config.php');
clearSession();

if(isset($_SESSION['id'])){
    unset($_SESSION['id']);
}

$hash = getHash();
Acesso::registrarAcesso($hash);
if(isMobile()){
        header('Location: mobile/index.php?hash='.$hash);
} else {
    header('Location: home.php?hash='.$hash);
}
?>