<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Validación de formularios en PHP</title>
</head>
<body>

    <?php
        if(isset($_GET['error'])){
            $error = $_GET['error'];
            if($error === 'faltan valores') {
                echo '<strong>'. 'Introduce todos los datos'.'</strong>';
            }

            if($error === 'nombre') {
                echo '<strong>'. 'Introduce bien el nombre'.'</strong>';
            }

            if($error === 'apellidos') {
                echo '<strong>'. 'Introduce bien el apellidos'.'</strong>';
            }

            if($error === 'contrasena') {
                echo '<strong>'. 'Introduce bien la contrasena'.'</strong>';
            }

            if($error === 'edad') {
                echo '<strong>'. 'Introduce bien la edad'.'</strong>';
            }

            if($error === 'email') {
                echo '<strong>'. 'Introduce bien el email'.'</strong>';
            }
        }
    
    ?>


    <form action="procesar.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" />
        <br>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" />
        <br>

        <label for="edad">Edad</label>
        <input type="number" name="edad" />
        <br>

        <label for="email">Email</label>
        <input type="email" name="email" />
        <br>

        <label for="password">Password</label>
        <input type="password" name="password"  />
        <br>


         <input type="submit" value="Enviar"/>   
    </form>

    
</body>
</html>