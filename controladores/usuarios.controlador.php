<?php

class ControladorUsuarios{

    public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
                $encriptar = ($_POST["ingPassword"]);
                $tabla = "usuario";
                $item = "login";
                $valor = $_POST["ingUsuario"];
                $respuesta = ModeloUsuarios::MdlMostrarusuarios ($tabla, $item, $valor);
                
                if(is_array($respuesta) && $respuesta["login"] == $_POST["ingUsuario"] && $respuesta["clave"] == $encriptar){

                    $_SESSION["iniciarSesion"] = "ok";

                    echo '
                        <scrip>
                        
                            window.location = "inicio";
                        </scrip>
                    
                    
                    ';

                }else{

                    

                    echo '<div class="alert alert-danger" > el usuario no esta retgistrado </div>';

                }
                
            }
        }
    }
}