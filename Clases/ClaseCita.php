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

    #aplica para el listar en clientes y en administración
    function ListarCitas($id)
    {
        $retorno = array();
        if ($id == '') {

            include('C:\wamp64\www\FRC\BD\conexion.php');
            $query = "SELECT * FROM tbcitas WHERE idEstado = '1' ORDER BY fechaCita";

            $resultado = $mysql->query($query);

            if ($resultado->num_rows > 0) {

                $json = array();
                while ($fila = mysqli_fetch_array($resultado)) {
                    $json[] = $fila;
                }
                $retorno["valido"] = true;
                $retorno["citas"] = $json;
            } else {
                $retorno["valido"] = false;
            }
        } else {

            include('C:\wamp64\www\FRC\BD\conexion.php');
            $retorno = array();
            $query = "SELECT * FROM tbcitas WHERE idUsuario = '" . $id . "' AND idEstado = '1' ORDER BY fechaCita";

            $resultado = $mysql->query($query);
            if ($resultado->num_rows > 0) {

                $json = array();
                while ($fila = mysqli_fetch_array($resultado)) {
                    $json[] = $fila;
                }
                $retorno["valido"] = true;
                $retorno["citas"] = $json;
            } else {
                $retorno["valido"] = false;
            }
        }

        return $retorno;
    }

    #Cancelar Cita

    function ActualizaEstadoCita($id, $estado)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "UPDATE tbcitas SET idEstado = '" . $estado . "' WHERE idCita = '" . $id . "'";

        $resultado = $mysql->query($query);
        if ($mysql->affected_rows > 0) {
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    #Select a clientes con Cita para combo.

    function UsuariosCitas()
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT idUsuario FROM tbcitas WHERE idEstado = 1 group BY idUsuario";

        $resultado = $mysql->query($query);
        if ($resultado->num_rows > 0) {

            $json = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $json[] = $fila;
            }
            $retorno["valido"] = true;
            $retorno["citas"] = $json;
        } else {
            $retorno["valido"] = false;
        }

        return $retorno;
    }
}
