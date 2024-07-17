<?php

function render()
{
    include_once("views/confecciones.php");
}


include_once "model/confeccionesModel.php";
include_once "model/almacenModel.php";
include_once "model/patronesModel.php";
include_once "model/prendasModel.php";

class crearConfeccion
{
    public function create()
    {
        $confeccion = new confecciones();
        $material = new material();
        $patrones = new patrones();
        $prendas = new Prenda();

        if (!empty($_POST["btnCrear"])) {


            $confeccion->setPatron($_POST["patron"]);
            $confeccion->setCantidad($_POST["cantidad"]);
            $confeccion->setFechaFabricacion(date('Y-m-d H:i:s'));
            $confeccion->setTiempoFabricacion($_POST["tiempo"]);
            $confeccion->setempleado($_POST["empleado"]);

            $dataPatron = $patrones->getDatosPatron($_POST["patron"]);

            $idMaterial = $dataPatron["id_material"];
            $cantidad = $dataPatron["cantidad_material"];
            $idPrenda = $dataPatron["id_prenda"];

            $cantidaTotal = $cantidad * $_POST["cantidad"];

            $stock = $material->getMaterialStock($idMaterial);

            if ($cantidaTotal <= $stock) {
                if ($confeccion->create() && $material->updateStockPatron($idMaterial, $cantidaTotal) && $prendas->updateStockPrendas($idPrenda, $_POST["cantidad"])) {
                    header("Location: index.php?page=confecciones&succes=1");
                } else {
                    header("Location: index.php?page=confecciones&error=1");
                }
            } else {
                header("Location: index.php?page=confecciones&error=5");
            }
        }
        include_once "views/confecciones/crear.php";
    }
}

class eliminarConfeccion
{
    public function eliminar()
    {
        $confeccion = new confecciones();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($confeccion->delete($id)) {
                header("Location: index.php?page=confecciones&succes=2");
            } else {
                echo "<div class=' alert alert-danger'> Erro al eliminar Empleado</div> ";
            }
        }
    }
}


class editConfeccion
{
    public function edit()
    {
        $confeccion = new confecciones();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            if ($_POST["btnUpdate"] == "edit") {


                $confeccion->setPatron($_POST["patron"]);
                $confeccion->setCantidad($_POST["cantidad"]);
                $confeccion->setFechaFabricacion($_POST["fecha"]);
                $confeccion->setTiempoFabricacion($_POST["tiempo"]);
                $confeccion->setempleado($_POST["empleado"]);


                if ($confeccion->edit($id)) {
                    header("Location: index.php?page=confecciones&succes=3");
                    exit;
                } else {
                    header("Location: index.php?page=confecciones&error=3");
                }
            }
        }
        include_once "views/confecciones/editar.php";
    }
}