<?php

session_start();
if(!isset($_SESSION["id"])){
    header("Location: iniciarSesion.php");
}

require_once("logica/Producto.php");
require_once("logica/Marca.php");
require_once("logica/Categoria.php");

if(isset($_POST["submit"])){
    $id = $_POST["idProducto"];
    $nombre = "'" . $_POST['nombre'] . "'";
    $cantidad = $_POST['cantidad'];
    $precioCompra = $_POST['precioCompra'];
    $precioVenta = $_POST['precioVenta'];
    $idMarca = $_POST['idMarca'];
    $idCategoria = $_POST['idCategoria'];
    $idAdministrador = $_SESSION["id"];

    $producto = new Producto();
    $producto -> insertar($id,$nombre,$cantidad,$precioCompra,$precioVenta,$idMarca,$idCategoria,$idAdministrador);
}
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
<form action="newProduct.php" method="POST">
    <label for="id">idProducto:</label>
    <input type="number" value="idProducto" name="idProducto" required><br><br>

    <label for="nombre">Nombre del Producto:</label>
    <input type="text" value="nombre" name="nombre" required><br><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" value="cantidad" name="cantidad" required><br><br>

    <label for="precioCompra">Precio de Compra:</label>
    <input type="number" value="precioCompra" name="precioCompra" required><br><br>

    <label for="precioVenta">Precio de Venta:</label>
    <input type="number" value="precioVenta" name="precioVenta" required><br><br>

    <label for="idMarca">Marca:</label><br>
    <?php
        $marca = new Marca();
        $marcas = $marca->consultarTodos();
        foreach ($marcas as $marcaActual) {
            echo '<input type="radio" value="' . $marcaActual->getIdMarca() . '" name="idMarca" required> ' . $marcaActual->getNombre() . '<br>';
        }
    ?>

    <label for="idCategoria">Categoría:</label><br>
    <?php
        $categoria = new Categoria();
        $categorias = $categoria->consultarTodos();
        foreach ($categorias as $categoriaActual) {
            echo '<input type="radio" value="' . $categoriaActual->getIdCategoria() . '" name="idCategoria" required> ' . $categoriaActual->getNombre() . '<br>';
        }
    ?>

    <button type="submit" name="submit">submit</button>
</form>

</body>

</html>
