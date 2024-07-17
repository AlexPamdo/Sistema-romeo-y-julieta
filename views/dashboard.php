<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="Assets/style/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard</title>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll">



    <main class="row flex-nowrap">

        <!--Barra lateral-->
        <?php
        include("views/templates/Header.php");
        ?>


        <div class="col p-0">

            <header
                class="bg-body-tertiary p-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div>
                    <h1 id="welcome">Bienvenido
                        <?php echo $_SESSION["username"]
                        ?></h1>

                    <div class="d-flex  align-items-center">
                        <i class="fs-3 fa-solid fa-house"></i>
                        <h3 class="p-3">Dashboard</h3>
                    </div>
                </div>

                <!--Aqui va el template del menu desplegable del perfil-->
                <?php
                include_once("views/templates/menuDesplegable.php")
                ?>
            </header>


            <!--contenido de la pagina-->
            <div class="ms-sm-auto p-0">

                <div class="row container">

                    <!--Container prendas-->
                    <div class="m-3 prendas-rj d-flex bg-body-secondary">
                        <div class="col-lg-6 col-xl m-0 pt-3">
                            <div class="m-3 bg-body-secondary card-rj card-link card-body">
                                <a href="Inventario.html" class="text-primary-emphasis link-rj">
                                    <div class="d-flex text-center align-items-center">
                                        <i class='bx bxs-t-shirt bx-lg'></i>
                                        <p class="p-3 fs-2 fw-bolder card-title">Prendas</p>
                                    </div>

                                    <div class="row">


                                        <?php
                                        // Creamos una instancia de conexion para realizar las funciones en la bd



                                        ?>

                                        <div class="col">

                                            <p>Totales</p>
                                            99 </p>
                                        </div>
                                        <div class="col">
                                            <p>vendidas</p>
                                            <p class="fw-bolder fs-4">430</p>
                                        </div>
                                        <div class="col">
                                            <p>Stock</p>
                                            <p class="fw-bolder fs-4">430</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

                        <!--Niño-->
                        <div class="m-3 col-lg-6 col-xl m-0 pt-3">
                            <div class="bg-rj-blue text-white card-rj  card-body">

                                <div class="d-flex text-center align-items-center">
                                    <i class='bx bx-child bx-lg'></i>
                                    <p class="p-3 fs-2 fw-bolder card-title">Niños</p>
                                </div>

                                <div class="row">

                                    <div class="col">

                                        <p>Totales</p>
                                        <p class="fw-bolder fs-4">430</p>
                                    </div>
                                    <div class="col">
                                        <p>vendidas</p>
                                        <p class="fw-bolder fs-4">430</p>
                                    </div>
                                    <div class="col">
                                        <p>Stock</p>
                                        <p class="fw-bolder fs-4">430</p>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!--Niña-->
                        <div class="m-3 col-lg col-xl m-0 pt-3">

                            <div class="bg-rj-pink text-white card-rj  card-body">

                                <div class="d-flex text-center align-items-center">
                                    <i class='bx bx-child bx-lg'></i>
                                    <p class="p-3 fs-2 fw-bolder card-title">Niñas</p>
                                </div>

                                <div class="row">

                                    <div class="col">

                                        <p>Totales</p>
                                        <p class="fw-bolder fs-4">430</p>
                                    </div>
                                    <div class="col">
                                        <p>vendidas</p>
                                        <p class="fw-bolder fs-4">430</p>
                                    </div>
                                    <div class="col">
                                        <p>Stock</p>
                                        <p class="fw-bolder fs-4">430</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Usuarios-->
                    <div class="col-lg-6 col-xl-7 m-0 p-3">
                        <div class="bg-rj-blue text-white card-rj card-link card-body">
                            <a class="link-rj" href="Usuarios.html">

                                <div class="d-flex text-center align-items-center">
                                    <i class='bx bxs-user bx-lg'></i>
                                    <p class="p-3 fs-2 fw-bolder card-title">Usuarios</p>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <p class="">Registrados</p>
                                        <p class="fw-bolder fs-4">18</p>
                                    </div>
                                    <div class="col">
                                        <p class="">Administradores</p>
                                        <p class="fw-bolder fs-4">3</p>
                                    </div>
                                    <div class="col">
                                        <p class="">Usuarios Normales</p>
                                        <p class="fw-bolder fs-4">15</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <!--clientes-->
                    <div class="col-lg-7 col-xl-5 m-0 p-3">
                        <div class="bg-rj-blue text-white card-rj card-link card-body">
                            <a href="Clientes.html" class="link-rj">
                                <div class="d-flex text-center align-items-center">
                                    <i class='bx bxs-smile bx-lg' style='color:#ffffff'></i>
                                    <p class="p-3 fs-2 fw-bolder card-title">Clientes</p>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <p class="">Clientes Registrados</p>
                                        <p class="fw-bolder fs-4">540</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    <!--envios-->
                    <div class="col-lg col-xl m-0 p-3">
                        <div class="bg-rj-red text-white card-rj card-link card-body">
                            <a href="Envios.html" class="link-rj">
                                <div class="d-flex text-center align-items-center">
                                    <i class='bx bxs-plane-alt bx-lg'></i>
                                    <p class="p-3 fs-2 fw-bolder card-title">Envios</p>
                                </div>

                                <div class=" row">

                                    <div class="col">
                                        <p class="">Pendientes</p>
                                        <p class="fw-bolder fs-4">150</p>
                                    </div>
                                    <div class="col">
                                        <p>Entregados</p>
                                        <div class="d-flex align-items-center">
                                            <p class="fw-bolder fs-4">60</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>Cancelados</p>
                                        <div class="d-flex align-items-center">
                                            <p class="fw-bolder fs-4">60</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                    <!--Ventas-->
                    <div class="col-lg col-xl m-0 p-3">
                        <div class="bg-rj-red text-white card-rj card-link card-body">
                            <a href="Ventas.html" class="link-rj">
                                <div class="d-flex text-center align-items-center">
                                    <i class='bx bxs-dollar-circle bx-lg' style='color:#ffffff'></i>
                                    <p class="p-3 fs-2 fw-bolder card-title">Ventas</p>
                                </div>

                                <div class=" row">

                                    <div class="col">
                                        <p class="">Pendientes</p>
                                        <p class="fw-bolder fs-4">150</p>
                                    </div>
                                    <div class="col">
                                        <p>Entregados</p>
                                        <div class="d-flex align-items-center">
                                            <p class="fw-bolder fs-4">60</p>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p>Cancelados</p>
                                        <div class="d-flex align-items-center">
                                            <p class="fw-bolder fs-4">60</p>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>


                </div>


                <!-- !--segundo container del Dashboar--! -->

                <div class="row container m-2">

                    <div class="text-white p-1 col-lg col-md-12">
                        <div class="row p-1">
                            <a href="#" class="col card-link link-rj">
                                <div class="text-center m-1  card-rj bg-rj-lgreen">
                                    <p class="fs-2 "><i class='bx bxs-dollar-circle bx-lg'></i>Ingresos</p>
                                    <p class="fs-3 fw-bolder">4504$</p>
                                </div>
                            </a>
                            <a href="# p-1" class="col card-link link-rj">
                                <div class="text-center m-1 card-rj bg-rj-red">
                                    <p class="fs-2 "><i class='bx bx-trending-down bx-lg'></i>Egresos</p>
                                    <p class="fs-3 fw-bolder">3040$</p>
                                </div>
                            </a>
                        </div>
                        <a href="" class="col card-link link-rj">
                            <div class="text-center m-1 card-rj bg-rj-lpink">
                                <p class="fs-2 "><i class='bx bx-calculator bx-lg'></i>Totales</p>
                                <p class="fs-3 fw-bolder">1560$</p>
                                <button class="btn btn-rj-pink">Reporte detallado</button>
                            </div>
                        </a>
                    </div>


                </div>

                <!-- Tercer container del Dashboard -->

                <div class="row bg-body-secondary card-rj">

                    <div class="col-12 col-lg" id="prendas">
                        <div class="p-3 text-primary-emphasis">
                            <div class="d-flex align-items-center">
                                <i class='bx bx-male bx-lg'></i>
                                <p class="fs-2 fw-bolder">Proveedores</p>
                                <p>15</p>
                            </div>
                            <div class=" row">
                                <div class="p-1 col">
                                    <p class="">Registrados</p>
                                    <p class="fs-3 fw-bolder">10</p>
                                </div>

                                <div class="p-1 col">
                                    <p class="">Facturas</p>
                                    <p class="fs-3 fw-bolder">10</p>
                                </div>

                                <div class="row">
                                    <button class="col m-1 btn btn-rj-blue">Agendar Pedido</button>
                                    <a href="Proovedores.html" class="col m-1 link-rj btn btn-rj-blue">Editar Listas</a>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 text-primary-emphasis">
                            <div class="d-flex align-items-center ">
                                <i class='bx bxs-paint fs-2'></i>
                                <p class="p-3 fs-4 fw-bolder">Pedidos</p>
                                <p>15</p>
                            </div>
                            <div class=" row">
                                <div class="p-1 col">
                                    <p class="">Cantidad de pedidos</p>
                                    <p class="fs-3 fw-bolder">10</p>
                                </div>
                                <div class="p-1 col">
                                    <p class="">Pagados</p>
                                    <p class="fs-3 fw-bolder">10</p>
                                </div>
                                <div class="p-1 col">
                                    <p class="">No pagados</p>
                                    <p class="fs-3 fw-bolder">10</p>
                                </div>

                                <div class="row">
                                    <a href="Pedidos.html" class="col m-1 link-rj btn btn-rj-blue">Revisar Pedidos</a>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>






            </div>

        </div>

    </main>
    <?php
    include("views/proveedores/registrar.php");
    include("views/proveedores/editar.php");

    ?>
</body>

</html>