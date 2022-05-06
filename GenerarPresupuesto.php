<?php require_once "superior.php"?>
<?php require_once "costado.html"?>
<?php require_once "session.php" ?>


<main class="main col">

        <form action=""  method="POST" class="row g-3 formStyle mx-auto py-4 px-4 form">
            <div class="form">
                <h1>Generar presupuesto</h1>
                <div class="col-12">
            <label for="servicio" class="form-label">Servicio</label>
            <select id="inputState" class="form-select form-control" name="servicio">
            <option selected>Elegir servicio...</option>
            <option>Montado de rack	</option>
            <option>Instalación de wifi	</option>
            <option>Canalización para cableado de red</option>
            <option>Cableado de red x 18 bocas</option>
            <option>Pruebas de conexión</option>
            <option>cableado 1 boca</option>
            <option>Montado toma doble</option>
            <option>Reinstalación de Instalación eléctrica</option>
            </select>
        </div>
        <div class="col-12">
            <label for="fecha" class="form-label">Fecha de realizacion</label>
            <input type="date" class="form-control"  id="fecha" name="fecha">
        </div> 
        <div class="col-12">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" min="1" class="form-control"  id="cantidad" name="cantidad">
        </div>
        <div class="col-12">
            <label for="precioU" class="form-label">Precio Unitario</label>
            <input type="number" min="1" class="form-control" id="precioU" name="precioU">
        </div>
        <div class="col-12">
            <label for="precioT" class="form-label">Precio Total</label>
            <input type="number" min="1"class="form-control" id="precioT" name="precioT">
        </div>
            </div>
            <button class="btn btn-primary" type="submit">Agregar presupuesto</button>
            </div>
        </form>
    </div>



</main>

      


<?php require_once "inferior.php"?>