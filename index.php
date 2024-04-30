

<?php require_once 'includes/header.php'; ?>


  <!-- <aside id="aside_container"> 
    "?php require_once 'includes/form.php'; ?>     
  </aside> -->

  <section id='insertSection'>
        <?php require_once 'includes/insertForm.php'; ?>
  </section>

  <section id='mapSection'>
        <?php require_once 'map.html'; ?>
  </section>

    <?php        
        //echo '<br>--> Traer la info de la BD con var_dump, traigo la info del array que me genera:<br><br>';       
        
        //consulta desde php con vardump, no traigo datos, solo info del array que me genera
        //la conexion la tengo en connection.php y me la traigo con $conn

        $query = mysqli_query($conn, "SELECT * FROM Clinics");      
        //var_dump ($query);
        echo '<hr>';

        echo '<br><br>--> Traigo el listado de clínicas:<br><br>';   
    

        //validar y traer dats iterando con while
        if(mysqli_num_rows($query)>0){
        
            while($clinic = mysqli_fetch_assoc($query)) {
                echo '<h2>' ."Clinica: " . $clinic["Name"] .'</h2>'. "<br>"
                ." - ID: " . $clinic["Id_clinic"]. "<br>"
                ." - Direccion: " . $clinic["Address"]. "<br>"
                ." - Estatus: " . $clinic["Status"]. "<br>"
                . " - Link: " . $clinic["Permalink"]. "<br>"
                . " - Ciudad: " . $clinic["City"]. "<br>"
                . " - Provincia: " . $clinic["State"]. "<br>"
                . " - Codigo: " . $clinic["Zip"]. "<br>"
                . " - Pais: " . $clinic["Country"]. "<br>"
                . " - Acronimo: " . $clinics["Country_iso"]. "<br>"
                . " - Latitud de coordenada: " . $clinic["Lat"]. "<br>"
                . " - Longitud de coordenada: " . $clinic["Lng"]. "<br>"
                . " - Telefono: " . $clinic["Phone"]. "<br>"
                ."<hr>";
            }
        }else {
            echo "0 resultados";
        }
            
        $conn->close(); // Cierra la conexión
     ?>


    <section id='insertSection'>
        <?php require_once 'includes/insertForm.php'; ?>
    </section>
    
    <?php require_once 'includes/footer.php'; ?>

</body>


</html>