
    <?php require_once "superior.php" ?>
    <?php require_once "costado.php" ?>
    <?php require_once "session.php" ?>
<body>
    <main class="main col">
    <!--Formulario alta de usuarios-->
            <form action="altaEmpleadoSql.php"  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
                <div class="form">
                    <h1>Alta de empleados</h1>
                <div class="col-12">
                    <!--nombre, type text -->
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required="required">
                </div>
                <div class="col-12">
                    <!--apellido, type text-->
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required="required">
                </div>
                <div class="col-12">
                    <!--celular, type tel-->
                    <label for="celular" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control"  id="telefono" name="telefono" required="required">
                </div>  
                <div class="col-12">
                    <!--mail, type mail-->
                    <label for="mail" class="form-label">Mail</label>
                    <input type="mail" class="form-control"  id="mail" name="mail" required="required">
                </div> 
                <div class="col-12">
                    <!--fechaalta, type date-->
                    <label for="fechaalta" class="form-label">Fecha de alta</label>
                    <input type="date" class="form-control"  id="fechaalta" name="fechaalta" required="required">
                </div>  
                <div class="col-12">
                    <!--usuario, type text-->
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required="required">
                </div>
                <div class="col-12">
                    <!--contraseña, type password-->
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contraseña" name="contraseña" required="required"><br>
                </div>
                    <!--boton-->
                <button class="btn btn-primary" type="submit">Crear Usuario</button>
                </div>
            
            </form>
    </main>
<?php require_once "inferior.php" ?>
</body>

</html>