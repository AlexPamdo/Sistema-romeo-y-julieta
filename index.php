<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="libraries/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/style/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="libraries/swet alert 2/sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/8f46b2ad4d.js" crossorigin="anonymous"></script>
    <script src="libraries/swet alert 2/sweetalert2.all.min.js"></script>
    <script src="libraries/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</head>




<?php

session_start();


//variables para probar el inicio de seccion

/* if (isset($_SESSION['username'])) {
    echo "iniciaste session";
} else {
    echo "no has iniciado session";
}
 */

ob_start();

//funcion la cual nos ayudara a incluir los controladores
//Dependiendo que pagina se encuentre activa
function includeController($routes)
{
    require_once "controllers/$routes";
}

//obtenemos la informacion de la pagina a navegar mediante un get
$page = $_GET["page"] ?? "login"; //establecemos la pagina determinada como '/' si no se proporciona nada
$routes = $page . "Controller.php";

//if para verificar si el controlador existe
if ($routes) {

    //incluimos el controlador selecionado con la funcion hecha previamente
    includeController($routes);

    $action = "render";

    //preguntamos si existe la funcion 'render'
    if (function_exists($action)) {

        //si la seccion no esta iniciada redirigimos al login (el unico al que no le afecta es al login)
        if (!isset($_SESSION['username']) && $page != "login") {
            header('Location: index.php?page=login');
            exit;
        }

        $action();
    } else {
        http_response_code(404);
        echo 'Pagina no encontrada...';
    }
} else {
    http_response_code(404);
    echo 'Pagina no encontrada';
}

ob_end_flush();