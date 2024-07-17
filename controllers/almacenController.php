<?php

function render()
{
    include_once("views/almacen.php");
}


include_once "model/almacenModel.php";

class crearMaterial
{
    public function create()
    {
        $material = new material();

        if (!empty($_POST["btnCrear"])) {
            if (!empty($_POST["nombre_material"]) and !empty($_POST["tipo_material"]) and !empty($_POST["color_material"]) and !empty($_POST["stock"]) and !empty($_POST["precio"])) {


                $material->setNombre($_POST["nombre_material"]);
                $material->setTipo($_POST["tipo_material"]);
                $material->setColor($_POST["color_material"]);
                $material->setStock($_POST["stock"]);
                $material->setPrecio($_POST["precio"]);



                if ($material->create()) {
                    //aqui falto poner el telas y materiales
                    header("Location: index.php?page=almacen&succes=1");
                } else {
                    echo "<div class='alert alert-warning'> Error al Crear cliente </div> ";
                }
            } else {
                echo "<div class='alert alert-warning'> Complete todos los campos </div> ";
            }
        }
        include_once "views/almacen/crear.php";
    }
}

class eliminarMaterial
{
    public function eliminar()
    {
        $material = new material();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($material->delete($id)) {
                header("Location: index.php?page=almacen&succes=2");
            } else {
                echo "<div class=' alert alert-danger'> Error al eliminar material</div> ";
            }
        }
    }
}


class editMaterial
{
    public function edit()
    {
        $material = new Material();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            switch ($_POST["btnUpdate"]) {
                case "edit":
                    $material->setNombre($_POST["nombre_material"]);
                    $material->setTipo($_POST["tipo_material"]);
                    $material->setColor($_POST["color_material"]);
                    $material->setStock($_POST["stock"]);
                    $material->setPrecio($_POST["precio"]);


                    if ($material->edit($id)) {
                        header("Location: index.php?page=almacen&succes=3");
                        exit;
                    } else {
                        echo "<div class='alert alert-warning'> Error al Editar Usuario </div>";
                    }
                    break;

                case "close":
                    header("Location: index.php?page=almacen");
                    exit;
            }
        }
        include_once "views/almacen/editar.php";
    }
}
