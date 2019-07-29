<?php

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'IngresarUsuario':
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

            $respuesta = $usu->CrearUsuario();
            $respuesta = json_encode($respuesta['valido']);
            echo $respuesta;

            break;

        case 'listarUsuarios':
            include './Clases/ClaseUsuario.php';
            $usu = new ClaseUsuario("", "", "", "", "", "", "", "");

            $respuesta = array();
            $respuesta = $usu->ListarUsuarios();

            if ($respuesta['valido']) {
                $datos = $respuesta['usuarios'];
                $datos = json_encode($datos);
                echo $datos;
            } else {
                echo "shit";
            }

            break;
        case 'eliminaUsuario':
            include './Clases/ClaseUsuario.php';
            $id = $_POST['id'];
            $usu = new ClaseUsuario("", "", "", "", "", "", "", "");
            $respuesta = $usu->EliminaUsuario($id);
            $respuesta = json_encode($respuesta['valido']);
            echo $respuesta;
            break;
        case 'llenaFormEdit':
        case 'EditaUsuario':

            if ($accion === 'llenaFormEdit') {
                include './Clases/ClaseUsuario.php';
                $usu = new ClaseUsuario("", "", "", "", "", "", "", "");
                $id = $_POST['id'];
                $respuesta = array();
                $respuesta = $usu->LlenaFormEdit($id);

                if ($respuesta['valido']) {
                    $datos = $respuesta['usuario'];
                    $datos = json_encode($datos);
                    echo $datos;
                } else {
                    echo "shit";
                }
            } else {

                include './Clases/ClaseUsuario.php';
                $usu = new ClaseUsuario("", "", "", "", "", "", "", "");

                $id = $_POST['idEdit'];
                $cedula = $_POST['cedula'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $nomuser = $_POST['nomUsuario'];
                $phone = $_POST['telefono'];
                $email = $_POST['email'];
                $rol = $_POST['rol'];

                $respuesta = $usu->EditaUsuarios($id, $cedula, $nombre, $apellidos, $nomuser, $phone, $email, $rol);
                $respuesta = json_encode($respuesta['valido']);
                echo $respuesta;
            }

            break;

        default:
            echo 'No se hará nada';
            break;
    }
}
