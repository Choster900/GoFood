<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FACTURA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?=constant('URL')?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=constant('URL')?>public/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/design.css">

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
    <main style="margin-top: 150px">
        <!-- Main Container -->
        <div class="container">

            <section class="section my-5 pb-5">

                <!-- Shopping Cart table -->
                <div class="table-responsive">

                    <table class="table product-table" id="table">

                        <!-- Table head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th class="font-weight-bold">
                                </th>
                                
                                <th class="font-weight-bold">
                                    <strong>NAME PRODUCTO</strong>
                                </th>
                                
                                <th class="font-weight-bold">
                                    <strong>DESCRIPCION</strong>
                                </th>
                                <th class="font-weight-bold">
                                    <strong>PRECIO</strong>
                                </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <!-- /.Table head -->

                        <!-- Table body -->
                        <tbody>

                            <!-- First row -->
                            
                            
                            <!-- TOTAL DE LOS PRODUCTOS CARGADOS -->
                            <!-- TODO:HACER QUE PASE EL TOTAL AQUI -->
                            <!-- <tr>
                                <td colspan="3"></td>
                                <td>
                                    <h4 class="mt-2">
                                        <strong>Total</strong>
                                    </h4>
                                </td>
                                <td class="text-right">
                                    <h4 class="mt-2">
                                        <strong>$2600</strong>
                                    </h4>
                                </td>
                                <td colspan="3" class="text-right">
                                    <button type="button" class="btn btn-primary btn-rounded">Complete purchase
                                        <i class="fa fa-angle-right right"></i>
                                    </button>
                                </td>
                            </tr> -->
                            

                        </tbody>
                        <!-- /.Table body -->

                    </table>

                </div>
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

    <script type="text/javascript" src="<?=constant('URL')?>public/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/popper.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/mdb.min.js"></script>
    <script type="text/javascript" src="<?=constant('URL')?>public/js/factura.js"></script>
    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>
    <script src="<?=constant('URL')?>public/js/design.js"></script>
</body>

</html>