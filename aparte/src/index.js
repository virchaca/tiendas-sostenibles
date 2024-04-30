
//imports
const express = require("express");
const cors = require("cors");
const mysql = require("mysql2/promise");

//arrancar el servidor
const app = express();

//configurar
app.use(cors());
app.use(express.json());

//conexión a la bases de datos
async function getConnection() {
  //creary configurar la conexion
  const connection = await mysql.createConnection({ //nos conectamos por mysqlworkbench, puerto 3306, root con password
    host: "localhost",
    user: "root",
    password: "VIRg1n14*", //este si necesita password
    database: "clinicsFake_db",
  });

  connection.connect();
  return connection;
}

const port = process.env.PORT || 4500;
app.listen(port, () => {
  console.log(`Servidor iniciado en http://localhost:${port}`);
});

//Endpoints
//Obtener todas las clinicas (GET /clinicas)

app.get("/clinics", async (req, res) => {
  try {
      // Select a la bases de datos
      let query = "SELECT * FROM Clinics";
      // Hacer la conexión con la BD
      const conn = await getConnection();
      // Ejecutar esa consulta
      const [results] = await conn.query(query);
      // Enviar una respuesta con metadatos
      res.status(200).json({
          status: "success",
          message: "Clinics retrieved successfully",
          count: results.length,
          data: results
      });
  } catch (error) {
      // Enviar una respuesta en caso de error
      res.status(500).json({
          status: "error",
          message: "Internal server error"
      });
  }
});


app.get("/clinics", async (req, res) => {
    //Select a la bases de datos
    let query = "SELECT * FROM Clinics";
    //hacer la conexión con la BD
    const conn = await getConnection();
    //Ejecutar esa consulta
    const [results] = await conn.query(query);
    //Enviar una respuesta
    res.json( results, // listado
    );
  });
  

  