<?php include 'inc/Header.php';
$url = base_url();
session_start(['name'=>'SPM']);
?>
<title>Editar Usuario</title>
</head>
<body>
    <input type="hidden" value="<?php echo $url;?>" id="base-url">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <?php if($_SESSION['usurol'] == 3):?>
                <a class="navbar-brand">Editar usuario vendedor y comprador</a>
            <?php endif;
                if($_SESSION['usurol'] == 2):
            ?>
                <a class="navbar-brand">Editar usuario comprador</a>
            <?php endif;
                if($_SESSION['usurol'] == 1):
            ?>
                <a class="navbar-brand">Editar usuario vendedor</a>
            <?php endif;?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <div class="d-flex">
                        <a href="<?php echo base_url('edit-user');?>" class="btn-edit-user">Editar usuario</a>
                        <a href="" class="btn-logout">Salir</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <form class=" form-update-user p-3">
            <div class="form-group">
                <label>Nombres</label>
                <input class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÁáÉéÍíÓóÚúÑñ ]{3,30}" value="<?php echo $firstname;?>" id="update-user-firstname">
            </div>

            <div class="form-group mt-2">
                <label>Apellidos</label>
                <input class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÁáÉéÍíÓóÚúÑñ ]{3,30}" value="<?php echo $lastname;?>" id="update-user-lastname">
            </div>

            <div class="form-group mt-2">
                <label>Teléfono</label>
                <input class="form-control form-control-sm" required type="text" pattern="[0-9-+]{6,20}" value="<?php echo $phone;?>" id="update-user-phone">
            </div>

            <div class="form-group mt-2">
                <label>Correo</label>
                <input class="form-control form-control-sm" required type="email" value="<?php echo $email;?>" id="update-user-email">
            </div>

            <div class="mt-2">
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </div>
        </form>

    </div> <!-- container-->
<?php include 'inc/Footer.php';?>
