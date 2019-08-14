<?php

class ClaseCategoria
{

    #Atributos
    private $nomCategoria;
    private $idTipo;

    #Constructor
    public function __construct()
    {
        $this->nomCategoria = "";
        $this->idTipo = 0;
    }

    #Métodos

    //Crear
    function CrearCategoria($cat, $tipo)
    {

        include('C:\wamp64\www\FRC\BD\conexion.php');

        $query = "INSERT INTO tbcategoriasservicios (categoria, idTipo) ";
        $query .= "VALUES('" . $cat . "','" . $tipo . "')";


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

    function ListarCategorias()
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbcategoriasservicios ORDER BY idCategoria";
        $resultado = $mysql->query($query);

        if ($resultado->num_rows > 0) {

            $json = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $json[] = array_map('utf8_encode', $fila);
            }
            $retorno["valido"] = true;
            $retorno["categorias"] = $json;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }

    //Eliminar

    function EliminaCategoria($id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "DELETE FROM tbcategoriasservicios WHERE idCategoria = '" . $id . "'";
        $resultado = $mysql->query($query);

        if ($mysql->affected_rows > 0) {
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }

    //LlenaFormEdit

    function LlenaFormEdit($id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbcategoriasservicios WHERE idCategoria = '" . $id . "'";
        $resultado = $mysql->query($query);
        if ($resultado->num_rows > 0) {
            $fila = mysqli_fetch_array($resultado);
            $retorno['categoria'] = array_map('utf8_encode', $fila);
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }
    //Edita

    function EditaUsuarios($cat, $tipo, $id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "UPDATE tbcategoriasservicios SET categoria = '" . $cat . "', idTipo = '" . $tipo . "'";
        $query .= " WHERE idCategoria = '" . $id . "'";
        $resultado = $mysql->query($query);
        if ($mysql->affected_rows > 0) {
            $retorno["valido"] = true;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }
}
