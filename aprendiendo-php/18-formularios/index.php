<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formularios PHP</title>
</head>
<body>
    <h1> Formulario</h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" autofocus="autofocus"/>

        <label for="nombre">Apellidos</label>
        <input type="text" name="apellidos"  maxlength="3" pattern="[A-Z]+"/>
        
        <input type="button" name="button" value="click!" />
        Checkbox
        <input type="checkbox" name="check" value="mujer!" />
        <input type="checkbox" name="check" value="hombre!" />

        <br>
        <input type="color" name="color"/>

        <br>
        <input type="date" name="date" />Fecha
        <input type="email" name="email" />Email

        <br>
        <input type="file" name="file" /> Archivos

        <br>
        <input type="number" name="number" /> Numeros
        
        <br>
        <input type="password" name="pass" /> Password
        
        <br>
        <input type="radio" name="continente" value="españa" />Esp
        <input type="radio" name="continente" value="francia" />Fra
        
        <br>
        <input type="url" name="web"  />web

        <br>
        <textarea></textarea>

        <br>
        Peliculas
        <select>
            <option value="sp">Spiderman</option>
            <option value="bt">batman</option>
            <option value="hl">halo</option>
        </select>
        
        
        
        
        <br> 
        Enviar<input type="submit" value="enviar"/>


    </form>

</body>
</html>


<?php






?>