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
            <ul class="select-rol text-center">
                <a href="<?php echo base_url("/switch_rol");?>"><li>Vendedor</li></a>
                <a href=""><li  class="selected-rol">Comprador</li></a>
            </ul>
        <?php else:?>
            <ul class="select-rol text-center">
                <a href=""><li  class="selected-rol">Comprador</li></a>
            </ul>
        <?php endif;?>
        <div>
            <?php if($_SESSION['usurol'] == 3):?>
                <a href="<?php echo base_url('edit-user');?>" class="btn-edit-user">Editar Usuario</a>
            <?php endif;?>
            <a class="btn-logout" href="">Cerrar Sesión</a>
        </div>
    </div> <!--Header-->

    <div class="container mt-3">
        <div class="card p-4">
            <h5 class="text-center">Consultar según categoría</h5>
            <form class="mt-3" action="">
                <label>Seleccione la categoría por la cual desea consultar</label>
                <select class="form-control form-control-sm mb-2" id="category-search-bycategory">
                    <?php foreach($categories as $index => $row):?>
                        <option value="<?php echo $index;?>"><?php echo $row;?></option>
                    <?php endforeach;?>
                </select>
                <a id="btn-search-bycategory" class="btn btn-primary">Consultar</a>
            </form>
            <table class="table table-striped table-dark text-center mt-3">
                <thead>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Modelo</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Datos Vendedor</th>
                </thead>
                <tbody id="table-cars-by-category">
                    <!-- Table Cars By Category -->
                </tbody>
            </table>
        </div>

        <div class="card p-4 mt-3">
            <h5 class="modal-title text-center" id="modal-search-byprice-label">Consultar según el precio</h5>
            <label>Indique en que rango de precio desea consultar</label>
            <form class="form-search-byprice" action="">
                <div class="form-group">
                    <label>Desde</label>
                    <input class="form-control form-control-sm" required pattern="[0-9]{7,}" id="price-from-search-byprice">
                </div>
                <div class="form-group mb-3">
                    <label>Hasta</label>
                    <input class="form-control form-control-sm" required pattern="[0-9]{7,}" id="price-until-search-byprice">
                </div>
                <div><button type="submit" class="btn btn-primary">Consultar</button></div>
            </form>
            <table class="table table-striped table-dark text-center mt-3">
                <thead>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Modelo</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Teléfono del vendedor</th>
                </thead>
                <tbody id="table-cars-by-price">
                    <!-- Table Cars By Category -->
                </tbody>
            </table>
        </div>
    </div> <!-- container-->

<?php include 'inc/Footer.php';?>
