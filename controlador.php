<?php

if (isset($_POST['accion'])) {
    include './Clases/ClaseCategoria.php';
    $Categoria = new ClaseCategoria();

    $accion = $_POST['accion'];

    switch ($accion) {
        case 'IngresarUsuario':
            include './Clases/ClaseUsuario.php';

            $cedula = htmlentities($_POST['cedula']);
            $nombre = htmlentities($_POST['nombre']);
            $apellidos = htmlentities($_POST['apellidos']);
            $nomuser = htmlentities($_POST['nomUsuario']);
            $phone = htmlentities($_POST['telefono']);
            $email = htmlentities($_POST['email']);
            $rol = htmlentities($_POST['rol']);
            $contra = htmlentities($_POST['contrasena']);

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
            $id = htmlentities($_POST['id']);
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
                $id = htmlentities($_POST['id']);
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

                $id = htmlentities($_POST['idEdit']);
                $cedula = htmlentities($_POST['cedula']);
                $nombre = htmlentities($_POST['nombre']);
                $apellidos = htmlentities($_POST['apellidos']);
                $nomuser = htmlentities($_POST['nomUsuario']);
                $phone = htmlentities($_POST['telefono']);
                $email = htmlentities($_POST['email']);
                $rol = htmlentities($_POST['rol']);

                $respuesta = $usu->EditaUsuarios($id, $cedula, $nombre, $apellidos, $nomuser, $phone, $email, $rol);
                $respuesta = json_encode($respuesta['valido']);
                echo $respuesta;
            }

            break;
        case 'Login':
            include './Clases/ClaseUsuario.php';

            $nom = $_POST['nombreUsuario'];
            $contra = $_POST['contra'];
            $usu = new ClaseUsuario("", "", "", "", "", "", "", "");
            $respuesta = $usu->Login($nom, $contra);

            $respuesta = json_encode($respuesta);
            echo $respuesta;
            break;
        case 'Logout':

            session_start();
            session_destroy();

            $respuesta = true;
            echo json_encode($respuesta);

            break;
        case 'listarCategorias':
            $respuesta = array();
            $respuesta = $Categoria->ListarCategorias();

            if ($respuesta['valido']) {
                $datos = $respuesta['categorias'];
                $datos = json_encode($datos);
                echo $datos;
            } else {
                echo "shit";
            }
            break;

        case 'IngresarCategoria':

            $nomcate = $_POST['nombrecate'];
            $tipo = $_POST['idtipo'];
            $respuesta = $Categoria->CrearCategoria($nomcate, $tipo);
            echo json_encode($respuesta);

            break;
        case 'eliminacategoria':

            $id = $_POST['idCate'];
            $respuesta = $Categoria->EliminaCategoria($id);
            echo json_encode($respuesta['valido']);

            break;
        default:
            echo 'No se hará nada';
            break;
    }
}
