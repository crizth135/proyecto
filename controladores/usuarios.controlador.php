<?php

class ControladorUsuarios{

    public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){
          if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
              preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
               $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
               $tabla = "usuario";
               $item = "login";
               $valor = $_POST["ingUsuario"];
               $respuesta = ModeloUsuarios::MdlMostrarusuarios ($tabla, $item, $valor);

            
              }
        }
    }
}