<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivos con PHP</title>
</head>
<body>
    <h1>Subir imágenes PHP</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="archivo" />
        <input type="submit" value="Enviar"/>
    </form>

    <h1>Listado de imágenes</h1>
    <?php
        $gestor = opendir('./images');
        if($gestor){
            while(($image = readdir($gestor)) !== false ){
                if($image != '.' && $image != '..'){
                    echo "<img src='images/$image' width='200px' /><br>";
                }
            }
        }
    ?>

</body>
</html>