<?php
function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
if (!is_session_started()){
    session_start();   
}

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');


require_once 'funcoes.php';

define("DB_HOST", dirname(__FILE__).'/db/banco_de_dados.db');
define("DB_TYPE", "sqlite");

define('INCLUDE_PATH', __DIR__);

//Autoload
spl_autoload_register(function($className){
	require_once INCLUDE_PATH . '/_classes/' . $className . '.php';
});

