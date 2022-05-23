<?php require_once "superior.php"?>
<?php require_once "costado.html"?>
<?php require_once "session.php" ?>

<!--formulario para generar presupuesto-->
<main class="main col">

        <form action=""  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
            <div class="form">
                <h1>Generar presupuesto</h1>

            <div class="col-12">
                <!--celular, type tel-->
                <label for="celular" class="form-label">Número de Celular del Cliente</label>
                <input type="tel" class="form-control"  id="celular" name="celular" pattern="[0-9]{12}" placeholder="Formato: 54911xxxxxxxx">
            </div> 
            <div class="col-12">
                 <!--servicio-->
                <label for="servicio" class="form-label">Servicio</label>
                <select id="inputState" class="form-select form-control" name="servicio">
                <option selected>Elegir servicio...</option>
                <?php
				$servername = "localhost";
				$database = "jacesi";
				$username = "root";
				$password = "";
				// crear conexion
				$conn = mysqli_connect($servername, $username, $password, $database);
				$queryservicios= mysqli_query($conn,"SELECT * FROM `servicios`");
			//	$servicio = mysqli_fetch_array($queryservicios);
				$nr = mysqli_num_rows($queryservicios);
				foreach ($queryservicios as  $I){
					$opcion=$I['Descripcion'];
					echo"<option>$opcion</option>";
				}
				?>
                </select>
            </div>        
            <div class="col-12">
                 <!--precioU, type number, minimo 1-->
                <label for="precioU" class="form-label">Precio Unitario</label>
                <input type="number" min="1" class="form-control" id="precioU" name="precioU">
            </div>
            <div class="col-12">
                 <!--fecha, type date-->
                <label for="fecha" class="form-label">Fecha de realización</label>
                <input type="date" class="form-control"  id="fecha" name="fecha">
            </div> 
            <div class="col-12">
                 <!--cantidad, type number, minimo 1-->
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" min="1" class="form-control"  id="cantidad" name="cantidad">
            </div>
            </div>
             <!--boton-->
                <button class="btn btn-primary" type="submit">Agregar presupuesto</button>
            </div>
        </form>
    </div>



</main>

      


<?php require_once "inferior.php"?>