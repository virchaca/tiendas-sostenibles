# 🌿 Tiendas Sostenibles

# 📖 Descripción

Tiendas Sostenibles es una aplicación web que permite a los usuarios encontrar tiendas sostenibles en Euskadi. A través de un mapa interactivo, los usuarios pueden buscar tiendas de productos a granel y sin plásticos, acceder a información detallada y contribuir con nuevos registros.

# 🚀 Características

  📍 Mapa interactivo: Muestra todas las tiendas registradas con información relevante.

  🔍 Búsqueda avanzada: Permite buscar tiendas por nombre, dirección, ciudad, categoría y descripción.

  📊 Datos desde JSON y API: Los datos de las tiendas se cargan desde una base de datos y un archivo JSON.

  ➕ Registro de tiendas: Formulario para añadir nuevas tiendas al sistema.

  🌐 Interfaz amigable: Diseño responsivo y fácil de usar.

# 🛠️ Tecnologías utilizadas

  Frontend: HTML, CSS, JavaScript, Mapbox GL JS

  Backend: PHP, MySQL

  Datos: JSON para cargar información de tiendas

  Control de versiones: Git y GitHub

# 📦 Instalación y configuración
  1️⃣ Clonar el repositorio

  ```bash
    git clone https://github.com/virchaca/tiendas-sostenibles.git
    cd tiendas-sostenibles
  ```

  2️⃣ Configurar la base de datos
  
   * Importa el archivo database.sql en MySQL.
  
   * Configura la conexión en connection.php:
  
  ```bash
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'nombre_base_datos');
  ```
  
  3️⃣ Levantar el servidor local
  
  Si usas XAMPP o similar, coloca el proyecto en la carpeta htdocs y accede a http://localhost/tiendas-sostenibles/.
  
  ```bash
    http://localhost/tiendas-sostenibles/.
  ```

# 🔍 Uso

  Buscar tiendas: Utiliza la barra de búsqueda en la página principal.
  
  Explorar el mapa: Haz clic en un marcador para ver detalles de la tienda.
  
  Añadir una tienda: Completa el formulario de registro.

# 🛠️ Contribuir

  ¡Las contribuciones son bienvenidas! 🎉
  
  Haz un fork del repositorio.
  
  Crea una nueva rama (git checkout -b feature/nueva-funcionalidad).
  
  Realiza tus cambios y súbelos (git commit -m 'Añadir nueva funcionalidad').
  
  Envía un pull request.

# 📄 Licencia

Este proyecto está bajo la licencia MIT. Puedes usarlo y modificarlo libremente.

# 📧 Contacto

Si tienes dudas o sugerencias, puedes contactarme en por [email](mailto:virginia.alvarez82@gmail.com).


