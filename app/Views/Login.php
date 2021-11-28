<?php include 'inc/Header.php';
$url = base_url();

?>
<title>Iniciar sesión</title>
</head>
<body>
    <input type="hidden" value="<?php echo $url;?>" id="base-url">
    <div class="header-login mt-2">
        <h1 class="text-center header-login-text">Sistema para comercialización de vehículos</h1>
    </div> <!--Header-->
    <div class="container mt-3">
        <form class="mt-3 form-login" action="">
            <h4 class="text-center">Ingrese la información solicitada para ingresar al sistema</h4>
            <div class="form-group mt-2">
                <label>Usuario</label>
                <input class="form-control form-control-sm" required type="text" id="login-usr">
            </div>

            <div class="form-group mt-4">
                <label>Contraseña</label>
                <input class="form-control form-control-sm" required type="password" id="login-pass">
            </div>
            <button class="btn btn-primary mt-4" type="submit">Ingresar</button>
            <div class="alert-dialog-login mt-3" id="alert-dialog-login">
                <label class="label-alert">Usuario o contraseña invalido</label>
            </div>
        </form>
    </div> <!-- container-->

<?php include 'inc/Footer.php';?>