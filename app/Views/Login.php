<?php include 'inc/Header.php';
$url = base_url();

?>
<title>Ingresar</title>
</head>
<body>
    <input type="hidden" value="<?php echo $url;?>" id="base-url">
    <div class="container mt-3">
        <div class="header-login">
            <h1 class="text-center header-login-text">Ingreso al sistema - Concesionario</h1>
        </div> <!--Header-->

        <form class="mt-3 form-login card" action="">
            <div class="form-group">
                <label>Usuario</label>
                <input class="form-control" required type="text" id="login-usr">
            </div>

            <div class="form-group mt-2">
                <label>Contraseña</label>
                <input class="form-control" required type="password" id="login-pass">
            </div>

            <button class="btn btn-primary mt-3" type="submit">Ingresar</button>
        </form>
    </div> <!-- container-->

<?php include 'inc/Footer.php';?>