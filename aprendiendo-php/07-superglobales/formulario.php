<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Formulario HTML</title>
</head>

<body>
    <h1>Formulario en PHP</h1>
    <form method="POST" action="recibir.php">
        <p>
            <label for="nombre">Nombre</label>
            <input name="nombre" />
        </p>

        <p>
            <label for="apellidos">Apellidos</label>
            <input name="apellidos" />
        </p>

        <input type="submit" value="Enviar Datos"/>


    </form>

</body>

</html>