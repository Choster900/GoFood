<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea una cuenta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=constant('URL')?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=constant('URL')?>public/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/design.css">
    <!-- validetta -->
    <link rel="stylesheet" href="<?=constant('URL')?>public/validetta/validetta.min.css">


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
                                <form action="<?=constant('URL')?>type/AddTypeProduct" method="POST" id="frmType">
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
                        <h2>Cree una cuenta</h2>
                    </div>
                    <br>
                    <form action="<?=constant('URL')?>accounts/insertarUsuario" method="post" id="frmCreate">
                        <div class="row">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <input type="text" data-validetta="required" name="txtName" class="form-control is-valid"
                                            id="validationServer01" required/>
                                        <label class="form-label">Name User</label>
                                        <div class="valid-feedback">Please choose a Nick Name.</div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="input-group form-outline">
                                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                        <input type="email" data-validetta="required" required name="txtEmail" class="form-control is-valid"
                                            id="validationServerUsername" aria-describedby="inputGroupPrepend3"
                                             />
                                        <label for="validationServerUsername" class="form-label">Email Address</label>
                                        <div class="valid-feedback">Please choose a Email Address.</div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <div class="form-outline">
                                        <input type="password" data-validetta="required" required name="txtPass" class="form-control is-valid"
                                            id="validationServer02"  />
                                        <label for="validationServer02" class="form-label">Password</label>
                                        <div class="valid-feedback">Please choose a Password</div>
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
                            
                        </div>
                        <div class="col-12">
                        <button class="btn btn-info" id="btnENviar">Crear Cuenta</button>
                    </div>
                    </form>

                    <br>
                    
                    </form>
                </div>
            </div>
    </main>
    
    <!--/Main content-->

    <!--Footer-->
    
    <!-- MDB -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/mdb.min.js"></script>
    <script src="<?=constant('URL')?>public/js/design.js"></script>

    <script src="<?=constant('URL')?>public/validetta/validetta.min.js"></script>
    <script src="<?=constant('URL')?>public/js/AddUser.js"></script>

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