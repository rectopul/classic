<?php

class Objeto extends Database {


    public function __call($metodo, $parametros = null) {
        $acao = substr($metodo, 0, 3);
        $atributo = lcfirst(substr($metodo, 3));
        if($acao === 'get') {
            return isset( $this->$atributo) ? $this->$atributo : null;
        } else if($acao == 'set' && count($parametros) == 1) {
            $this->$atributo = $parametros[0];
        }
    }

}