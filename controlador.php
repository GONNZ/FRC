<?php

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'add':
            include './Clases/ClaseUsuario.php';

            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $nomuser = $_POST['nomUsuario'];
            $phone = $_POST['telefono'];
            $email = $_POST['email'];
            $rol = $_POST['rol'];
            $contra = $_POST['contrasena'];

            $usu = new ClaseUsuario($cedula, $nombre, $apellidos, $nomuser, $phone, $email, $rol, $contra);

            echo 'Datos enviados: [' . $cedula . " " . $nombre . " " . $apellidos . " " . $nomuser . " " . $phone . " " . $email . " " . $rol . " " . $contra . "]";

            $query = $usu->CrearUsuario();

            echo "Query: " . $query;


            break;

        case 'listarUsuarios':
            include './Clases/ClaseUsuario.php';
            $usu = ClaseUsuario->__constructVacio();

            $respuesta = array();
            $respuesta = $usu->ListarUsuarios();

            if ($respuesta['valido']) {
                echo $respuesta['usuarios'];
            }

            break;

        default:
            echo 'No se hará nada';
            break;
    }
}
