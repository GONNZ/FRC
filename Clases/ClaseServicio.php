<?php

class ClaseServicio
{
    #Atributos

    private $idCategoria;
    private $nombre;
    private $descripcion;
    private $costoxsesion;

    #constructor

    public function __construct()
    {
        $this->idCategoria = "";
        $this->nombre = "";
        $this->descripcion = "";
        $this->costoxsesion = "";
    }

    #Métodos


    //CRUD
    function CrearServicio($idcat, $nombre, $desc, $costo)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');

        $query = "INSERT INTO tbservicios(idCategoria, nombre, descripcion, costoxsesion) ";
        $query .= "VALUES('" . $idcat . "','" . $nombre . "','" . $desc . "','" . $costo . "')";

        $resultado = $mysql->query($query);

        $id = $mysql->insert_id;

        if ($id > 0) {
            $retorno = true;
        } else {
            $retorno = false;
        }

        return $retorno;
    }


    function ListarServicios()
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbservicios ORDER BY idServicio";
        $resultado = $mysql->query($query);

        if ($resultado->num_rows > 0) {

            $json = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $json[] = $fila; /*  array_map('utf8_encode', $fila); */
            }
            $retorno["valido"] = true;
            $retorno["servicios"] = $json;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }



    function EliminaServicio($id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "DELETE FROM tbservicios WHERE idServicio = '" . $id . "'";
        $resultado = $mysql->query($query);

        if ($mysql->affected_rows > 0) {
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }


    function LLenaFormEdit($id)
    {

        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbservicios WHERE idServicio = '" . $id . "'";


        $resultado = $mysql->query($query);
        if ($resultado->num_rows > 0) {
            $fila = mysqli_fetch_array($resultado);
            $retorno['servicio'] = $fila; //array_map('utf8_encode', $fila);
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }
    function EditaServicio($idCate, $nombre, $desc, $costo, $id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "UPDATE tbservicios SET idCategoria = '" . $idCate . "', nombre = '" . $nombre . "', descripcion = '" . $desc . "', costoxsesion = '" . $costo . "'";
        $query .= " WHERE idServicio = '" . $id . "'";
        $resultado = $mysql->query($query);
        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }
}
