
<?php
session_start(); //inicio la sesion para traer la variable del mensaje
?>

<div id='insertDiv'>
            <h3>Registra una nueva clinica</h3>

            <?php
                // Mostrar mensaje de éxito o error, verifico si esa variable de sesión está configurada y muestro el mensaje correspondiente.
                if (isset($_SESSION['message'])) {
                echo "<p>{$_SESSION['message']}</p>";
                unset($_SESSION['message']); // Limpiar el mensaje después de mostrarlo
                }

                // Mostrar errores si hay segúin las vaslidaciones que yo le cree en ionsertedData.php
                if (isset($_SESSION['errors'])) {
                    foreach ($_SESSION['errors'] as $key => $value) {
                    echo "<p>Error en $key: $value</p>";
                }
                unset($_SESSION['errors']); // Limpiar los errores después de mostrarlos
                }
            ?>


            <form class='insertForm' action="insertedData.php" method='POST'>

                <label for= "Name" >Nombre clínica:
                        <input type="text" name="Name">  </label>

                <label for="Address">Direccion:
                        <input type="text" name="Address">  </label>
                
                
                <!-- <label for="Status">Estatus  
                    <input type="text" name="Status">  </label> -->
                
                <!-- <label for="Permalink">Link  
                    <input type="text" name="Permalink">  </label> -->

                <label for="City">Ciudad  
                    <input type="text" name="City">  </label>

                <!-- <label for="State">Provincia  
                    <input type="text" name="State">  </label> -->

                <!-- <label for="Zip">Codigo postal  
                    <input type="number" name="Zip">  </label> -->

                <!-- <label for="Country">Pais  
                    <input type="text" name="Country">  </label> -->
                
                <!-- <label for="Country_iso">Acronimo  
                    <input type="text" name="Country_iso">  </label> -->

                <label for="Phone">Telefono  
                    <input type="number" name="Phone">  </label> 

                <label for="Lat">Latitud (coordenada)  
                    <input type="text" name="Lat" pattern="^-?\d{1,3}(?:\.\d+)?$" title="Por favor, ingrese una latitud válida" required>  </label>

                <label for="Lng">Longitud (coordenada)  
                    <input type="text" name="Lng" pattern="^-?\d{1,3}(?:\.\d+)?$" title="Por favor, ingrese una longitud válida" required>  </label>

             

                <input type="submit" name='submit' value="Registrar">
            </form> 

        </div>
       