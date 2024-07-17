<head>
    <title>Usuarios</title>

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
                        <i class="fa-solid fa-users-gear fs-1"></i>
                        <h3 class="p-3">Usuarios</h3>
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
                    include_once("model/usuariosModel.php");
                    $usuarios = new usuarios();
                    $usuariosData = $usuarios->viewAll();
                    //funcion para crear
                    include_once("controllers/usuariosController.php");
                    $crearUsuario = new crearUsuario();
                    $crearUsuario->create();

                    //tabla para ver los usuarios
                    ?>

                    <div class="table-responsive p-3 bg-body-tertiary">

                        <table class="table p-5 my-table align-middle table-borderless">

                            <thead class="">
                                <tr>

                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Permisos</th>
                                    <th scope="col">Acciones</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($usuariosData as $usuario) :

                                ?>
                                    <tr>
                                        <td><?php echo ($usuario['id_usuario']) ?></td>
                                        <td><?php echo ($usuario['nombre_usuario']) ?></td>
                                        <td><?php echo ($usuario['apellido_usuario']) ?></td>
                                        <td><?php echo ($usuario['gmail_usuario']) ?></td>
                                        <td>

                                            <input type="password" class="password-table" id="passwordInput<?php echo ($usuario['id_usuario']) ?>" value="<?php echo htmlspecialchars($usuario["contraseña_usuario"]) ?>" readonly>
                                            <i class="fas fa-eye show-password-icon" id="togglePasswordIcon<?php echo ($usuario['id_usuario']) ?>" onclick="togglePasswordVisibility<?php echo ($usuario['id_usuario']) ?>()"></i>
                    </div>
                    <br><br>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js">
                    </script>
                    <script>
                        function togglePasswordVisibility<?php echo ($usuario['id_usuario']) ?>() {
                            var passwordInput = document.getElementById(
                                'passwordInput<?php echo ($usuario['id_usuario']) ?>');
                            var togglePasswordIcon = document.getElementById(
                                'togglePasswordIcon<?php echo ($usuario['id_usuario']) ?>');

                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                                togglePasswordIcon.classList.remove('fa-eye');
                                togglePasswordIcon.classList.add('fa-eye-slash');
                            } else {
                                passwordInput.type = 'password';
                                togglePasswordIcon.classList.remove('fa-eye-slash');
                                togglePasswordIcon.classList.add('fa-eye');
                            }
                        }
                    </script>
                    </td>
                    <td>
                        <?php echo ($usuario['nombre_rol']) ?>
                    </td>
                    <td class="d-flex">



                        <!--Formulario donde estaran los botones de editar y eliminar -->
                        <form class="d-flex" action="index.php" method="get">

                            <!--boton para abrir el modal para confirmar la eliminacion -->
                            <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo ($usuario['id_usuario']) ?>"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>

                            <!--boton para abrir el modal para confirmar la editacion -->
                            <button type="button" class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo ($usuario['id_usuario']) ?>"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></button>
                        </form>

                    </td>
                    <?php

                                    include("views/usuarios/editar.php");
                                    //modal para eliminar
                                    include("views/usuarios/eliminar.php") ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                </table>

                </div>
                <?php

                //funcion y para editar
                $editarUsuario = new editUsuario();
                $editarUsuario->edit();

                //funcion eliminar
                $eliminarUsuario = new eliminarUsuario();
                $eliminarUsuario->eliminar();

                include_once("views/usuarios/log.php");


                ?>
            </div>
        </div>

        </div>


    </main>



</body>

</html>