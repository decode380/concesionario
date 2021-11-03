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
            <h1 class="header-text">Mis automoviles registrados</h1>
            <div>
                <a href="<?php echo base_url('edit-user');?>"><i class="fas fa-user-edit btn-edit-user"></i></a>
                <i class="fas fa-sign-out-alt btn-logout"></i>
            </div>
        </div> <!--Header-->

        <div class="row2">
            <div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-insert-car-seller">Registrar nuevo automovil</button>
            </div>
            <?php if($_SESSION['usurol'] == 3): ?>
                <ul class="select-rol text-center">
                <li><a class="select-rol-selected" href="">Vendedor</a></li>
                <li><a class="" href="<?php echo base_url("/switch_rol");?>">Comprador</a></li>
            </ul>
            <?php endif;?>

        </div>

        <table class="table text-center mt-3">
            <thead>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Color</th>
                <th>Estado</th>
                <th>Precio</th>
            </thead>
            <tbody>
                <!-- Table cars -->
                <?php echo $table;?>
            </tbody>
        </table>
    </div> <!-- container-->


        <!-- Modal -->
        <div class="modal fade" id="modal-insert-car-seller" tabindex="-1" aria-labelledby="modal-insert-car-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-insert-car-label">Registrar nuevo automovil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-3 form-insert-car-seller" action="">
                            <div class="form-group mt-2">
                                <label>Placa</label>
                                <input id="id-car" class="form-control form-control-sm" required type="text" pattern="[a-zA-ZÑñ0-9]{6}">
                            </div>

                            <div class="form-group">
                                <label>Modelo</label>
                                <input class="form-control form-control-sm" required type="text" pattern="[0-9]{4}" id="model-car">
                            </div>

                            <div class="form-group">
                            <label>Categoría</label>
                            <select class="form-control form-control-sm" id="category-car">
                                <?php foreach($categories as $index => $row):?>
                                    <option value="<?php echo $categories[$index];?>"><?php echo $categories[$index];?></option>
                                <?php endforeach;?>
                            </select>
                
                            <div class="form-group mt-2">
                                <label>Marca</label>
                                <input class="form-control form-control-sm" required type="text" id="make-car">
                            </div>
    
                            <div class="form-group mt-2">
                                <label>Color</label>
                                <input class="form-control form-control-sm" required type="text" id="color-car">
                            </div>
    
                            <div class="form-group mt-2">
                                <label>Estado</label>
                                <select class="form-control form-control-sm" id="type-car">
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Usado">Usado</option>
                                </select>
                            </div>
    
                            <div class="form-group mt-2">
                                <label>Precio</label>
                                <input class="form-control form-control-sm" required type="text" pattern="[0-9]{5,}" id="price-car">
                            </div>

                            <div class="form-group mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!--Modal-->
<?php include 'inc/Footer.php';?>