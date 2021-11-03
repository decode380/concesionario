<?php include 'inc/Header.php';
$url = base_url();
session_start(['name'=>'SPM']);
?>
<title>Editar Usuario</title>
</head>
<body>
<input type="hidden" value="<?php echo $url;?>" id="base-url">
    <div class="container mt-3">
        <div class="header">
            <h1 class="header-text">Modificar mi usuario</h1>
            <div>
                <i class="fas fa-sign-out-alt btn-logout"></i>
            </div>
        </div> <!--Header-->

        <form class="form-two-columns form-update-user">
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÁáÉéÍíÓóÚúÑñ]{3,15}" value="<?php echo $firstname;?>" id="update-user-firstname">
            </div>

            <div class="form-group">
                <label>Apellidos</label>
                <input class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÁáÉéÍíÓóÚúÑñ]{3,15}" value="<?php echo $lastname;?>" id="update-user-lastname">
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input class="form-control form-control-sm" required type="text" pattern="[0-9-+]{6,20}" value="<?php echo $phone;?>" id="update-user-phone">
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input class="form-control form-control-sm" required type="email" value="<?php echo $email;?>" id="update-user-email">
            </div>

            <a href="<?php echo base_url('index');?>" class="btn btn-danger">Cancelar</a>
            <button class="btn btn-primary" type="submit">Actualizar</button>
        </form>

    </div> <!-- container-->
<?php include 'inc/Footer.php';?>
