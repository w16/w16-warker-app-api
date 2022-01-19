<?php
    function verifyEmail($email) {
        if(!preg_match("/^([a-zA-Z0-9.-_])*([@])([a-z0-9]).([a-z]{2,3})/", $email)) {
            return false;
        }
        else {
            //Valida o dominio
            $dominio = explode('@',$email);

            if(!checkdnsrr($dominio[1], 'A')) {
                return false;
            }
            else {
                // Retorno true para indicar que o e-mail é valido
                return true;
            }
        }
    }

    function validateCoords($coords) {
        if($coords == '000.00000') {
            return false;
        }

        return true;
    }
?>