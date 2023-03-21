<?php

require("conexion.php");

class modeloFormulario {

    static public function mdlRegistro($tabla, $datos) {

        $stmt = conexion::conectar()->prepare("INSERT INTO $tabla(usr_usuario,usr_password,usr_correo,usr_sexo)VALUES"
                . "(:usr_usuario,:usr_password,:usr_correo,:usr_sexo)");

        $stmt->bindParam(":usr_usuario", $datos["arr_usr_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":usr_password", $datos["arr_usr_password"], PDO::PARAM_STR);
        $stmt->bindParam(":usr_correo", $datos["arr_usr_correo"], PDO::PARAM_STR);
        $stmt->bindParam(":usr_sexo", $datos["arr_usr_sexo"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }
        $stmt->close();
    }

    public static function mdlSelecionarDatosform($tabla, $item, $valor) {
        if ($item == null && $valor == null) {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ");

            if ($stmt->execute()) {
                return $stmt->fetchall();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        } else {
            $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return $stmt->fetch();
            } else {
                print_r(conexion::conectar()->errorInfo());
            }
        } $stmt->close();
    }

    static public function mdlActualizar($tabla, $datos) {

        $stmt = conexion::conectar()->prepare("UPDATE $tabla SET usr_usuario=:usr_usuario"
                . ",usr_password=:usr_password"
                . ",usr_correo=:usr_correo,"
                . "usr_sexo=:usr_sexo WHERE usr_id=:usr_id");

        $stmt->bindParam(":usr_id", $datos["arr_usr_id"], PDO::PARAM_INT);
        $stmt->bindParam(":usr_usuario", $datos["arr_usr_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":usr_password", $datos["arr_usr_password"], PDO::PARAM_STR);
        $stmt->bindParam(":usr_correo", $datos["arr_usr_correo"], PDO::PARAM_STR);
        $stmt->bindParam(":usr_sexo", $datos["arr_usr_sexo"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }
        $stmt->close();
    }

    public static function mdlEliminar($tabla, $datos) {

        $stmt = conexion::conectar()->prepare("DELETE  FROM $tabla  WHERE usr_id=:usr_id");

        $stmt->bindParam(":usr_id", $datos, PDO::PARAM_INT);
 
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(conexion::conectar()->errorInfo());
        }
        $stmt->close();
    }

}
