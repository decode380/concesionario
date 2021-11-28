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
            <a class="navbar-brand">Usuario Comprador</a>
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
                                    <li><a class="dropdown-item" href="<?php echo base_url("/switch_rol");?>">Vendedor</a></li>
                                    <li><a class="dropdown-item disabled">Comprador</a></li>
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

    <div class="container-fluid mt-3 main">
        <div class="p-3">
            <h5 class="text-center">Consultar por categoría</h5>
            <form class="mt-3" action="">
                <select class="form-control form-control-sm mb-2" id="category-search-bycategory">
                    <?php foreach($categories as $index => $row):?>
                        <option value="<?php echo $index;?>"><?php echo $row;?></option>
                    <?php endforeach;?>
                </select>
                <a id="btn-search-bycategory" class="btn btn-primary">Consultar</a>
            </form>
            <table class="table mt-3">
                <thead>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Vendedor</th>
                </thead>
                <tbody id="table-cars-by-category">
                    <!-- Table Cars By Category -->
                </tbody>
            </table>
        </div>

        <div class="p-3">
            <h5 class="modal-title text-center" id="modal-search-byprice-label">Consultar por rango de precio</h5>
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
            <table class="table mt-3">
                <thead>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Color</th>
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
