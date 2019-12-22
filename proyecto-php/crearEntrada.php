<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- caja principal -->
<div id="principal">
    <h1>Crear Entradas</h1>
    <p>
        Añade nuevas entradas al blog!
    </p>
    <br>

    <form action="guardarEntrada.php" method="POST">
        <label for="titulo">Titulo de la entrada</label>
        <input type="text" name="titulo" >
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ?>


        <label for="descripcion">Descripción de la entrada</label>
        <textarea  name="descripcion" ></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ?>


        <label for="categoria">Categoría de la entrada</label>
        <select name="categoria">
            <?php $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
            <option value="<?=$categoria['id']?>">
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
