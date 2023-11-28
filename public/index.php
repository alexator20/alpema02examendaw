<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
//require_once DIR."/config/config.json";
try {
    // Conexión a la base de datos utilizando PDO
    //$pdo = new PDO("mysql:host=localhost;port=3306;dbname=todolist2;", "root", "root");

    //$pdo = new PDO("mysql:127.0.0.1=localhost;dbname=todolist2", "root", "root");

    // Configurar el modo de error de PDO para lanzar excepciones

    //$jsonString = file_get_contents('../config/config.json'); <- NO FUNCIONA YA QUE LOCALHOST SE ENCUENTRA EN SRC Y NO SE PUEDE SALIR

  //  (/var/www/html/  esto es src     config/config.json)
    $jsonString = file_get_contents('config.json');
    // decodificar el json a un array
    $config = json_decode($jsonString, true);

     // Conexión a la base de datos utilizando PDO
     $serverName = '';
     $userName = '';
     $password = '';
     $dbName = '';



    if ($config === null) {
        die("Error al decodificar el JSON.");
    }else{
    // sacamos del json los valores
    $serverName = $config["host"];
    $userName = $config["user"];
    $password = $config["pass"];
    $dbName = $config["nombre_base_datos"];
    }



    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL
    $query = "SELECT * FROM persona";

    // Preparar la consulta
    $statement = $pdo->prepare($query);

    // Ejecutar la consulta
    $statement->execute();

    // Obtener y mostrar los resultados
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "NOMBRE: " . $row['nombre'] . " EDAD: " . $row['edad']. " ESTILO: " . $row['estilo'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>