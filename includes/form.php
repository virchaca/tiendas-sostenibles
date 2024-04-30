
  
     <style>  
     

    h3 {
    margin: auto;
    text-align: center;
    }
    img {
    margin: 0;        
    }
    .div{
    width: fit-content;
    margin: auto;
    text-align: center;

    }
</style>

<br>
<div class="div">

<img style="margin:auto" src="../assets/images/buscar.jpeg" alt="buscar">
<br> 
  
  
  
  
  
  
  <div id='filter' class= 'searchDiv'>

            <h3>Busca tu clínica</h3>

            <form action="../filters.php" method='GET'>
                <!-- cuando llamo a form desde index.php, aqui pongo form action="filters.php", si lo llamo desde la pestaña BUSCAR de header, tengo que salir de includes, porque header está en includes (../filters.php) -->

                <input type="text" name="search">         

                <input type="submit" value="Buscar">

            </form> 

             <br><a href="../index.php">Volver a index.php</a>';
            <hr>
    </div>

        
        
        <!-- <label for="name">Nombre clínica</label>
                <input type="text" name="name">

                <label for="address">Dirección clínica</label>
                <input type="text" name="address">

                <label for="Id_clinic">Id de la clínica</label>
                <input type="text" name="Id_clinic"> -->