<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- caja principal -->
<div id="principal">
    <h1>Crear Categoría</h1>
    <p>
        Añade nuevas categorías al blog!
    </p>
    <br>

    <form action="guardarCategoria.php" method="POST">
        <label for="nombre">Nombre de la categoría</label>
        <input type="text" name="nombre" >

        <input type="submit" value="Guardar">

    </form>

</div>

<!-- footer --->
<?php require_once 'includes/pie.php' ?>