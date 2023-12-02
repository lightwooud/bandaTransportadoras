<!DOCTYPE html>
<html>
<head>
<title>BANDAS TRANSPORTADORAS</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
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
           


            echo "<div class='debug-box'>";  
            echo "<p>TOTAL DE SACOS ESPECIALES= $sacosEspeciales<p>";
            echo "<p>TOTAL DE SACOS DEFECTUOSOS = $sacosDefectuosos<p>";
            echo "<p>TOTAL DE CONTENEDORES ESPECIALES =$contenedorEspecial<p>";
            echo "<p>TOTAL DE CONTENEDORES NORMALES = $contenedorNormal<p>"; 
            

            
           echo "<p>TOTAL DE CAMIONES DESCARGADOS: " . count($camiones) . "</p>";
            echo "<p>PESO TOTAL DE LOS SACOS DE CAFE POR CAMION:</p>";
            foreach ($camiones as $key => $camion) {
                echo "<p>CAMION $camion: " . $acumulados[$key] . " KG</p>";
            }
            echo "</div>";
        } else {
            echo "No se proporcionaron datos de camiones llenados.";
        }
        ?>
    </div>
</body>
</html>
