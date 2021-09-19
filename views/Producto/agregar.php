<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoFood</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=constant('URL')?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=constant('URL')?>public/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/design.css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/validetta/validetta.min.css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/SweetAlert/sweetalert2.min.css">
</head>

<body class="restaurant-lp">

    <!--Navigation & Intro-->
    <?php
    require_once 'views/navbar.php';
    ?>
    <!-- Intro Section -->

    <!--Main content-->
    <main style="margin-top: 200px">
        <!-- Main Container -->
        <div class="container">
            <h1 class="display-4">Agrega Productos</h1>
            <section class="section my-5 pb-5">

                <!-- Shopping Cart table -->
                <form class="row g-3 needs-validation" action="<?=constant('URL')?>producto/agregarProducto" method="POST" id="FrmProducto" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 position-relative">
                            <div class="form-outline">
                                <input type="text" name="txtNombreProducto" class="form-control"
                                    id="validationTooltip01" data-validetta="required">
                                <label for="validationTooltip01" class="form-label">Nombre del producto</label>
                            </div>
                        </div>
                        <div class="col-md-2 position-relative">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="txtPrecio" data-validetta="required,number"/>
                                <label class="form-label">Precio</label>

                            </div>
                        </div>
                        <div class="col-md-2 position-relative">
                            <div class="form-outline">
                                <input type="text" class="form-control" name="txtStok" data-validetta="required,number"/>
                                <label class="form-label">Stok</label>
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <input class="form-control" type="file" name="fileImage" multiple data-validetta="required"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6" style="margin-top: 10px">
                            <div class="form-outline">
                                <textarea class="form-control" name="txtDescripcion" rows="4" data-validetta="required"></textarea>
                                <label class="form-label" >Descripcion del Producto</label>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px">
                            <div class="row">
                                <div class="col-md-5">
                                    <select name="sCateg" id="" class="form-select" data-validetta="required">
                                        <option value="">Categoria</option>
                                        <?php
                                            $categoria = $this->categoria;
                                            foreach ($categoria as $value) {
                                        ?>
                                            <option value="<?=$value['Id']?>"><?=$value['nombreCateg']?></option>
                                        <?php      
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="sEstado" class="form-select" data-validetta="required">
                                        <option value="">Estado</option>
                                        <option value="1">Existente</option>
                                        <option value="2">Inexistente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 pt-2">
                        <button class="btn btn-primary" id="btnAdd">Submit form</button>
                    </div>
                </form>
                <!-- Shopping Cart table -->

            </section>

        </div>
        <!-- /Main Container -->

    </main>

    <?php
        require_once 'views/footer.php';
    ?>
        <script>
            var url = '<?=constant('URL')?>';
        </script>
   
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/mdb.min.js"></script>

    <script src="<?=constant('URL')?>public/SweetAlert/sweetalert2.min.js"></script>

    <script src="<?=constant('URL')?>public/validetta/validetta.min.js"></script>
    <script src="<?=constant('URL')?>public/validetta/validettaLang-es-ES.js"></script>
    <script src="<?=constant('URL')?>public/js/design.js"></script>

    <script src="<?=constant('URL')?>public/js/productoAll.js"></script>

    
</body>

</html>