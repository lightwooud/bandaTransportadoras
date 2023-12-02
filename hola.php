<!DOCTYPE html>
<html>
<head>
    <title>Estadísticas</title>
</head>
<body>
    <h2>Estadísticas</h2>
    <?php
    session_start();

    if (isset($_SESSION["camiones"]) && isset($_SESSION["acumulados"])) {
        $camiones = $_SESSION["camiones"];
        $acumulados = $_SESSION["acumulados"];
        $sacosEspeciales = $_SESSION["sacosEspeciales"];
        $sacosDefectuosos = $_SESSION["sacosDefectuosos"];
        $contenedorEspecial = $_SESSION["contenedorEspecial"];
        $contenedorNormal = $_SESSION["contenedorNormal"];
        $capacidadEspecial = $_SESSION["capacidadEspecial"];
        $capacidadNormal = $_SESSION["capacidadNormal"];

        echo "Cantidad de sacos especiales: $sacosEspeciales<br>";
        echo "Cantidad de sacos defectuosos: $sacosDefectuosos<br>";
        echo "Cantidad de contenedor especiales: $contenedorEspecial<br>";
        echo "Cantidad de contenedor normal: $contenedorNormal<br>";
        echo "Cantidad de capacidad especiales: $capacidadEspecial <br>";
        echo "Cantidad de capacidad Normal: $capacidadNormal<br>";
        echo "Cantidad de camiones descargados: " . count($camiones) . "<br>";
        echo "Peso total de los sacos de cafe de cada camión:<br>";
        foreach ($camiones as $key => $camion) {
            echo "Camión $camion: " . $acumulados[$key] . "<br>";
        }
    } else {
        echo "No se proporcionaron datos de camiones llenados.";
    }
    ?>
</body>
</html>
