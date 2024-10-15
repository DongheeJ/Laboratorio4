<?php
session_start();
if(!isset($_SESSION["id"])){
    header("Location: iniciarSesion.php");
}
$id = $_SESSION["id"];
require ("logica/Persona.php");
require ("logica/Administrador.php");
$administrador = new Administrador($id);
$administrador -> consultar();
?>
<html>
<head>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php include ("encabezado.php");?>

	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="#"><img src="img/logo2.png" width="50" /></a>
			<button class="navbar-toggler" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav me-auto">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">Producto</a>
						<ul class="dropdown-menu">
                            <li><a class='dropdown-item' href='newProduct.php'>Nuevo Producto</a></li>
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></a>
						<ul class="dropdown-menu">
                            <li><a class='dropdown-item' href='index.php?cerrarSesion=true'>Cerrar Sesion</a></li>
						</ul>
					</li>
				</ul>			
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="card border-primary">
					<div class="card-header text-bg-info">
						<h4>Sesion Administrador</h4>
					</div>
					<div class="card-body">
						<p>Bienvenido administrador <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></p>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>