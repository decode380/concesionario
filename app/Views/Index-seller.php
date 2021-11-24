<?php include 'inc/Header.php';
$url = base_url();
session_start(['name'=>'SPM']);
?>
<title>Inicio</title>
</head>
<body>
    <input type="hidden" value="<?php echo $url;?>" id="base-url">
    <div class="header mt-2">
        <?php if($_SESSION['usurol'] == 3): ?>
            <ul class="text-center">
                <a><li class="selected-rol">Vendedor</li></a>
                <a href="<?php echo base_url("/switch_rol");?>"><li>Comprador</li></a>
            </ul>
        <?php else:?>
            <ul class="text-center">
                <a><li class="selected-rol">Vendedor</li></a>
            </ul>
        <?php endif;?>
        <div>
            <a href="<?php echo base_url('edit-user');?>" class="btn-edit-user">Editar Usuario</a>
            <a href="" class="btn-logout">Cerrar Sesión</a>
        </div>
    </div> <!--Header-->
    <div class="container mt-3">
        <form class="mt-3 form-insert-car-seller card p-3" style="width:400px; margin:auto;" action="">
            <h5 class="text-center">Nuevo Automovil</h5>
            <div class="form-group mt-2">
                <label class="text-center">Marca</label>
                <input class="form-control form-control-sm" required type="text" id="make-car">
            </div>

            <div class="form-group">
                <label class="text-center">Modelo</label>
                <input class="form-control form-control-sm" required type="text" pattern="[0-9]{4}" id="model-car">
            </div>

            <div class="form-group mt-2">
                <label class="text-center">Placa</label>
                <input id="id-car" class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÑñ0-9]{6}">
            </div>

            <div class="form-group mt-2">
                <label class="text-center">Color</label>
                <input class="form-control form-control-sm" required type="text" id="color-car">
            </div>

            <div class="form-group">
            <label class="text-center">Categoría</label>
            <select class="form-control form-control-sm" id="category-car">
                <?php foreach($categories as $index => $row):?>
                    <option value="<?php echo $categories[$index];?>"><?php echo $categories[$index];?></option>
                <?php endforeach;?>
            </select>

            <div class="form-group mt-2">
                <label class="text-center">Estado</label>
                <select class="form-control form-control-sm" id="type-car">
                    <option value="Nuevo">Nuevo</option>
                    <option value="Usado">Usado</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label class="text-center">Precio</label>
                <input class="form-control form-control-sm" required type="text" pattern="[0-9]{5,}" id="price-car">
            </div>

            <div class="alert-dialog-carrepeat mt-3" id="alert-dialog-carrepeat">
                <label class="label-alert">La placa ya existe en el sistema</label>
                <i class="fas fa-times btn-close-alert btn-close-alert-carrepat"></i>
            </div>

            <button type="submit" class="btn btn-primary mt-2" style="width:100%;">Agregar</button>
        </form>
    </div> <!-- container-->
<?php include 'inc/Footer.php';?>