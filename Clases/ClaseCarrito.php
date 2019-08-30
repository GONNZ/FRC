<?php


class ClaseCarrito
{

    ##Atributos
    private $idServ;
    private $objServ;
    private $objCate;
    private $objCitas;

    ##Constructor
    public function __construct()
    {
        $this->idServ = '';
        $this->objServ = new ClaseServicio();
        $this->objCate = new ClaseCategoria();
        $this->objCitas = new ClaseCitas();
    }

    ##Métodos


    function Añadir($id, $fecha)
    {
        $datos = array();
        $respuesta = $this->objServ->BuscarServicio($id);

        $servicio = $respuesta['servicio'];
        $idCate = $servicio['idCategoria'];
        $tipo = $this->objCate->GetTipo($idCate);

        $datos['servicio'] = $servicio;
        $datos['tipo'] = $tipo;


        session_start();
        $idUsu = $_SESSION['datos-login']['cedula'];


        $datos = array(

            'cedulaUsu' => $idUsu,
            'idServicio' => $servicio['idServicio'],
            'fechaCita' => $fecha,
            'estado' => 1,
            'tipo' => $tipo['nomTipo'],
            'categoria' => $tipo['tipo']['categoria'],
            'nomServicio' => $servicio['nombre'],
            'desServicio' => $servicio['descripcion'],
            'costoServicio' => $servicio['costoxsesion'],
            'idCarrito' => rand(1, 1000000)

        );

        $_SESSION['carrito'][] = $datos;


        return true;
    }


    function BorrarCarrito($idCarrito)
    {
        $carrito = array();

        if (isset($_SESSION['carrito'])) {

            $carrito = $_SESSION['carrito'];
        } else {
            session_start();
            $carrito = $_SESSION['carrito'];
        }


        $index = array_search($idCarrito, array_column($carrito, 'idCarrito'));
        unset($_SESSION['carrito'][$index]);
    }

    function ConfirmaCarrito()
    {
        $carrito = array();
        if (isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
        } else {
            session_start();
            $carrito = $_SESSION['carrito'];
        }

        foreach ($carrito as $cita) {

            $idUsu = $cita['cedulaUsu'];
            $idServ = $cita['idServicio'];
            $fecha = $cita['fechaCita'];
            $estado = $cita['estado'];

            $retorno = $this->objCitas->AñadirCita($idUsu, $idServ, $fecha, $estado);
        }

        unset($_SESSION['carrito']);


        return $retorno;
    }
}
