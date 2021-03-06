<?php

if (isset($_POST['accion'])) {
    include './Clases/ClaseCategoria.php';
    include './Clases/ClaseTipos.php';
    include './Clases/ClaseServicio.php';
    include './Clases/ClaseCarrito.php';
    include './Clases/ClaseCita.php';

    $Carrito = new ClaseCarrito();
    $Servicio = new ClaseServicio();
    $Tipo = new ClaseTipos();
    $Categoria = new ClaseCategoria();
    $Citas = new ClaseCitas();

    $accion = $_POST['accion'];

    switch ($accion) {
            /* #region Usuarios*/
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

        case 'Registro';
            include './Clases/ClaseUsuario.php';
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $nomuser = $_POST['nomUsuario'];
            $phone = $_POST['telefono'];
            $email = $_POST['email'];
            $contra = $_POST['contrasena'];

            $usu = new ClaseUsuario($cedula, $nombre, $apellidos, $nomuser, $phone, $email, "", $contra);

            $respuesta = $usu->CrearUsuario();
            $respuesta = json_encode($respuesta['valido']);
            echo $respuesta;

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

            /* #endregion */

            /* #region Categorias*/
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

        case 'formEditCategotia':
        case 'EditaCategoria':

            if ($accion == 'formEditCategotia') {
                $id = $_POST['id'];
                $respuesta  = $Categoria->LlenaFormEdit($id);

                if ($respuesta['valido']) {
                    echo json_encode($respuesta['categoria']);
                }
            } else {
                $nomcate = $_POST['nombrecate'];
                $tipo = $_POST['idtipo'];
                $id = $_POST['idCate'];

                $respuesta = $Categoria->EditaUsuarios($nomcate, $tipo, $id);
                echo json_encode($respuesta);
            }
            break;
            /* #endregion */

            /* #region Tipos */
        case 'ListarTipos':
            $respuesta = array();
            $respuesta = $Tipo->ListarTipos();

            if ($respuesta['valido']) {
                $datos = $respuesta['tipos'];
                $datos = json_encode($datos);
                echo $datos;
            } else {
                echo "shit";
            }
            break;

        case 'IngresarTipo':

            $tipo = $_POST['tipo'];
            $respuesta = $Tipo->CrearTipo($tipo);
            echo json_encode($respuesta);

            break;
        case 'eliminatipo':

            $id = $_POST['id'];
            $respuesta = $Tipo->EliminarTipo($id);
            echo json_encode($respuesta['valido']);

            break;

        case 'formEditTipo':
        case 'EditaTipo':

            if ($accion == 'formEditTipo') {
                $id = $_POST['id'];
                $respuesta  = $Tipo->LlenaFormEdit($id);

                if ($respuesta['valido']) {
                    echo json_encode($respuesta['tipo']);
                }
            } else {

                $tipo = $_POST['tipo'];
                $id = $_POST['id'];

                $respuesta = $Tipo->EditaTipos($tipo, $id);
                echo json_encode($respuesta);
            }


            break;


            /* #endregion */

            /* #region Servicios */
        case 'comboCategorias':

            $id = $_POST['id'];
            $respuesta = $Categoria->SelectporTipo($id);
            $respuesta = $Categoria->ArmaCombo($respuesta);
            echo json_encode($respuesta);

            break;

        case 'listarServicios':

            $respuesta = array();
            $respuesta = $Servicio->ListarServicios();

            if ($respuesta['valido']) {
                $datos = $respuesta['servicios'];
                $datos = json_encode($datos);
                echo $datos;
            } else {
                echo "error en consulta o no hay datos";
            }
            break;

        case 'IngresarServicio':

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $costo = $_POST['costo'];
            $cate = $_POST['cate'];

            $respuesta = $Servicio->CrearServicio($cate, $nombre, $descripcion, $costo);
            echo json_encode($respuesta);

            break;
        case 'eliminaServicio':

            $id = $_POST['idServ'];
            $respuesta = $Servicio->EliminaServicio($id);
            echo json_encode($respuesta['valido']);

            break;

        case 'formEditServicio':
        case 'EditaServicio';
            if ($accion == 'formEditServicio') {
                $id = $_POST['id'];
                $respuesta  = $Servicio->LLenaFormEdit($id);

                if ($respuesta['valido']) {
                    echo json_encode($respuesta['servicio']);
                }
            } else {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $costo = $_POST['costo'];
                $cate = $_POST['cate'];
                $id = $_POST['id'];
                $respuesta = $Servicio->EditaServicio($cate, $nombre, $descripcion, $costo, $id);
                echo json_encode($respuesta);
            }

            break;
        case 'getTipo':
            $id = $_POST['id'];
            $respuesta  = $Categoria->GetTipo($id);
            echo json_encode($respuesta);
            break;
        case 'FiltroServicios':

            $id = $_POST['id'];
            $respuesta = $Servicio->ListarServiciosCli($id);
            echo json_encode($respuesta);

            break;

        case 'getServicio':

            $id = $_POST['id'];
            $respuesta = $Servicio->BuscarServicio($id);
            echo json_encode($respuesta['servicio']);

            break;
            /* #endregion  */

            /* #region Carrito */

        case 'añadirCarrito':

            $id = $_POST['id'];
            $fecha = $_POST['fecha'];
            $respuesta = $Carrito->Añadir($id, $fecha);
            echo json_encode($respuesta);

            break;
        case 'getCarrito':

            if (isset($_SESSION)) {
                if (isset($_SESSION['carrito'])) {
                    $carrito = $_SESSION['carrito'];
                } else {
                    $carrito = '';
                }
            } else {
                session_start();
                if (isset($_SESSION['carrito'])) {
                    $carrito = $_SESSION['carrito'];
                } else {
                    $carrito = '';
                }
            }


            echo json_encode($carrito);

            break;

        case 'borradeCarrito':

            $id = $_POST['id'];
            $Carrito->BorrarCarrito($id);
            echo json_encode('case');

            break;
        case 'confirmaCarrito':

            if (isset($_SESSION['carrito'])) {
                $carrito = $_SESSION['carrito'];
            } else {
                session_start();
                $carrito = $_SESSION['carrito'];
            }
            $carrovacio = empty($carrito);

            if ($carrovacio) {
                echo json_encode(false);
            } else {

                $respuesta = $Carrito->ConfirmaCarrito();
                echo json_encode($respuesta);
            }

            break;
            /* #endregion Carrito */

            /* #region Citas */

        case 'ListarCitasCli':

            if (isset($_SESSION)) {
                $idUs = $_SESSION['datos-login']['cedula'];
            } else {
                session_start();
                $idUs = $_SESSION['datos-login']['cedula'];
            }

            $respuesta = $Citas->ListarCitas($idUs);

            echo json_encode($respuesta);

            break;
        case 'cancelaCita':

            $id = $_POST['id'];
            $respuesta = $Citas->ActualizaEstadoCita($id, 2);
            echo json_encode($respuesta);

            break;

        case 'admCitas':

            $id = $_POST['id'];

            if ($id == '*') {
                $respuesta = $Citas->ListarCitas('');
            } else {
                $respuesta = $Citas->ListarCitas($id);
            }
            echo json_encode($respuesta);
            break;

        case 'CitasADM':

            $respuesta = $Citas->UsuariosCitas();
            if (empty($respuesta['citas'])) {
                $respuesta['valido'] = false;
            } else {
                $respuesta['valido'] = true;
            }
            echo json_encode($respuesta);

            break;
        case 'facCita':

            $id = $_POST['id'];
            $respuesta = $Citas->ActualizaEstadoCita($id, 3);
            echo json_encode($respuesta);

            break;

            break;
            /* #endregion Citas */


        default:
            echo 'No se hará nada';
            break;
    }
}
