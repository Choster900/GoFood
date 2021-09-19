<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafico de ventas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=constant('URL')?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=constant('URL')?>public/css/mdb.min.css" rel="stylesheet">
    <link href="<?=constant('URL')?>public/css/design.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?=constant('URL')?>public/chartphp/js/chartphp.js"></script>
    <link rel="stylesheet" href="<?=constant('URL')?>public/chartphp/js/chartphp.css">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
    rel="stylesheet"
    />
</head>

<body class="restaurant-lp">

    <!--Navigation & Intro-->
    <?php
    require_once 'views/navbar.php';
    ?>
    <!-- Intro Section -->

    <!--Main content-->
    <main>
    <br><br><br><br><br>
        <div class="container">

            <section class="section" id="specials">

                <!--Secion heading-->
                <div class="row mt-5 mb-4">
                    <div class="col-md-12 div-color-2">
                        <div class="divider-new">
                            <h3 class="text-center text-uppercase font-weight-bold mr-3 ml-3 wow fadeIn"
                                data-wow-delay="0.2s">GRAFICO DE VENTAS DIRIAS</h3>
                        </div>
                    </div>
                    <div class="col-md-12 div-color-2">
                        <?=$this->grafico?>
                    </div>
                    
                       
                </div>

                <!--Secion heading-->
                

            </section>

        </div>
        <br><br><br><br><br>
    </main>

    <?php
    require_once 'views/footer.php';
    ?>

    <script type="text/javascript" src="<?=constant('URL')?>public/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/mdb.min.js"></script>
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
    <script src="<?=constant('URL')?>public/js/design.js"></script>
</body>

</html>