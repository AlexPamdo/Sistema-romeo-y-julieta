<?php

function render()
{
    include_once("views/patrones.php");
}

include_once("model/patronesModel.php");

class crearPatron
{
    function create()
    {

        $patrones = new patrones();

        if (!empty($_POST["btnCrearPatron"])) {

            $patrones->setAtribute("prenda", $_POST["prenda"]);
            $patrones->setAtribute("material", $_POST["material"]);
            $patrones->setAtribute("cantidad", $_POST["cantidad"]);
            $patrones->setPrecio($_POST["material"], $_POST["cantidad"]);

            if ($patrones->create()) {
                header("location:index.php?page=patrones&succes=1");
            } else {
                header("location:index.php?page=patrones&error=1");
            }
        }
        include("views/patrones/crear.php");
    }
}

class editarPatron
{
    function edit()
    {
        $patrones = new patrones();

        if (!empty($_POST["btnEditarPatron"])) {

            $id = $_POST["id"];

            $patrones->setAtribute("prenda", $_POST["prenda"]);
            $patrones->setAtribute("material", $_POST["material"]);
            $patrones->setAtribute("cantidad", $_POST["cantidad"]);
            $patrones->setPrecio($_POST["material"], $_POST["cantidad"]);

            if ($patrones->edit($id)) {
                header("location:index.php?page=patrones&succes=2");
            } else {
                header("location:index.php?page=patrones&error=2");
            }
        }
    }
}

class eliminarPatron
{
    function delete()
    {
        $patrones = new patrones();

        if (!empty($_GET["btnDelete"])) {

            $id = $_GET["id"];

            if ($patrones->delete($id)) {
                header("location:index.php?page=patrones&succes=3");
            } else {
                header("location:index.php?page=patrones&error=3");
            }
        }
    }
}