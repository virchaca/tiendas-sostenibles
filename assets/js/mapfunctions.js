
// ***************  Cargar MAPBOX y las tiendas    ******************
// COGEMOS LOS DATOS DE UN JSON SIMULANDO QUE VIENEN DE BASE DE DATOS. 
// con // fetch("api/getAllShops.php") los traeríamos de la BD, de la API que creamos en getAllShops.php

// Función para inicializar el mapa
function initMap() {
    mapboxgl.accessToken =
        "pk.eyJ1IjoiZ2lzZWhhYWciLCJhIjoiY2w1Yzdwcm5kMDR5ZjNjcGo4dXBjMmMydiJ9.ow4piq8-jPA8uA_wahp3ig";

    var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/streets-v11",
        projection: "globe",
        center: [-2.62032, 43.0733],
        zoom: 8,
    });

    loadShops(map); // Llamar a la función que carga las tiendas
}

// Función para cargar los datos de las tiendas desde la API y agregarlos al mapa

function loadShops(map) {
    fetch("api/getShopsJson.php") // Traer datos de API del JSON
    // fetch("api/getAllShops.php")   // Así traemos datos de API de la BD
        .then((response) => response.json())
        .then((data) => {
            data.features.forEach((feature) => {
                const el = document.createElement("div");
                el.className = "marker";

                const popupDiv = `
                    <div class="popupStyle">
                        <h3>${feature.properties.name}</h3>
                        <p>${feature.properties.phone || "No disponible"}</p>
                        <p>${feature.properties.address}</p>
                        <p>${feature.properties.city}</p>
                    </div>
                `;

                new mapboxgl.Marker(el)
                    .setLngLat(feature.geometry.coordinates)
                    .setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML(popupDiv))
                    .addTo(map);
            });
        })
        .catch((error) => console.error("Error fetching shops:", error));
}

// Al estar en JS y no un script dentro de map.php: Ejecutar la función cuando la página cargue completamente 
document.addEventListener("DOMContentLoaded", initMap);
