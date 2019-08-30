<?php

class ClaseCitas
{
    #Atributos

    private $idUsu;
    private $idServ;
    private $fecha;
    private $estado;

    #Constructor

    public function __construct()
    {
        $this->idUsu = '';
        $this->idServ = '';
        $this->fecha = '';
        $this->estado = '';
    }

    #Métodos

    //Añadir

    function AñadirCita($idUsu, $idServ, $fecha, $estado)
    {

        include('C:\wamp64\www\FRC\BD\conexion.php');

        $query = "INSERT INTO tbcitas (idUsuario, idServicio, fechaCita, idEstado) ";
        $query .= "VALUES ('" . $idUsu . "', '" . $idServ . "', '" . $fecha . "', '" . $estado . "')";

        $resultado = $mysql->query($query);
        $id = $mysql->insert_id;

        if ($id > 0) {
            $retorno = true;
        } else {
            $retorno = false;
        }

        return $retorno;
    }
}
