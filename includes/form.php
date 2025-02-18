
<!-- <link rel="stylesheet" href="../assets/css/style.css"> -->



<div class="form-div">

    <div id='filter' class='searchDiv'>

        <form class="search-form" action="index.php" method='GET'>
            <!-- cuando llamo a form desde index.php, aqui pongo form action="filters.php", si lo llamo desde la pestaña BUSCAR de header, tengo que salir de includes, porque header está en includes (../filters.php) -->
            
            <input type="text" name="search" id="search" placeholder="Busca aquí tu tienda" required>
            <button type="submit" value="Buscar">Buscar</button>
        </form>

        <video class="form-video" autoplay loop muted plaisinline>
            <source src="./assets/images/trolley.mp4" type="video/mp4">Tu navegador no soporta videos
        </video>

        <!-- <p><a href="../index.php">Volver a la página de inicio</a></p> -->
    </div>



    <!-- <label for="name">Nombre de la tienda</label>
                <input type="text" name="name">

                <label for="address">Dirección tienda</label>
                <input type="text" name="address">
-->