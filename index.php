<?php
	session_start();

	$name = "";
	$email = "";
	$asunto = "";
	$mensaje = "";

	if($_POST){
		$_SESSION["ok"] = false;
		$errores = validador($_POST);

		if($_POST["nombre"])$name = $_POST["nombre"];
		if($_POST["email"])$email = $_POST["email"];
		if($_POST["asunto"])$asunto = $_POST["asunto"];
		if($_POST["mensaje"])$mensaje = $_POST["mensaje"];

		if(!count($errores)){
			$_SESSION["datos"] = $_POST;
			header("Location:send_email.php");
		}
	}


function validador(array $datos): array{
	$errores = [];

	foreach($datos as $dato){
		if(!is_array($dato))trim($dato);
	}

	if($datos["nombre"]=="")$errores["emptyName"] = true;
	if(strlen($datos["nombre"]) < 5 || strlen($datos["nombre"]) > 30)$errores["lenNameError"] = true;
	if(!filter_var($datos["email"], FILTER_VALIDATE_EMAIL))$errores["emailError"] = true;
	if(!isset($datos["asunto"]) && empty($name))$errores["emptySubject"] = true;
	if(strlen($datos["asunto"]) < 10 || strlen($datos["asunto"]) > 40)$errores["lenSubjectError"] = true;

	return $errores;
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Lazaro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/icomoon.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/modernizr-2.6.2.min.js"></script>

	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">

	<header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image:url(images/cover_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t js-fullheight">
						<div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
							<div class="profile-thumb" style="background: url(images/user-3.jpg);"></div>
							<h2>Lazaro Onofre</h2>
							<h3><span>Software Developer</span></h3>
							<p>
								<ul class="fh5co-social-icons">
									<li><a href="https://facebook.com/lazarogaby"><i class="icon-facebook2"></i></a></li>
									<li><a href="https://www.linkedin.com/in/lazaro-onofre"><i class="icon-linkedin2"></i></a></li>
									<li><a href="https://www.instagram.com/lazarasaza/"><i class="icon-instagram"></i></a></li>
									<li><a href="https://github.com/lazarogabriel"><i class="icon-github"></i></a></li>
									<li><a href="https://www.codewars.com/users/lazzaro"><i class="icon-code"></i></a></li>

								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-about" class="animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Sobre mi</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<ul class="info">
						<li><span class="first-block">Nombre completo:</span><span class="second-block">Onofre, Lazaro Gabriel</span></li>
						<li><span class="first-block">Telefono:</span><span class="second-block">+54 011 2389 2175</span></li>
						<li><span class="first-block">Email:</span><span class="second-block">lazarogabriel2000<br>@gmail.com</span></li>
						<li><span class="first-block">Ubicacion:</span><span class="second-block">Argentina, Buenos Aires</span></li>
					</ul>
				</div>
				<div class="col-md-8">
					<h2>Historia academica</h2>
					<p>Actualmente cursando la carrera de Licenciatura en Sistemas, a su vez realizando un curso de Desarrollo web full stack en Digital House. De carácter proactivo, me gustan los desafíos, resolver problemas y trabajar en equipo. Actualmente tengo conocimientos en desarrollo front y back end. Tecnologías: HTML5, CSS3, PHP, C, Bootstrap, MySQL (WorkBench). Metodologías ágiles: GIT y SCRUM.</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="https://facebook.com/lazarogaby"><i class="icon-facebook2"></i></a></d>
							<li><a style="margin-left: 10px;" href="https://www.linkedin.com/in/lazaro-onofre"><i class="icon-linkedin2"></i></a></li>
							<li><a href="https://www.instagram.com/lazarasaza/"><i class="icon-instagram"></i></a></li>
							<li><a href="https://github.com/lazarogabriel"><i class="icon-github"></i></a></li>
							<li><a href="https://www.codewars.com/users/lazzaro"><i class="icon-code"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-resume" class="fh5co-bg-color">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Mi resumen</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<ul class="timeline">
						<li class="timeline-heading text-center animate-box">
							<div><h3>Experiencia</h3></div>
						</li>
						<li class="animate-box timeline-unverted">
							<div class="timeline-badge"><i class="icon-suitcase"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">ARQCO Construcción S.A.S.</h3>
									<span class="company">Desarrollo font y back end</span>
								</div>
								<div class="timeline-body">
									<p>diciembre de 2018 - febrero de 2019</p>
								</div>
							</div>
						</li>

						<li class="timeline-inverted animate-box">
							<div class="timeline-badge"><i class="icon-suitcase"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">D&S Frio y Calor</h3>
									<span class="company">Desarrollo font-end - En desarrollo</span>
								</div>
								<div class="timeline-body">
									<p>agosto de 2018 - noviembre de 2018</p>
								</div>
							</div>
						</li>
						<li class="animate-box timeline-unverted">
							<div class="timeline-badge"><i class="icon-suitcase"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">ArGames</h3>
									<span class="company">Desarrollo front y back kend - En desarrollo</span>
								</div>
								<div class="timeline-body">
									<p>Proyecto integrador academico</p>
								</div>
							</div>
						</li>

						<br>
						<li class="timeline-heading text-center animate-box">
							<div><h3>formacion Academica</h3></div>
						</li>
						<li class="timeline-inverted animate-box">
							<div class="timeline-badge"><i class="icon-graduation-cap"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">Lic. en Sistemas</h3>
									<span class="company">Universidad Nacional de Lanus</span>
								</div>
								<div class="timeline-body">
									<p>1º año - En curso (2019)</p>
								</div>
							</div>
						</li>
						<li class="animate-box timeline-unverted">
							<div class="timeline-badge"><i class="icon-graduation-cap"></i></div>
							<div class="timeline-panel">
								<div class="timeline-heading">
									<h3 class="timeline-title">Programacion Web Full Stack</h3>
									<span class="company">Digital House</span>
								</div>
								<div class="timeline-body">
									<p>En curso (2019)</p>
								</div>
							</div>
						</li>


			    	</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-features" class="animate-box">
		<div class="container">
			<div class="services-padding">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-xm-12 text-center">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-paintbrush"></i>
							</span>
							<div class="feature-copy">
								<h3>Diseño Web</h3>
								<p>Maquetacion de pagina web.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center">
							<div class="feature-left">
								<span class="icon">
									<i class="icon-genius"></i>
								</span>
								<div class="feature-copy">
									<h3>Desarrollo Web</h3>
									<p>Diseño y creación de sistemas web.</p>
								</div>
							</div>
						</div>

					<div class="col-md-4 text-center">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-search"></i>
							</span>
							<div class="feature-copy">
								<h3>Aplicaciones</h3>
								<p>Analisis, diseño y desarrollo de software.</p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="fh5co-work" class="fh5co-bg-dark">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Trabajos</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 text-center col-padding animate-box">
					<a href="https://dysfriocalor.herokuapp.com" class="work" style="background-image: url(images/portfolio-1.jpg);">
						<div class="desc">
							<h3>DyS Frio Calor</h3>
							<span>Pagina Web</span>
						</div>
					</a>
				</div>
				<div class="col-md-3 text-center col-padding animate-box">
					<a href="https://arqco.herokuapp.com" class="work" style="background-image: url(images/portfolio-2.jpg);">
						<div class="desc">
							<h3>ARQCO Construccion y Arquitectura</h3>
							<span>Pagina Web</span>
						</div>
					</a>
				</div>
			 <div class="col-md-3 text-center col-padding animate-box">
					<a href="http://argames.herokuapp.com/" class="work" style="background-image: url(images/portfolio-3.jpg);">
						<div class="desc">
							<h3>ArGames</h3>
							<span>Pagina Web</span>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>

	<div id="fh5co-consult">
		<div class="video fh5co-video" style="background-image: url(images/cover_bg_1.jpg);">
			<div class="overlay"></div>
		</div>
		<div class="choose animate-box">
			<h2 style="color: black;">Contacto</h2>
			<form action="" method="post" id="formulario">
				<div class="row form-group">
					<div class="col-md-12">
						<input name="nombre" value="<?=$name?>" type="text" id="name" class="form-control" placeholder="Introduzca su Nombre">
						<?php if($errores["emptyName"]):?> <p class="text-danger">Debe ingresar un nombre</p><?php endif;?>
						<?php if($errores["lenNameError"]): ?> <p class="text-danger">El nombre debe tener un minimo de 5 y un maximo de 30 caracteres.</p><?php endif;?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<input name="email" value="<?=$email?>" type="email" id="email" class="form-control" placeholder="Introduzca su Email">
						<?php if($errores["emailError"]):?> <p class="text-danger">Debe ingresar un email valido.</p> <?php endif;?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<input name="asunto" value="<?=$asunto?>" type="text" id="subject" class="form-control" placeholder="Asunto">
						<?php if($errores["lenSubjectError"]):?> <p class="text-danger">Debe ingresar un minimo de 10 y un maximo de 40 caracteres</p><?php endif;?>
						<?php if($errores["emptySubject"]):?> <p class="text-danger">Debe ingresar un asunto.</p><?php endif;?>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<textarea name="mensaje" id="message" cols="30" rows="10" class="form-control" placeholder="Mensaje..."><?=$mensaje?></textarea>
					</div>
				</div>
				<div class="form-group">
					<?php if ($_SESSION["ok"]): ?>
						<div class="alert alert-success" role="alert">El correo se envio correctamente!</div>
						<?php session_destroy(); ?>
					<?php elseif($_SESSION["fatal_send_error"]): ?>
					<div class="alert alert-danger" role="alert">El correo no se pudo enviar!</div>
					<?php session_destroy(); ?>
					<?php endif; ?>
					<button href="#formulario" type="submit" name="submit" class="btn btn-primary">Enviar mensaje</button>
				</div>
			</form>
		</div>
	</div>
	</div>

	<div id="fh5co-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>&copy; 2019 Todos los derechos reservados <br>Diseñado por <a href="http://www.lazzaro.website/" target="_blank">Lazzaro</a></p>
				</div>
			</div>
		</div>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up22"></i></a>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
