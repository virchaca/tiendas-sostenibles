
<div id='newShopDiv'>
    <h3>Registra una nueva tienda</h3>
    <p>Envíanos tus datos rellenando el siguiente formulario e ncluiremos tu tienda en nuestro mapa</p>
 
    <form 
        class='new-shop-form new-shop-form-js' 
        action="https://formsubmit.co/virginia.alvarez82@gmail.com"
        method='POST'>

        <label for="name">Nombre tienda:
            <input 
                type="text" 
                name="name"
                id="shop-name"
                class="new-shop-input"> 
        </label>

        <label for="address">Direccion (calle, codgo postal, ciudad y provincia)
            <input 
                type="text" 
                name="address"
                class="new-shop-input"> 
        </label>
 
        <!-- <label for="lat">Latitud (coordenada)
            <input type="text" name="lat" pattern="^-?\d{1,3}(?:\.\d+)?$" title="Por favor, ingrese una latitud válida" required> </label>

        <label for="lng">Longitud (coordenada)
            <input type="text" name="lng" pattern="^-?\d{1,3}(?:\.\d+)?$" title="Por favor, ingrese una longitud válida" required> </label>  -->

        <label for="web">Página Web de la tienda
            <input 
                type="text" 
                name="web"
                class="new-shop-input"> 
        </label>

        <label for="email">Email de contacto
            <input 
                type="email" 
                name="email"
                id="shop-email"
                class="new-shop-input"> 
        </label>

        <label for="phone">Telefono
            <input 
                type="number" 
                name="phone"
                id="shop-phone"
                class="new-shop-input"> 
        </label>

        <label for="description">Descripción de actividad la tienda
            <input 
                type="text" 
                name="description"
                class="new-shop-input"> 
        </label>

        <label for="category">Categoría en la que estaría representada la tienda
            <input 
                type="text" 
                name="category"
                class="new-shop-input"> 
        </label>

        <label for="opening_hours">Horario de apertura
            <input 
                type="text" 
                name="opening_hours"
                class="new-shop-input"> 
        </label>

        <label for="social_media">Redes sociales
            <input 
                type="text" 
                name="social_media"
                class="new-shop-input"> 
        </label>

        <input  type="submit" name='submit' 
                value="Registrar" class="new-shop-btnSubmit"> 
        
        <input
            type="hidden"
            name="_next"
            value="http://localhost/mapview/index.php?page=new-shop-reply" />
        
        <input type="hidden" name="_captcha" value="false" />  
        
    </form>

</div>