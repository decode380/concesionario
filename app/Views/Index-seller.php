<?php include 'inc/Header.php';
$url = base_url();
session_start(['name'=>'SPM']);
?>
<title>Inicio</title>
</head>
<body>
    <input type="hidden" value="<?php echo $url;?>" id="base-url">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand">Usuario Vendedor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if($_SESSION['usurol'] == 3): ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Seleccionar rol
                        </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item disabled">Vendedor</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url("/switch_rol");?>">Comprador</a></li>
                            </ul>
                        </li>
                    <?php endif;?>
                </ul>
                <div class="d-flex">
                        <a href="<?php echo base_url('edit-user');?>" class="btn-edit-user">Editar usuario</a>
                        <a href="" class="btn-logout">Salir</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <form class="mt-3 form-insert-car-seller p-3" action="">
            <h5>Registrar nuevo automovil</h5>
            <div class="form-group mt-2">
                <label>Placa</label>
                <input id="id-car" class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÑñ0-9]{6}">
            </div>

            <div class="form-group mt-2">
                <label>Marca</label>
                <input class="form-control form-control-sm" required type="text" id="make-car">
            </div>

            <div class="form-group">
                <label>Modelo</label>
                <input class="form-control form-control-sm" required type="text" pattern="[0-9]{4}" id="model-car">
            </div>

            <div class="form-group mt-2">
                <label>Color</label>
                <input class="form-control form-control-sm" required type="text" id="color-car">
            </div>

            <div class="form-group">
            <label>Categoría</label>
            <select class="form-control form-control-sm" id="category-car">
                <?php foreach($categories as $index => $row):?>
                    <option value="<?php echo $categories[$index];?>"><?php echo $categories[$index];?></option>
                <?php endforeach;?>
            </select>

            <div class="form-group mt-2">
                <label>Estado</label>
                <select class="form-control form-control-sm" id="type-car">
                    <option value="Usado">Usado</option>
                    <option value="Nuevo">Nuevo</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label>Precio</label>
                <input class="form-control form-control-sm" required type="text" pattern="[0-9]{5,}" id="price-car">
            </div>

            <button type="submit" class="btn btn-primary mt-2" style="width:100%;">Registrar</button>

            <div class="alert-dialog-carrepeat mt-3" id="alert-dialog-carrepeat">
                <label class="label-alert">La placa ya está registrada</label>
            </div>
        </form>
    </div> <!-- container-->
<?php include 'inc/Footer.php';?>