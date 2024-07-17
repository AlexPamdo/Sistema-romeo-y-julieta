<head>
    <title>Login</title>
</head>



<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin m-auto">
        <?php
        login();


        $olvideContraseña = new olvideContraseña();
        $olvideContraseña->verCorreo();

        $olvideContraseña->cambiarContraseña();


        //Creamos la variable la cual asignara el proceso actual, el default sera el login normal
        $function = $_GET["function"] ?? "login";

        if ($function === "login") {
            require "views/login/login.php";
        }

        //Si se pulso el olvidar contraseña
        elseif ($function === "forgotPassword") {
            require "views/login/cambiarContraseña.php";
        }


        ?>
    </main>
</body>


</html>