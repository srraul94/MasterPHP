<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>
    <?php if(isset($_SESSION['admin'])): ?>
        <h3>Cambiar estado</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id" >
            <select name="estado">
                <option value="confirm" <?=$pedido->estado == 'confirm' ? 'selected':'' ?> >Pendiente</option>
                <option value="preparation" <?=$pedido->estado == 'preparation' ? 'selected':'' ?>>Preparation</option>
                <option value="ready" <?=$pedido->estado == 'ready' ? 'selected':'' ?>>Ready</option>
                <option value="sent" <?=$pedido->estado == 'sent' ? 'selected':'' ?>>Sent</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
    <?php endif; ?>
    <br>
    <hr>
    <h3>Dirección del pedido:</h3>
    <br>
    Provincia: <?= $pedido->provincia ?><br>
    Localidad: <?= $pedido->localidad ?><br>
    Dirección: <?= $pedido->direccion ?><br>
    <br>

    <hr>
    <h3>Datos del pedido:</h3>
    <br>

    Nª pedido: <?= $pedido->id ?><br>
    Total a pagar: <?= $pedido->coste ?>€<br>
    Estado: <?= Utils::showStatus($pedido->estado) ?><br>
    Productos:
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?=base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
                    <?php else : ?>
                        <img src="<?=base_url ?>assets/img/camiseta.png" class="img_carrito" />
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                </td>
                <td>
                    <?= $producto->precio ?>
                </td>
                <td>
                    <?= $producto->unidades ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

<?php endif; ?>