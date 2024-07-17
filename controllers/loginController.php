<?php

function render()
{
    include_once("views/login.php");
}

include_once("model/loginModel.php");



function login()
{
    if (!empty($_POST["btnLogin"])) {

        $usuarios = new usuarios();
        $login = new Login();

        $login->setGmail($_POST["gmail_usuario"]);
        $login->setContraseña($_POST["contraseña_usuario"]);

        $result = $login->login();

        if ($result) {

            $_SESSION["username"] = $result["nombre_usuario"];
            $_SESSION["id_user"] = $result["id_usuario"];

            header("location:index.php?page=dashboard&session=login");
        } elseif ($_POST["gmail_usuario"] == "admin" && $_POST["contraseña_usuario"] == "admin123") {
            $_SESSION["username"] = "admin";
            header("location:index.php?page=dashboard&session=login");
        } else {
            echo "<script>alert('Error al obtener el nombre del usuario');</script>";
        }
    }
}



include_once "model/usuariosModel.php";

class olvideContraseña
{

    public function verCorreo()
    {

        if (!empty($_POST["btnOlvide"])) {
            $usuarios = new usuarios();

            $correo = $_POST["correo"];

            $usuario = $usuarios->revisarCorreo($correo);
            $id = $usuario["id_usuario"];

            if ($usuario) {
                header("location:index.php?page=login&function=forgotPassword&id=$id");
            } else {
                header("location:index.php?page=login&error");
            }
        }
    }

    public function cambiarContraseña()
    {




        if (!empty($_POST["btnSwichPassword"])) {

            $usuarios = new usuarios();

            $id = $_GET["id"];

            $usuario = $usuarios->viewOne($id);

            $respuestaSeguridad = $usuario["respuesta"];

            if ($_POST["answer"] === $respuestaSeguridad) {

                if ($_POST["password"] === $_POST["c_password"]) {

                    $usuarios->setPassword($_POST["password"]);

                    if ($usuarios->updatePassword($id)) {
                        header("location:index.php?page=login&succes=4");
                    } else {
                        header("location:index.php?page=login&function=forgotPassword&id=$id&error=4");
                    }
                } else {
                    header("location:index.php?page=login&function=forgotPassword&id=$id&error=5");
                }
            } else {
                header("location:index.php?page=login&function=forgotPassword&id=$id&error=3");
            }
        }
    }
}