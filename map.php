<!-- trabajar con mapbox con DOCUMENTACION PROPIA MAPBOX
    y  https://cindr.org/add-events-to-a-mapbox-map-via-php/ y video https://www.youtube.com/watch?v=yiqV9tDdCVc -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- links fuentes e iconos -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />

    <title>Mapa de establecimientos</title>

    <link rel="stylesheet" href="assets/css/mapbox.css" type="text/css" />

    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
    />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.1.0/mapbox-gl.js"></script>
    <link
      href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.1.0/mapbox-gl.css"
      rel="stylesheet"
    />

    <!-- del video https://www.youtube.com/watch?v=yiqV9tDdCVc para MAPBOX, GEOCODER y JQUERY-->

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <!-- <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>  -->

    <style>
      .marker {
        background-image: url(assets/images/marker15.png);
        background-size: cover;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
      }

      .mapboxgl-popup {
        max-width: 200px;
      }

      .mapboxgl-popup-content {
        text-align: center;
        font-family: "Open Sans", sans-serif;
      }
    </style>
  </head>

  <body class="mapbody">
   
    <h2 class="h2Title">
      Encuentra tu establecimiento más cercano!      
      <span class="indexMapBtnParagraph"><button class="indexMapBtn"><a href= "index.php">VOLVER</a></button></span>
    </h2>

    <div id="map-container">
      <div id="map"></div>
    </div>

    <!-- ***************  SCRIPT MAPBOX      ****************** -->
    <script>
      mapboxgl.accessToken =
        "pk.eyJ1IjoiZ2lzZWhhYWciLCJhIjoiY2w1Yzdwcm5kMDR5ZjNjcGo4dXBjMmMydiJ9.ow4piq8-jPA8uA_wahp3ig";

      var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11", // Estilo del mapa
        projection: "globe", //muestra como un globo en vez de mapa
        center: [-2.62032, 43.0733], // Coordenadas del centro del mapa 
        zoom: 8, // Nivel de zoom inicial
      });

      
      //************************ TRAER DATOS API ********************************
      //solicitud AJAX, un fetch, para obtener los datos del archivo PHP y luego usar esos datos para crear y mostrar los marcadores en el mapa.
      fetch("api/getAllShops.php")
        .then((response) => response.json())
        .then((data) => {
          data.features.forEach((feature) => {
            // creo con const, un elemento HTML para los marcadores
            const el = document.createElement("div");
            el.className = "marker";

            // creo con una const lo que quiero que vaya en mi popup y lo llamo abajo
            const popupDiv = `
                        <div class="popupStyle">
                            <h3>${feature.properties.name}</h3>
                            <p>${feature.properties.phone}</p>
                            <p>${feature.properties.address}</p>
                            <p>${feature.properties.city}</p>
                            <p>${feature.properties.web}</p>
                        </div>
                    `;

            // make a marker for each feature and add to the map
            new mapboxgl.Marker(el)
              .setLngLat(feature.geometry.coordinates)
              .setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML(popupDiv))
              .addTo(map);
          });
        })
        .catch((error) => console.error("Error fetching shops:", error));

      //************************FIN  TRAER DATOS API ********************************

      //   //empezar con data de tiendas
      //         map.on('load', function () {

      //         //place object we will add our events to
      //             map.addSource('places',{
      //                 'type': 'geojson',
      //                 'data': {
      //                     'type': 'FeatureCollection',
      //                     'features': []
      //                 }
      //             });

      //     // map.addLayer({
      //     //     'id': 'places',
      //     //     'type': 'symbol',
      //     //     'source': {
      //     //         'type': 'geojson',
      //     //         'data': '< ?php echo json_encode($returnData); ? >'
      //     //     },
      //     //     'layout': {
      //     //         'icon-image': 'assets/images/nesaLogo', // Aquí especificas el icono del cohete
      //     //         'icon-size': 1.5,
      //     //         'icon-allow-overlap': true
      //     //     }
      //     // });

      //            //add place object to map
      //             map.addLayer({
      //                 'id': 'places',
      //                 'type': 'symbol',
      //                 'source': 'places',
      //                 'layout': {
      //                     'icon-image': 'assets/images/nesaLogoBN.jpeg',
      //                     'icon-allow-overlap': true
      //                 }
      //             });

      //             //Handle popups
      //             map.on('click', 'places', (e) => {
      //                 const coordinates = e.features[0].geometry.coordinates.slice();
      //                 const description = e.features[0].properties.description;
      //                 while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
      //                     coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
      //             }
      //             new mapboxgl.Popup()
      //                 .setLngLat(coordinates)
      //                 .setHTML(description)
      //                 .addTo(map);
      //             });

      //             //Handle pointer styles
      //             map.on('mouseenter', 'places', () => {
      //                 map.getCanvas().style.cursor = 'pointer';
      //             });
      //             map.on('mouseleave', 'places', () => {
      //                 map.getCanvas().style.cursor = '';
      //             });

      //             //get our data from php function
      //             getAllShops();

      //             function getAllShops(){
      //                 $.ajax({
      //                     url: "api/getAllShops.php",
      //                     contentType: "application/json",
      //                     dataType: "json",
      //                     success: function (eventData) {
      //                         console.log(eventData)
      //                         map.getSource('places')
      //                            .setData({
      //                                 'type': 'FeatureCollection',
      //                                 'features': eventData
      //                                 });
      //                         },
      //                     error: function (e) {
      //                         console.log(e);
      //                     }
      //                 });
      //             }

      //         });
    </script>
  </body>
</html>
