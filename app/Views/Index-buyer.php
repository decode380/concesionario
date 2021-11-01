<?php include 'inc/Header.php';
$url = base_url();
session_start(['name'=>'SPM']);
?>
<title>Inicio</title>
</head>
<body>
    <input type="hidden" value="<?php echo $url;?>" id="base-url">
    <div class="container mt-3">
        <div class="header">
            <h1 class="header-text">Busqueda de automoviles</h1>
            <div>
                <?php if($_SESSION['usurol'] == 3):?>
                    <i class="fas fa-user-edit btn-edit-user"></i>
                <?php endif;?>
                <i class="fas fa-sign-out-alt btn-logout"></i>
            </div>
        </div> <!--Header-->

        <div class="row2">
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-search-bycategory-buyer">Buscar por Categoría</button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-search-byprice-buyer">Buscar por rango de precio</button>
            </div>
            <?php if($_SESSION['usurol'] == 3): ?>
                <ul class="select-rol text-center">
                <li><a class="" href="<?php echo base_url("/switch_rol");?>">Vendedor</a></li>
                <li><a class="select-rol-selected" href="">Comprador</a></li>
            </ul>
            <?php endif;?>
        </div>
    </div> <!-- container-->

        <!-- Modal -->
        <div class="modal fade" id="modal-search-bycategory-buyer" tabindex="-1" aria-labelledby="modal-search-bycategory-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-search-bycategory-label">Buscar por categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3 form-two-columns" action="">
                            <select class="form-control form-control-sm" name="" id="">
                                <option value="">Campero</option>
                                <option value="">Automovil</option>
                                <option value="">Camioneta</option>
                                <option value="">Otro</option>
                            </select>
                            <div><button class="btn btn-primary" type="submit">Buscar</button></div>
                        </form>
                        <table class="table text-center mt-3">
                            <thead>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Color</th>
                                <th>Estado</th>
                                <th>Precio</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2016</td>
                                    <td>Chevrolet</td>
                                    <td>Rojo</td>
                                    <td>Nuevo</td>
                                    <td>25000000</td>
                                    <td><a href="">Ver datos del vendedor</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!--Modal-->

        <!-- Modal -->
        <div class="modal fade" id="modal-search-byprice-buyer" tabindex="-1" aria-labelledby="modal-search-byprice-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-search-byprice-label">Buscar por rango de precio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3 form-two-columns" action="">
                            <div class="form-group">
                                <label>Precio desde ($)</label>
                                <input class="form-control form-control-sm" type="text" name="" id="">
                            </div>
                            <div class="form-group">
                                <label>Precio hasta ($)</label>
                                <input class="form-control form-control-sm" type="text" name="" id="">
                            </div>
                            <div><button class="btn btn-primary" type="submit">Buscar</button></div>
                        </form>
                        <table class="table text-center mt-3">
                            <thead>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Color</th>
                                <th>Estado</th>
                                <th>Precio</th>
                                <th>Teléfono del vendedor</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2016</td>
                                    <td>Chevrolet</td>
                                    <td>Rojo</td>
                                    <td>Nuevo</td>
                                    <td>25000000</td>
                                    <td>0328356789</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> <!--Modal-->
<?php include 'inc/Footer.php';?>