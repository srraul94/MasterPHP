<?php if (isset($editar)) : ?>
    <h1>Crear nueva categoría</h1>
<?php endif; ?>

<div class="form_container">
    <form action="<?= base_url ?>categoria/save" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>

        <input type="submit" value="Guardar">

    </form>
</div>