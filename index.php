<?php
session_start();
if(isset($_GET["cerrarSesion"])){
    session_destroy();
}
require ("logica/Producto.php");
require ("logica/Categoria.php");
require ("logica/Marca.php");
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
				<ul class="navbar-nav">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">Marca</a>
						<ul class="dropdown-menu">
                            <?php
                            $marca = new Marca();
                            $marcas = $marca->consultarTodos();
                            foreach ($marcas as $marcaActual) {
                                echo "<li><a class='dropdown-item' href='#'>" . $marcaActual->getNombre() . "</a></li>";
                            }
                            ?>
						</ul></li>
				</ul>
				<ul class="navbar-nav me-auto">
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
						href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">Categoria</a>
						<ul class="dropdown-menu">
                            <?php
                            $categoria = new Categoria();
                            $categorias = $categoria->consultarTodos();
                            foreach ($categorias as $categoriaActual) {
                                echo "<li><a class='dropdown-item' href='#'>" . $categoriaActual->getNombre() . "</a></li>";
                            }
                            ?>
						</ul></li>
				</ul>
				<ul class="navbar-nav">
				<li class="nav-item"><a href="iniciarSesion.php" class="nav-link"
					aria-disabled="true">Iniciar Sesion</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row mb-3">
			<div class="col">
				<div class="card border-primary">
					<div class="card-header text-bg-info">
						<h4>Tienda Anonima</h4>
					</div>
					<div class="card-body">
    					<?php
                        $i = 0;
                        $producto = new Producto();
                        $productos = $producto->consultarTodos();
                        foreach ($productos as $productoActual) {
                            if ($i % 4 == 0) {
                                echo "<div class='row mb-3'>";
                            }
                            echo "<div class='col-lg-3 col-md-4 col-sm-6' >";
                            echo "<div class='card text-bg-light'>";
                            echo "<div class='card-body'>";
                            echo "<div class='text-center'><img src='https://icons.iconarchive.com/icons/custom-icon-design/mono-general-1/256/faq-icon.png' width='70%' /></div>";
                            echo "<a href='#'>" . $productoActual->getNombre() . "</a><br>";
                            echo "Cantidad: " . $productoActual->getCantidad() . "<br>";
                            echo "Valor: $" . $productoActual->getPrecioVenta() . "<br>";
                            echo "Marca: " . $productoActual->getMarca()->getNombre() . "<br>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                
                            if ($i % 4 == 3) {
                                echo "</div>";
                            }
                            $i ++;
                        }
                        if ($i % 4 != 0) {
                            echo "</div>";
                        }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>