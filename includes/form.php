
<div class="form-div">

    <div id='filter' class='searchDiv'>
        
        <form class="search-form" action="index.php" method='GET'>
            <input type="text" name="search" id="search" placeholder="Busca aquí tu tienda" required>
            <button type="submit" value="Buscar">Buscar</button>
        </form>
        <p>Busca tiendas ya sea por una palabra del nombre, ciudad, descripción....</p>
        
        <video class="form-video" autoplay loop muted plaisinline>
            <source src="./assets/images/trolley.mp4" type="video/mp4">Tu navegador no soporta videos
        </video>
        
    </div>
</div>    
            <!-- normalmente en action pondría "filters.php", que me hace la accion de filtrar, y cargaría filters.php, pero para mantener la estructura de index, con navbar, head, footer, ... tengo definido en index que si existe 'búsqueda', isset ($_GET['search']), me vaya a filters.php, denro de mi estructura de index. Por eso aquí en action lo envío a index, y ya todo fluye.-->
    