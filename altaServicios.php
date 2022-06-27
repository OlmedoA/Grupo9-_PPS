<?php require_once "superior.php"?>
<?php require_once "costado.php"?>
<?php require_once "session.php" ?>
<body>
    <main class="main col">
        <!--Formulario alta de usuarios-->
        <form action="altaServiciosSql.php"  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
                    <div class="form">
                        <h1 class="encabezado">Alta de servicio</h1>
                    <div class="col-12">
                        <!--servicio, type text -->
                        <label for="Descrip" class="form-label">Servicio</label>
                        <input type="text" class="form-control" id="Descrip" name="Descrip" required="required">
                    </div>
                    <div class="col-12">
                        <!--precio, type text -->
                        <label for="Precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="Precio" name="Precio" required="required"><br>
                    </div>

                        <!--boton-->
                    <button class="btn btn-primary" type="submit">Crear Servicio</button>
                    </div>
                
                </form>

    </main>
</body>

<?php require_once "inferior.php"?>