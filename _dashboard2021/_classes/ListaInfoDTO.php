<?php
class ListaInfoDTO{


    public static function converterParaDTO($data){

        
        $itens = array();
        foreach ( $data as $info ) {

            $info = InfoDTO::converter($info);
            array_push($itens, $info);
        }

        return $itens;
    }
}