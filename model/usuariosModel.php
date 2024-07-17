<?php

include_once("config/conexion.php");

class usuarios
{
    private $id;

    private $nombre;
    private $apellido;

    private $gmail;
    private $password;
    private $permisos;

    private $pregunta;

    private $res;

    private $conn;
    private $table = "usuarios";


    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll()
    {
        $query = $query = "SELECT u.*, r.rol AS nombre_rol 
        FROM usuarios u 
        INNER JOIN roles r ON u.id_roles = r.id_roles";
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_usuario = " . $id;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_usuario,apellido_usuario,gmail_usuario,contraseña_usuario,id_roles,pregunta,respuesta) VALUES('" . $this->nombre . "','" . $this->apellido . "','" .  $this->gmail . "','" . $this->password . "','" . $this->permisos . "','" . $this->pregunta . "','" . $this->res . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_usuario = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET nombre_usuario = '" . $this->nombre . "', apellido_usuario = '" . $this->apellido . "', gmail_usuario = '" . $this->gmail . "', contraseña_usuario = '" . $this->password . "', id_roles = '" . $this->permisos . "' WHERE id_usuario = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($id)
    {
        $sql = "UPDATE " . $this->table . " SET contraseña_usuario = '" . $this->password . "' WHERE id_usuario = " . $id;

        if ($this->conn->exec($sql)) {
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

    public function setGmail($gmail)
    {
        $this->gmail = $gmail;
    }
    public function getGmail()
    {
        return $this->gmail;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;
    }
    public function getPermisos()
    {
        return $this->permisos;
    }

    public function setpregunta($pregunta)
    {
        $this->pregunta = $pregunta;
    }
    public function getpregunta()
    {
        return $this->pregunta;
    }

    public function setres($res)
    {
        $this->res = $res;
    }
    public function getres()
    {
        return $this->res;
    }


    public function revisarCorreo($correo)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE gmail_usuario = '$correo'";
        $res = $this->conn->query($sql);

        if ($res) {
            return $res->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}