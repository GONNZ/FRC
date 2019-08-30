<?php


class ClaseCarrito
{

    ##Atributos
    private $idServ;
    private $objServ;
    private $objCate;

    ##Constructor
    public function __construct()
    {
        $this->idServ = '';
        $this->objServ = new ClaseServicio();
        $this->objCate = new ClaseCategoria();
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

       // var_dump($_SESSION['carrito'][0]);

        $index = array_search($idCarrito, array_column($carrito, 'idCarrito'));
        unset($_SESSION['carrito'][$index]);
    }
}
