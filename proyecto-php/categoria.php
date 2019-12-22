<?php require_once 'includes/helpers.php';?>
<?php require_once 'includes/conexion.php';?>

<?php $categoria_actual = conseguirCategoria($db,$_GET['id']);
    if(!isset($categoria_actual['id'])){
        header("Location: index.php");
    }

?>

<!-- aside -->
<?php require_once 'includes/cabecera.php';?>
<?php require_once 'includes/lateral.php' ?>

<!-- caja principal -->
<div id="principal">
  
    <h1>En entradas de <?= $categoria_actual['nombre']?></h1>
    <?php $entradas = conseguirEntradas($db,$_GET['id']);
    if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
        while ($entrada = mysqli_fetch_assoc($entradas)) : ?>

            <article class="entrada">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?= $entrada['titulo'] ?></h2>
                    <span class="fecha">
                        <?= $entrada['categoria']. ' | '. $entrada['fecha'] ?>
                    </span>
                    <p>
                        <?=substr($entrada['descripcion'],0,200)."..." ?>
                    </p>
                </a>
            </article>
    <?php endwhile;
        else:

     ?>
     <div class="alerta">No hay entradas en esta categoría</div>
        <?php endif; ?>
</div>

<!-- footer --->
<?php require_once 'includes/pie.php' ?>
</body>

</html>



<?php










?>