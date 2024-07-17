<head>
    <title>Empleados</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">



    <main class="row flex-nowrap">

        <!--Barra lateral-->
        <?php
        include("views/templates/Header.php");

        ?>


        <div class="col p-0">
            <header class="bg-body-tertiary">
                <header class=" p-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-user fs-1"></i>
                        <h3 class="p-3">Empleados</h3>
                    </div>

                    <!--Aqui va el template del menu desplegable del perfil-->
                    <?php
                    include_once("views/templates/menuDesplegable.php")
                    ?>
                </header>
            </header>




            <!--contenido de la pagina-->
            <div class="ms-sm-auto p-0">

                <div class="p-4">
                    <nav class="navbar navbar-expand-lg d-flex justify-content-between p-3 row">
                        <div class="col-4 col-md-4">
                            <button type="button" class="btn btn-rj-blue" data-bs-toggle="modal" data-bs-target="#CrearModal">
                                Crear <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>

                        <form class="d-flex col-8 col-md-4" role="search">
                            <input class="form-control me-2" type="search" placeholder="Buscar Elemento" aria-label="Search" />
                            <button class="btn btn-success" type="submit">
                                Buscar
                            </button>
                        </form>
                    </nav>


                    <?php
                    //incluimos el model
                    include_once("model/empleadosModel.php");
                    $empleados = new empleados();
                    $empleadosData = $empleados->viewAll();
                    //funcion para crear
                    include_once("controllers/empleadosController.php");
                    $crearEmpleado = new crearEmpleado();
                    $crearEmpleado->create();

                    //tabla para ver los empleados
                    ?>
                    <div class="table-responsive p-3 bg-body-tertiary">

                        <table class="table p-5 my-table align-middle table-borderless">

                            <thead class="">
                                <tr>

                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Ocupacion</th>

                                    <th scope="col">Cedula</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($empleadosData as $empleado) :

                                ?>
                                    <tr>
                                        <td><?php echo ($empleado['id_empleado']) ?></td>
                                        <td><?php echo ($empleado['nombre_empleado']) ?></td>
                                        <td><?php echo ($empleado['apellido_empleado']) ?></td>
                                        <td><?php echo ($empleado['email_empleado']) ?></td>
                                        <td><?php echo ($empleado['telefono_empleado']) ?></td>
                                        <td><?php echo ($empleado['id_ocupacion']) ?></td>

                                        <td>
                                            <?php echo ($empleado['cedula_empleado']) ?>
                                        </td>
                                        <td class="d-flex">



                                            <!--Formulario donde estaran los botones de editar y eliminar -->
                                            <form class="d-flex" action="index.php" method="get">

                                                <!--boton para abrir el modal para confirmar la eliminacion -->
                                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo ($empleado['id_empleado']) ?>"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>

                                                <!--boton para abrir el modal para confirmar la editacion -->
                                                <button type="button" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo ($empleado['id_empleado']) ?>"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></button>
                                            </form>

                                        </td>
                                        <?php

                                        include("views/empleados/editar.php");
                                        //modal para eliminar
                                        include("views/empleados/eliminar.php") ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    <?php

                    //funcion y para editar
                    $editarEmpleado = new editEmpleado();
                    $editarEmpleado->edit();

                    //funcion eliminar
                    $eliminarEmpleado = new eliminarEmpleado();
                    $eliminarEmpleado->eliminar();



                    if (isset($_GET['succes'])) {
                        switch ($_GET['succes']) {
                            case 1:
                                echo "<script> Swal.fire({
  icon: 'success',
  title: 'empleado creado',
  showConfirmButton: false,
  timer: 1500
}); </script>";

                                break;
                            case 2:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'empleado eliminado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";
                                break;
                            case 3:
                                echo "<script> Swal.fire({
                                    icon: 'success',
                                    title: 'empleado editado',
                                    showConfirmButton: false,
                                    timer: 1500
                                  }); </script>";

                                break;
                        }
                    } elseif (isset($_GET['error'])) {
                        switch ($_GET['error']) {
                            case 3:
                                echo "<script> alertify.error('error al editar empleado'); </script>";
                        }
                    }
                    ?>
                </div>
            </div>

        </div>

    </main>
    <?php

    ?>

</body>

</html>