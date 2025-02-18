
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

//************************tutorial mapbox********************************

const geojson1 = {
    type: "FeatureCollection",
    features: [
      {
        type: "Feature",
        geometry: {
          type: "Point",
          coordinates: [-2.9253, 43.2627],
        },
        properties: {
          name: "Alguna tienda en Bilbao",
          phone: "999 999 999",
          address: "c/ prueba en Bilbao",
        },
      },
      {
        type: "Feature",
        geometry: {
          type: "Point",
          coordinates: [-2.01988, 43.27315],
        },
        properties: {
          name: "Tienda en Donosti",
          phone: "943 44 35 45",
          address: "Avenida de Atsobakar 7",
        },
      },
    ],
  };

  // add markers to map
  for (const feature of geojson1.features) {
    // create a HTML element for each feature
    const el = document.createElement("div");
    el.className = "marker";

    // make a marker for each feature and add to the map
    new mapboxgl.Marker(el)
      .setLngLat(feature.geometry.coordinates)
      .addTo(map)
      .setPopup(
        new mapboxgl.Popup({ offset: 25 }) // add popups
          .setHTML(
            `<h3>${feature.properties.name}</h3>
            <p>${feature.properties.phone}</p>
            <p>${feature.properties.address}</p>`
          )
      )
      .addTo(map);
  }

  //***********************FIN tutorial mapbox ********************************
</script>