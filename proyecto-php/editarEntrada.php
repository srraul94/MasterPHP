<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php require_once 'includes/conexion.php'; ?>


<?php $entrada_actual = conseguirEntrada($db, $_GET['id']);
if (!isset($entrada_actual['id'])) {
    header("Location: index.php");
}

?>

<!-- aside -->
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php' ?>

<!-- caja principal -->
<div id="principal">
    <h1>Editar Entrada</h1>
    <p>
        Edita tu entrada <?=$entrada_actual['titulo'] ?>
    </p>
    <br>

    <form action="guardarEntrada.php?editar=<?=$entrada_actual['id'] ?>" method="POST">
        <label for="titulo">Titulo de la entrada</label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo'] ?>">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ?>


        <label for="descripcion">Descripción de la entrada</label>
        <textarea  name="descripcion" > <?=$entrada_actual['descripcion'] ?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ?>


        <label for="categoria">Categoría de la entrada</label>
        <select name="categoria">
            <?php $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
            <option value="<?=$categoria['id']?>"
            <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
                 <?=$categoria['nombre']?>
            </option>

            <?php
                endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '' ?>


        <input type="submit" value="Guardar">

    </form>
   
    <?php borrarErrores();?>
</div>


<!-- footer --->
<?php require_once 'includes/pie.php' ?>