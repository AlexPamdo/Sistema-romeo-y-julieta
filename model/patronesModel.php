<?php

include_once("config/conexion.php");

class patrones
{
    //atributos
    private $prenda;
    private $material;
    private $cantidad;
    private $costo;

    private $conn;
    private $table = "patrones";


    public function setAtribute($atribute, $valor)
    {
        switch ($atribute) {
            case "prenda":
                $this->prenda = $valor;
                break;
            case "material":
                $this->material = $valor;
                break;
            case "cantidad":
                $this->cantidad = $valor;
                break;
        }
    }




    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }




    public function viewAll()
    {
        $query = "SELECT u.*,
        p.nombre_prenda AS id_prenda,
        m.nombre_material AS id_material
        FROM patrones u 
        INNER JOIN prendas p ON u.id_prenda = p.id_prenda
        INNER JOIN almacen m ON u.id_material = m.id_material";


        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (id_prenda,id_material,cantidad_material,costo_unitario) VALUES('" . $this->prenda . "','" . $this->material . "','" . $this->cantidad . "','" . $this->costo . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        $query = "UPDATE " . $this->table - " SET id_prenda = '" . $this->prenda . "',  id_material = '" . $this->material . "', cantidad_material = '" . $this->cantidad . "', costo_unitario = '" . $this->costo . "', WHERE id_patron = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_patron = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getDatosPatron($idPatron)
    {
        // Sanitizar el input para prevenir inyecciones SQL
        $idPatron = intval($idPatron);
        $query = "SELECT * FROM " . $this->table . " WHERE id_patron = " . $idPatron;
        $result = $this->conn->query($query);

        if ($result) {
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data ?: null; // Devolver null si no se encuentra ningún registro
        } else {
            return null; // Manejar el caso cuando la consulta falla
        }
    }

    public function setPrecio($material, $cantidad)
    {
        // Utilizamos una consulta preparada para evitar la inyección SQL
        $query = "SELECT precio FROM almacen WHERE id_material = :material";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':material', $material, PDO::PARAM_INT);

        // Ejecutamos la consulta preparada
        if ($stmt->execute()) {
            // Obtener el precio del almacenamiento como un solo valor
            $precio = $stmt->fetchColumn();

            // Verificar si se obtuvo un precio válido
            if ($precio !== false) {
                // Calcular el costo total multiplicando el precio unitario por la cantidad
                $this->costo = $precio * $cantidad;
            } else {
                // Manejar el caso en el que no se encuentre el precio
                throw new Exception("No se encontró precio para el material con ID $material");
            }
        } else {
            // Manejar errores de ejecución de la consulta
            throw new Exception("Error al ejecutar la consulta");
        }
    }
}