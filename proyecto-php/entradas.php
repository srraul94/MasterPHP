<?php
require_once 'includes/cabecera.php';
?>



<!-- aside -->
<?php require_once 'includes/lateral.php' ?>

<!-- caja principal -->
<div id="principal">
    <h1>Últimas entradas</h1>
    <?php $entradas = conseguirEntradas($db,$categoria);
    if (!empty($entradas)) :
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
    endif; ?>
</div>

<!-- footer --->
<?php require_once 'includes/pie.php' ?>
</body>

</html>



<?php










?>