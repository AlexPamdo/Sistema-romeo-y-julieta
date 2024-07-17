<?php

function render()
{
    include_once("views/usuarios.php");
}


include_once "model/usuariosModel.php";

class crearUsuario
{
    public function create()
    {
        $usuario = new usuarios();

        if (!empty($_POST["btnCrear"])) {
            if (!empty($_POST["nombre_usuario"]) and !empty($_POST["apellido_usuario"]) and !empty($_POST["gmail_usuario"]) and !empty($_POST["password_usuario"]) and !empty($_POST["id_roles"]) and !empty($_POST["pregunta"]) and !empty($_POST["respuesta"])) {


                $usuario->setNombre($_POST["nombre_usuario"]);
                $usuario->setApellido($_POST["apellido_usuario"]);
                $usuario->setGmail($_POST["gmail_usuario"]);
                $usuario->setPassword($_POST["password_usuario"]);
                $usuario->setPermisos($_POST["id_roles"]);
                $usuario->setpregunta($_POST["pregunta"]);
                $usuario->setres($_POST["respuesta"]);


                if ($usuario->create()) {
                    header("Location: index.php?page=usuarios&succes=1");
                } else {
                    header("Location: index.php?page=usuarios&error=1");
                }
            } else {
                echo "<div class='alert alert-warning'> Complete todos los campos </div> ";
            }
        }
        include_once "views/usuarios/crear.php";
    }
}

class eliminarUsuario
{
    public function eliminar()
    {
        $usuario = new usuarios();

        if (!empty($_GET["btnDelete"])) {

            $id = ($_GET["id"]);

            if ($usuario->delete($id)) {
                header("Location: index.php?page=usuarios&succes=2");
            } else {
                echo "<div class=' alert alert-danger'> Erro al eliminar Empleado</div> ";
            }
        }
    }
}


class editUsuario
{
    public function edit()
    {
        $usuario = new usuarios();
        $id = $_POST["id"] ?? null;

        if (!empty($_POST["btnUpdate"])) {
            switch ($_POST["btnUpdate"]) {
                case "edit":
                    $usuario->setNombre($_POST["nombre_usuario_edit"]);
                    $usuario->setApellido($_POST["apellido_usuario_edit"]);

                    $usuario->setGmail($_POST["gmail_usuario_edit"]);
                    $usuario->setPassword($_POST["password_usuario_edit"]);
                    $usuario->setPermisos($_POST["id_roles_edit"]);

                    if ($usuario->edit($id)) {
                        header("Location: index.php?page=usuarios&succes=3");
                        exit;
                    } else {
                        header("Location: index.php?page=usuarios&error=3");
                    }
                    break;

                case "close":
                    header("Location: index.php?page=usuarios");
                    exit;
            }
        }
        include_once "views/usuarios/editar.php";
    }
}


/* class editUsuario
{
    public function edit()
    {
        $usuario = new usuarios();
        $id = $_GET["id"] ?? null;

        if ($id !== null && isset($_GET["btnEditar"]) && ($_GET["btnEditar"] === "ok")) {

            $dataOne = $usuario->viewOne($id);

            if (!empty($_POST["btnUpdate"])) {
                switch ($_POST["btnUpdate"]) {
                    case "edit":
                        $usuario->setNombre($_POST["nombre_usuario_edit"]);
                        $usuario->setApellido($_POST["apellido_usuario_edit"]);
                        $usuario->setCedula($_POST["cedula_usuario_edit"]);
                        $usuario->setGmail($_POST["gmail_usuario_edit"]);
                        $usuario->setPassword($_POST["password_usuario_edit"]);
                        $usuario->setPermisos($_POST["id_roles_edit"]);

                        if ($usuario->edit($id)) {
                            header("Location: index.php?page=usuarios");
                            exit;
                        } else {
                            echo "<div class='alert alert-warning'> Error al Editar Usuario </div>";
                        }
                        break;

                    case "close":
                        header("Location: index.php?page=usuarios");
                        exit;
                }
            }
        }
        include_once "views/usuarios/editar.php";
    }
} */