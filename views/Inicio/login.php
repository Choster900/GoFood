<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?=constant('URL')?>public/css/login.css">
    <title>Iniciar Sesion</title>
  </head>

  <body>
	
	<div class="container">
		<div class="login login-1">
			<header class="login--header login-1--header text-center">
				<span class="icon icon-medium fa fa-lock"></span>
				<h3>login</h3>
				<span class="arrow-down login--header__arrow"></span>
			</header>
			<form class="login--form" action="<?=constant('URL')?>inicio/foremost" method="POST" id="frmLogin">
				<div class="login--form__input-area input-group">
					<span class="input-group-addon"><span class="fa fa-user"></span></span>
					<input type="email" class="form-control" name = "txtCorreo" placeholder="Correo electronico" />
				</div>
				<div class="login--form__input-area input-group">
					<span class="input-group-addon"><span class="fa fa-lock"></span></span>
					<input type="password" class="form-control" name = "txtpass" placeholder="Contraseña" />
				</div>
				<button class="login--form__button btn btn-default">Entrar</button>
			</form>
            <footer>
				<p class="login--footer__text">¿No tienes una cuenta?<strong><a href="<?=constant('URL')?>accounts/createCounts">Registrate aquí</a></strong></p>
			</footer>
		</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>