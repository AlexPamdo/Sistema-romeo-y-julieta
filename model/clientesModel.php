<?php

include_once("config/conexion.php");

class clientes
{
    private $id;

    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $contraseña;
    private $cedula;

    private $conn;
    private $tabla = "clientes";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll()
    {
        $query = "SELECT * FROM " . $this->tabla;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->tabla . " WHERE id_cliente = " . $id;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->tabla . " (nombre,apellido,telefono,email,contraseña,cedula) VALUES('" . $this->nombre . "','" . $this->apellido . "','" . $this->telefono . "','" .  $this->email . "','" . $this->contraseña . "','" . $this->cedula . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->tabla . " WHERE id_cliente = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->tabla . " SET nombre = '" . $this->nombre . "', apellido = '" . $this->apellido . "',  telefono = '" . $this->telefono . "', email = '" . $this->email . "', contraseña = '" . $this->contraseña . "', cedula = '" . $this->cedula . "' WHERE id_cliente = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }
    public function getContraseña()
    {
        return $this->contraseña;
    }


    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function getCedula()
    {
        return $this->cedula;
    }
}