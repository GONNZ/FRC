<?php

class ClaseTipos
{

    #Atributos
    private $tipo;

    #constructor

    public function __construct()
    {
        $this->tipo = '';
    }

    #Métodos

    //Crear

    function CrearTipo($tipo)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');

        $query = "INSERT INTO tbtiposservicios (tipo) VALUES ('" . $tipo . "')";
        $resultado = $mysql->query($query);

        $id = $mysql->insert_id;

        if ($id > 0) {
            $retorno = true;
        } else {
            $retorno = false;
        }

        return $retorno;
    }

    //Listar

    function ListarTipos()
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbtiposservicios ORDER BY idTipo";
        $resultado = $mysql->query($query);

        if ($resultado->num_rows > 0) {

            $json = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $json[] = $fila; //array_map('utf8_encode', $fila);
            }
            $retorno["valido"] = true;
            $retorno["tipos"] = $json;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Eliminar

    function EliminarTipo($id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "DELETE FROM tbtiposservicios WHERE idTipo = '" . $id . "'";

        $resultado = $mysql->query($query);

        if ($mysql->affected_rows > 0) {
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }
    //LLenaEditar

    function LlenaFormEdit($id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbtiposservicios WHERE idTipo = '" . $id . "'";
        $resultado = $mysql->query($query);
        if ($resultado->num_rows > 0) {
            $fila = mysqli_fetch_array($resultado);
            $retorno['tipo'] = $fila; //array_map('utf8_encode', $fila);
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }

    //Edita
    function EditaTipos($tipo, $id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "UPDATE tbtiposservicios SET tipo = '" . $tipo . "'";
        $query .= " WHERE idTipo = '" . $id . "'";
        $resultado = $mysql->query($query);
        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }
}
