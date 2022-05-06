<?php require_once "superior.php"?>


<main class="main col">

    
        <h1 class="text-center">Generar Presupuestos</h1>
        <form action="" class="formStyle" id="formulario">
        <div class="col-8">
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
        <div class="col-8">
            <label for="fecha" class="form-label">Fecha de realizacion</label>
            <input type="date" class="form-control"  id="fecha" name="fecha">
        </div> 
        <div class="col-8">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" min="1" class="form-control"  id="cantidad" name="cantidad">
        </div>
        <div class="col-8">
            <label for="precioU" class="form-label">Precio Unitario</label>
            <input type="number" min="1" class="form-control" id="precioU" name="precioU">
        </div>
        <div class="col-8">
            <label for="precioT" class="form-label">Precio Total</label>
            <input type="number" min="1"class="form-control" id="precioT" name="precioT">
        </div>
        <div class="col-12  mt-4">
            <button type="submit" class=" w-25">Agregar presupuesto</button>
        </div>


        </form>



</main>

      


<?php require_once "inferior.php"?>