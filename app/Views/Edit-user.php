<?php include 'inc/Header.php';
$url = base_url();
session_start(['name'=>'SPM']);
?>
<title>Editar Usuario</title>
</head>
<body>
<input type="hidden" value="<?php echo $url;?>" id="base-url">
    <div class="container mt-3">

        <form class=" form-update-user card p-4" style="width:400px; margin:auto;">
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÁáÉéÍíÓóÚúÑñ]{3,15}" value="<?php echo $firstname;?>" id="update-user-firstname">
            </div>

            <div class="form-group mt-2">
                <label>Apellido</label>
                <input class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÁáÉéÍíÓóÚúÑñ]{3,15}" value="<?php echo $lastname;?>" id="update-user-lastname">
            </div>

            <div class="form-group mt-2">
                <label>Correo</label>
                <input class="form-control form-control-sm" required type="email" value="<?php echo $email;?>" id="update-user-email">
            </div>

            <div class="form-group mt-2">
                <label>Teléfono</label>
                <input class="form-control form-control-sm" required type="text" pattern="[0-9-+]{6,20}" value="<?php echo $phone;?>" id="update-user-phone">
            </div>

            <button class="btn btn-primary mt-3" type="submit">Actualizar</button>
            <a href="<?php echo base_url('index');?>" class="btn btn-primary mt-2">Regresar</a>
        </form>

    </div> <!-- container-->
<?php include 'inc/Footer.php';?>
