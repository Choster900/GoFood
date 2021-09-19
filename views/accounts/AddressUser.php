<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direccion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=constant('URL')?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=constant('URL')?>public/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/design.css">
    <!-- validetta -->
    <link href="<?=constant('URL')?>public/validetta/valideta.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="restaurant-lp">

    <!--Navigation & Intro-->


    
    <!-- Inicio Pantalla modal -->
    <div class="container">
        <div class="modal" tabindex="-1" id="modal1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="container">

                            <div class="row">
                                <form action="<?=constant('URL')?>Accounts/Address" method="POST" id="frmAdress">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="txtTipo" class="form-control"
                                            data-validetta="required" />
                                        <label class="form-label" for="form1Example1">Tipo Producto</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <button href="" class="btn btn-primary btn-sm px-3" id="btnTypeProduct">
                                                <i class="fas fa-check"></i>ADD
                                            </button>
                                        </div>
                                        <div class="col">
                                            <a href="">Gestionar los tipos de productos</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Fin de pantalla modal -->


    <!--Main content-->
    <main>
        <div class="container">
            <div class="row justify-content-center vh-100">
                <div class="col-lg-10 text-center" style="margin-top: 200px;">
                    <div class="row justify-content-center">
                        <h2>Agrege sus datos personales <?=$_SESSION['nombre']?></h2>
                    </div>
                    <br>
                    <form action="<?=constant('URL')?>accounts/Address" method="POST" id="frmCreate">
                        <div class="row">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <input type="text" name="txtMunicipio" class="form-control is-valid"
                                            id="validationServer01" required />
                                        <label class="form-label">Municipio</label>
                                        <div class="valid-feedback">Please choose a Nick Name.</div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <input type="text" name="txtCalle" class="form-control is-valid"
                                            id="validationServer01" required />
                                        <label class="form-label">Calle</label>
                                        <div class="valid-feedback">Please choose a Nick Name.</div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="input-group form-outline">

                                        <input type="text" name="txtRef" class="form-control is-valid"
                                            id="validationServerUsername" aria-describedby="inputGroupPrepend3"
                                            required />
                                        <label for="validationServerUsername" class="form-label">Lugar de
                                            referencia</label>
                                        <div class="valid-feedback">Opcional</div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <input type="text" name="txtTel" class="form-control is-valid"
                                            id="validationServer02" required />
                                        <label for="validationServer02" class="form-label">Telefeono</label>
                                        <div class="valid-feedback">Opcional</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <input type="text" name="txtTel2" class="form-control is-valid"
                                            id="validationServer02"/>
                                        <label for="validationServer02" class="form-label">Telefono 2</label>
                                        <div class="valid-feedback">Opcional</div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <select name="sDepa" id="" class="form-select is-valid" required>
                                            <option value="">Departamentos</option>
                                            <?php
                                        $depa = $this->departamentos;
                                        foreach ($depa as $value) {
                                            ?>
                                            <option value="<?=$value['Id']?>"><?=$value['nameDepartament']?></option>
                                            <?php
                                        }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-info" id="btnENviar">Enviar datos</button>
                        </div>
                    </form>

                    <br>

                    </form>
                </div>
            </div>
    </main>
    <!--/Main content-->

    <!--Footer-->
    <?php
    require_once 'views/footer.php';
    ?>
    <!-- MDB -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/mdb.min.js"></script>
    <script src="<?=constant('URL')?>public/js/design.js"></script>

    <script src="<?=constant('URL')?>public/validetta/validetta.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LeMvM4aAAAAAG1eaSC9Y1x03h9dBP8I_yYXQwMk"></script>
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function () {
                grecaptcha.execute('reCAPTCHA_site_key', {
                    action: 'submit'
                }).then(function (token) {
                    // Add your logic to submit to your backend server here.
                });
            });
        }
    </script>
</body>

</html>