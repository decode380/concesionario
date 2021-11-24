<?php include 'inc/Header.php';
$url = base_url();

?>
<title>Iniciar sesión</title>
</head>
<body>
    <input type="hidden" value="<?php echo $url;?>" id="base-url">
    <div class="header-login mt-2">
        <h1 class="text-center header-login-text">Sistema de comercialización de vehículos</h1>
    </div> <!--Header-->
    <div class="container mt-3">
        <form class="mt-3 form-login card" action="">
            <h4 class="text-center">Iniciar Sesión</h4>
            <div class="form-group mt-2">
                <label class="text-center">Nombre de Usuario</label>
                <input class="form-control form-control-sm" required type="text" id="login-usr">
            </div>

            <div class="form-group mt-4">
                <label class="text-center">Contraseña</label>
                <input class="form-control form-control-sm" required type="password" id="login-pass">
            </div>
            <div class="alert-dialog-login mt-3" id="alert-dialog-login">
                <label class="label-alert">Usuario o contraseña incorrecto</label>
                <i class="fas fa-times btn-close-alert" id="btn-close-alert-login"></i>
            </div>
            <button class="btn btn-primary mt-4" type="submit">Iniciar sesión</button>
        </form>
    </div> <!-- container-->

<?php include 'inc/Footer.php';?>