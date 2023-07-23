<?php
require_once 'config.php';

if(!estaLogado()){
    header("Location: index.php");
    exit();
}

?>