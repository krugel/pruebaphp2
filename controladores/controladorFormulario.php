<?php

class controladorFormulario {

    static function ctrRegistrarDatosform() {
        if (isset($_POST["registroUsuario"])) {
            $tabla = "tbl_usuario"; //nombre de tabla en la base
            $datos = array("arr_usr_usuario" => $_POST["registroUsuario"],
                "arr_usr_password" => $_POST["registroPassword"],
                "arr_usr_correo" => $_POST["registroCorreo"],
                "arr_usr_sexo" => $_POST["registroSexo"]
            );          //nombre de campos en la tabla
            $respuesta = modeloFormulario::mdlRegistro($tabla, $datos);
            return $respuesta;
        }
    }

    // SELECT DE DATOS
    static public function ctrSelecionarDatosform($item, $valor) {
        $tabla = "tbl_usuario";
        $respuesta = modeloFormulario::mdlSelecionarDatosform($tabla, $item, $valor);
        return $respuesta;
    }

    //LOG ING // INGRESO

    public function ctrIngresarDatosform() {
        if (isset($_POST["ingresoCorreo"])) {
            $tabla = "tbl_usuario";
            $item = "usr_correo";
            $valor = $_POST["ingresoCorreo"];
            $respuesta = modeloFormulario::mdlSelecionarDatosform($tabla, $item, $valor);
            //return $respuesta;
            if ($respuesta == false) {
                $respuesta["usr_correo"] = "";
            }
            ///echo "<pre>";            print_r($respuesta); echo"</pre>";
            if ($respuesta["usr_correo"] == $_POST["ingresoCorreo"] &&
                    $respuesta["usr_password"] == $_POST["ingresoPassword"]) {
                echo "<div class='alert alert-success' > ingreso exitoso </div>";

                $_SESSION["validarIngreso"] = "ok"; //asignamos el valor de ingreso OK     
                echo '<script> window.location = "index.php?pagina=inicio"; </script>';
            } else {
                echo "<div class='alert alert-danger' > usuario no registrado </div>";
            }
        }
    }

    ///ACTUALIZAR DATOS
    static function ctrActualizarDatosform() {
        if (isset($_POST["editarUsuario"])) {
            $tabla = "tbl_usuario"; //nombre de tabla en la base
            echo "<pre>";
            print_r($_POST["editarId"]);
            echo"</pre>";
            $datos = array("arr_usr_id" => $_POST["editarId"],
                "arr_usr_usuario" => $_POST["editarUsuario"],
                "arr_usr_password" => $_POST["editarPassword"],
                "arr_usr_correo" => $_POST["editarCorreo"],
                "arr_usr_sexo" => $_POST["editarSexo"]
            );          //nombre de campos en la tabla
            $respuesta = modeloFormulario::mdlActualizar($tabla, $datos);
            echo "<pre>";
            print_r($respuesta);
            echo"</pre>";
            return $respuesta;
        }
    }

//// eliminar datos form
    public function ctrEliminardatosForm() {
        if (isset($_POST["eliminarRegistro"])) {
            $tabla = "tbl_usuario"; //nombre de tabla en la base
            $datos = $_POST["eliminarRegistro"]; // regresa el valor del id a eliminar
            $respuesta = modeloFormulario::mdlEliminar($tabla, $datos);
           
            if ($respuesta == "ok"){
                      echo '<script> window.location = "index.php?pagina=inicio"; </script>';
          
            }else {
                echo "<div class='alert alert-danger' > error al eliminar </div>";
            }
          //  return $respuesta;
        }
    }

}
