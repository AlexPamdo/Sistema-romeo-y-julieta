<head>
    <title>Confecciones</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">



    <main class="row flex-nowrap">

        <!--Barra lateral-->
        <?php
        include("views/templates/Header.php");

        ?>


        <div class="col p-0">

            <header class=" p-3 bg-body-tertiary d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-pencil fs-1"></i>
                    <h3 class="p-3">Confecciones</h3>
                </div>

                <!--Aqui va el template del menu desplegable del perfil-->
                <?php
                include_once("views/templates/menuDesplegable.php")
                ?>
            </header>


            <!--contenido de la pagina-->

            <div class="ms-sm-auto p-0">

                <div class="p-4">
                    <nav class="navbar navbar-expand-lg d-flex justify-content-between p-3 row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#crearConfeccion">
                                Crear
                            </button>
                        </div>

                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#patrones">
                                Patrones
                            </button>
                        </div>

                        <form class="d-flex col-8 col-md-4" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search" />
                            <button class="btn btn-outline-success" type="submit">
                                Buscar
                            </button>
                        </form>
                    </nav>


                    <?php
                    //incluimos el model
                    include_once("model/confeccionesModel.php");
                    $confeccion = new confecciones();
                    $confeccionesData = $confeccion->viewAll();
                    //funcion para crear
                    include_once("controllers/confeccionesController.php");
                    $creaConfeccion = new crearConfeccion();
                    $creaConfeccion->create();
                    //funcion para eliminar
                    include_once("controllers/confeccionesController.php");
                    $eliminarConfeccion = new eliminarConfeccion;
                    $eliminarConfeccion->eliminar();

                    //incluimos los logs
                    include_once("views/confecciones/log.php");


                    //tabla para ver los usuarios
                    ?>

                    <div class="table-responsive p-3  bg-body-tertiary">

                        <table class="table my-table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Prenda</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Tiempo de fabricacion</th>
                                    <th scope="col">Fecha de fabricacion</th>
                                    <th scope="col">Empleado encargado</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($confeccionesData as $confeccion) :

                                ?>
                                    <tr>
                                        <td><?php echo ($confeccion['id_confeccion']) ?></td>
                                        <td><?php echo ($confeccion['id_prenda']) ?></td>
                                        <td><?php echo ($confeccion['cantidad']) ?></td>
                                        <td><?php echo ($confeccion['tiempo_fabricacion']) ?></td>
                                        <td><?php echo ($confeccion['fecha_fabricacion']) ?></td>
                                        <td><?php echo ($confeccion['id_empleado']) ?></td>

                                        <td class="d-flex">



                                            <!--Formulario donde estaran los botones de editar y eliminar -->
                                            <form class="d-flex" action="index.php" method="get">

                                                <!--boton para abrir el modal para confirmar la eliminacion -->
                                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo ($confeccion['id_confeccion']) ?>"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>

                                                <!--boton para abrir el modal para confirmar la editacion -->
                                                <button type="button" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo ($confeccion['id_confeccion']) ?>"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></button>
                                            </form>

                                        </td>
                                        <?php

                                        include("views/confecciones/editar.php");
                                        //modal para eliminar
                                        include("views/confecciones/eliminar.php") ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>

    <?php

    include_once("views/confecciones/patrones/tablaPatrones.php");


    ?>


</body>

</html>