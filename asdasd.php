<!DOCTYPE html>
<html>
<head>
    <title>Formulario PHP - Paso 1</title>
</head>
<body>
    <h2>PROCESO DE DESCARGUE</h2>
    <form method="post" action="formulario2.php">
  
        <?php
        
        if (isset($_GET["camiones"]) ) {
            $camionesDescargados= $_GET["camionesDescargados"];
            $camiones = $_GET["camiones"];
            $sacosEspeciales = $_GET["sacosEspeciales"];
            $sacosDefectuosos = $_GET["sacosDefectuosos"];
            $contenedorEspecial = $_GET["contenedorEspecial"];
            $contenedorNormal = $_GET["contenedorNormal"];
            $capacidadEspecial = $_GET["capacidadEspecial"];
            $capacidadNormal = $_GET["capacidadNormal"];

            echo "DEBUG CAMIONES DESCARGADOS = $camionesDescargados";
            echo "NUMERO DE CAMIONES = $camiones,  sacosEspeciales= $sacosEspeciales, sacosDefectuosos = $sacosDefectuosos, contenedorEspecial=$contenedorEspecial, contenedorNormal=$contenedorNormal, capacidadEspecial = $capacidadEspecial, capacidadNormal= $capacidadNormal";
            
            echo "<label for='ptotal'>Peso camion Lleno:</label>";
            echo "<input type='number' name='ptotal' id='ptotal' required>";
            echo "<br><br>";
            echo "<label for='pvacio'>Peso Vacio:</label>";
            echo "<input type='number' name='pvacio' id='pvacio' required>";
            echo "<input type='hidden' name='camionesDescargados' value='$camionesDescargados'>";
            echo "<input type='hidden' name='sacosEspeciales' value='$sacosEspeciales'>";
            echo "<input type='hidden' name='sacosDefectuosos' value='$sacosDefectuosos'>";
            echo "<input type='hidden' name='contenedorEspecial' value='$contenedorEspecial'>";
            echo "<input type='hidden' name='contenedorNormal' value='$contenedorNormal'>";
            echo "<input type='hidden' name='capacidadEspecial' value='$capacidadEspecial'>";
            echo "<input type='hidden' name='capacidadNormal' value='$capacidadNormal'>";
            echo "<input type='hidden' name='camiones' value='$camiones'>";
            echo "<br><br>";
            echo "<input type='submit' value='Siguiente'>";
            
        } else {
            
            echo "<label for='camiones'> Numero de camiones a descargar: </label>";
            echo "<input type='number' name='camiones' id='camiones' required>";
            echo "<label for='ptotal'>Peso camion Lleno:</label>";
            echo "<input type='number' name='ptotal' id='ptotal' required>";
            echo "<br><br>";
            echo "<label for='pvacio'>Peso Vacio:</label>";
            echo "<input type='number' name='pvacio' id='pvacio' required>";
            echo "<br><br>";
            echo "<input type='submit' value='Siguiente'>";
            
        } 
        ?>
    </form>
</body>
</html>
