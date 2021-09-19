<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?=constant('URL')?>Inicio/foremost">
            <strong>GoFood</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ">
            <!--Links-->
            <ul class="navbar-nav mr-auto smooth-scroll">
                <li class="nav-item">
                    <a class="nav-link" href="<?=constant('URL')?>Inicio/foremost">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php
                    if ($_SESSION['rol']!=2) {

                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=constant('URL')?>orders/cart" data-offset="100">Carrito</a>
                    </li>
                
                
                <li class="nav-item">
                    <a class="nav-link" href="<?=constant('URL')?>orders/compras" data-offset="100">Compras</a>
                </li>
                <?php
                    }else{

                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="#specials" data-offset="100">Categorias</a>
                </li>
                <?php
                    if ($_SESSION['rol']==3) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=constant('URL')?>Administrador/manage" data-offset="100">Administrador</a>
                </li>
                <?php
                    }else if($_SESSION['rol']==2){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=constant('URL')?>Administrador/manage" data-offset="100">Administrador</a>
                </li>
                <?php
                    }
                ?>
                
                <!-- <li class="nav-item">
                    <a class="nav-link" data-offset="100">/a>
                </li> -->
            </ul>

            <!--Social Icons-->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fa fa-facebook light-green-text"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fa fa-twitter light-green-text"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fa fa-instagram light-green-text"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$_SESSION['nameUser']?>
                        <?=$_SESSION['Id']?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=constant('URL')?>inicio/logOut">LogOut</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?=constant('URL')?>inicio/create">Create Acount</a>

                        
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>