
    <?php require_once "superior.php" ?>
    <?php require_once "costado.php" ?>
    <?php require_once "session.php" ?>
<body>   
<?php
 //conexion con la base de datos
$conexion=mysqli_connect('localhost','root','','users')
?>
           <?php
		   
             //muestra a todos menos al admin
            $sql="SELECT * from login where usuario = '".$_SESSION['nombredelusuario']."'";

            $result= mysqli_query($conexion,$sql);
            while($mostrar=mysqli_fetch_array($result)){
               ?> 
    <main class="main col">
        <!--formulario con los datos del inicio de sesion-->
    <form action="Modificar perfil.php"  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
                <div class="form">
                    <h1>Mi perfil</h1>
                <div class="col-12">
                    <!--nombre, type text -->
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text"  class="form-control" id="nombre" name="nombre" required="required" value="<?php echo $mostrar['nombre']?>" readonly = "readonly">
                </div>
                <div class="col-12">
                    <!--apellido, type text-->
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required="required" value="<?php echo $mostrar['apellido']?>" readonly = "readonly">
                </div>
                <div class="col-12">
                    <!--celular, type tel-->
                    <label for="celular" class="form-label">Cambiar Teléfono</label>
                    <input type="tel" class="form-control"  id="telefono" name="telefono" value="<?php echo $mostrar['telefono'] ?>" required="required">
                </div>  
                <div class="col-12">
                    <!--mail, type mail-->
                    <label for="mail" class="form-label">Cambiar Mail</label>
                    <input type="mail" class="form-control"  id="mail" name="mail" value="<?php echo $mostrar['mail'] ?>" required="required">
                </div> 
                <div class="col-12">
                    <!--fechaalta, type date-->
                    <label for="fechaalta" class="form-label">Fecha de alta</label>
                    <input type="date" class="form-control"  id="fechaalta" name="fechaalta" required="required" value="<?php echo $mostrar['fechaalta'] ?>" readonly = "readonly">
                </div>  
                <div class="col-12">
                    <!--usuario, type text-->
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required="required" value="<?php echo $mostrar['usuario'] ?>" readonly = "readonly">
                </div>
                <div class="col-12">
                    <!--contraseña, type password-->
                    <label for="contraseña" class="form-label">Cambiar la Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" value="<?php echo $_SESSION['contrausuario']?>" required="required">
                </div>
                <div class="col-12">
                    <!--contraseña, type password-->
                    <label for="contraseña" class="form-label">Repetir la Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña1" required="required"><br>
                </div>
                    <!--boton-->
                <button class="btn btn-primary" type="submit">Guardar cambios</button>
                </div>
                <?php
            }
            ?>
            </form>
        </div>
    </main>
<?php require_once "inferior.php" ?>
</body>

</html>