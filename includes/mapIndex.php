<section id='mapSection'>
    <!-- < ?php require 'map.html'; ? > -->


    <div id="map-container">
        <div id="map"></div>
    </div>

    <!-- ***************  SCRIPT MAPBOX  para cargar Mapbox y las tiendas    ****************** -->
    <script>

        // mapboxgl.accessToken =
        //     "pk.eyJ1IjoiZ2lzZWhhYWciLCJhIjoiY2w1Yzdwcm5kMDR5ZjNjcGo4dXBjMmMydiJ9.ow4piq8-jPA8uA_wahp3ig";

        // var map = new mapboxgl.Map({
        //     container: "map",
        //     style: "mapbox://styles/mapbox/streets-v11", // Estilo del mapa
        //     projection: "globe", //muestra como un globo en vez de mapa
        //     center: [-2.62032, 43.0733], // Coordenadas del centro del mapa 
        //     zoom: 8, // Nivel de zoom inicial
        // });


        // ***************** TRAER DATOS API **********************
        // solicitud AJAX, un fetch, para obtener los datos del archivo PHP y luego usar esos datos para crear y mostrar los marcadores en el mapa.

        // fetch("api/getAllShops.php")   //--> traemos datos de API de la BD
        // fetch("api/getShopsJson.php")   //--> traemos datos de JSON
        //     .then((response) => response.json())
        //     .then((data) => {
        //         data.features.forEach((feature) => {
        //             // creo con const, un elemento HTML para los marcadores
        //             const el = document.createElement("div");
        //             el.className = "marker";

        //             // creo con una const lo que quiero que vaya en mi popup y lo llamo abajo
        //             const popupDiv = `
        //             <div class="popupStyle">
        //                 <h3>${feature.properties.name}</h3>
        //                 <p>${feature.properties.phone}</p>
        //                 <p>${feature.properties.address}</p>
        //                 <p>${feature.properties.city}</p>
        //             </div>
        //         `;

        //             // make a marker for each feature and add to the map
        //             new mapboxgl.Marker(el)
        //                 .setLngLat(feature.geometry.coordinates)
        //                 .setPopup(new mapboxgl.Popup({
        //                     offset: 25
        //                 }).setHTML(popupDiv))
        //                 .addTo(map);
        //         });
        //     })
        //     .catch((error) => console.error("Error fetching shops:", error));     
            
    </script>

</section>

   