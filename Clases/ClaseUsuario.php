<?php

class ClaseUsuario
{
    #Atributos

    private $cedula;
    private $nombre;
    private $apellidos;
    private $nomUsuario;
    private $telefono;
    private $email;
    private $rol;
    private $contrasena;

    #Constructor

    public function __construct($ced, $nom, $ape, $nomUsu, $telef, $mail, $rol, $contra)
    {
        $this->cedula = $ced;
        $this->nombre = $nom;
        $this->apellidos = $ape;
        $this->nomUsuario = $nomUsu;
        $this->telefono = $telef;
        $this->email = $mail;
        $this->rol = $rol;
        $this->contrasena = $contra;
    }
    public function ClaseUsuario()
    {
        $this->cedula = '';
        $this->nombre = '';
        $this->apellidos = '';
        $this->nomUsuario = '';
        $this->telefono = '';
        $this->email = '';
        $this->rol = '';
        $this->contrasena = '';
    }

    #Métodos

    function CrearUsuario()
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "INSERT INTO tbusuarios(cedula,nombre,apellidos,telefono,email,nombreUsuario,contrasena,idRol) ";
        $query .= "VALUES('" . $this->cedula . "','" . $this->nombre . "','" . $this->apellidos . "','" . $this->telefono . "','" . $this->email . "','" . $this->nomUsuario . "','" . $this->contrasena . "','" . $this->rol . "')";
        $resultado = $mysql->query($query);
        $id = $mysql->insert_id;

        if ($id > 0) {
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }
    function ListarUsuarios()
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbusuarios";

        $resultado = $mysql->query($query);

        if ($resultado->num_rows > 0) {

            $json = array();
            while ($fila = mysqli_fetch_array($resultado)) {
                $json[] = array(
                    'id' => $fila['id'],
                    'cedula' => $fila['cedula'],
                    'nombre' => $fila['nombre'],
                    'apellidos' => $fila['apellidos'],
                    'telefono' => $fila['telefono'],
                    'email' => $fila['email'],
                    'nombreUsuario' => $fila['nombreUsuario'],
                    'rol' => $fila['idRol']
                );
            }

            //$jsonstring = json_encode($json);
            $retorno["valido"] = true;
            $retorno["usuarios"] = $json;
        } else {
            $retorno["valido"] = false;
        }
        return $retorno;
    }
    function EliminaUsuario($id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "DELETE FROM tbusuarios WHERE id = '" . $id . "'";
        $resultado = $mysql->query($query);

        if ($mysql->affected_rows > 0) {
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }
    function LlenaFormEdit($id)
    {
        include('C:\wamp64\www\FRC\BD\conexion.php');
        $retorno = array();
        $query = "SELECT * FROM tbusuarios WHERE id = '" . $id . "'";
        $resultado = $mysql->query($query);
        if ($resultado->num_rows > 0) {
            $fila = mysqli_fetch_array($resultado);
            $retorno['usuario'] = array(
                'cedula' => $fila['cedula'],
                'nombre' => $fila['nombre'],
                'apellidos' => $fila['apellidos'],
                'nombreUsuario' => $fila['nombreUsuario'],
                'telefono' => $fila['telefono'],
                'email' => $fila['email']
            );
            $retorno['valido'] = true;
        } else {
            $retorno['valido'] = false;
        }
        return $retorno;
    }
}
