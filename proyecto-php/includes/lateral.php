 <?php require_once 'includes/helpers.php'; ?>


 <!-- aside -->
 <aside id="sidebar">

     <div id="buscador" class="bloque">
         <h3>Buscar</h3>

         <form action="buscar.php" method="POST">
             <input type="text" name="busqueda">
             <input type="submit" value="Buscar">
         </form>
     </div>

     <?php if (isset($_SESSION['usuario'])) : ?>
         <div id="usuario-logueado" class="bloque">
             <h3>Bienvenido! <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos'] ?></h3>
             <!--botones -->
             <a href="crearEntrada.php" class="boton boton-verde">Crear Entradas</a>
             <a href="crearCategoria.php" class="boton">Crear Categorías</a>
             <a href="misDatos.php" class="boton boton-naranja">Mis Datos</a>
             <a href="cerrar.php" class="boton boton-rojo">Cerrar Sesión</a>
         </div>
     <?php endif; ?>

     <?php if (!isset($_SESSION['usuario'])) : ?>
         <div id="login" class="bloque">
             <h3>Identificate</h3>

             <?php if (isset($_SESSION['error-login'])) : ?>
                 <div class="alerta alerta-error">
                     <?= $_SESSION['error-login']; ?>
                 </div>
             <?php endif; ?>


             <form action="login.php" method="POST">
                 <label for="email">Email</label>
                 <input type="email" name="email">

                 <label for="pass">Contraseña</label>
                 <input type="password" name="pass">

                 <input type="submit" value="Entrar">
             </form>
         </div>

         <div id="register" class="bloque">

             <?php if (isset($_SESSION['errores'])) : ?>
                 <?php var_dump($_SESSION['errores']); ?>
             <?php endif; ?>

             <h3>Registrate</h3>

             <!-- Mostrar errores -->
             <?php if (isset($_SESSION['completado'])) : ?>
                 <div class="alerta alerta-exito">
                     <?= $_SESSION['completado'] ?>
                 </div>

             <?php elseif (isset($_SESSION['errores']['general'])) : ?>
                 <div class="alerta alerta-exito">
                     <?= $_SESSION['errores']['general'] ?>
                 </div>
             <?php endif; ?>

             <form action="registro.php" method="POST">
                 <label for="nombre">Nombre</label>
                 <input type="text" name="nombre">
                 <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ?>

                 <label for="apellidos">Apellidos</label>
                 <input type="text" name="apellidos">
                 <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ?>


                 <label for="email">Email</label>
                 <input type="email" name="email">
                 <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>


                 <label for="pass">Contraseña</label>
                 <input type="password" name="pass">
                 <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ?>


                 <input type="submit" name="submit" value="Registrar">
             </form>

             <?php borrarErrores(); ?>
         </div>
     <?php endif; ?>
 </aside>