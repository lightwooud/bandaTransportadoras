<!DOCTYPE html>
<html>
<head>
    <title>BANDAS TRANSPORTADORAS</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>PROCESO DE DESCARGUE</h2>
        <form method="post" action="formulario2.php">
    
            <?php
            #SI CAMIONES ESTA PRESENTE EN LOS PARAMETROS QUE TRAE EL GET.
            if (isset($_GET["camiones"]) ) {
                $camionesDescargados= $_GET["camionesDescargados"];
                $camiones = $_GET["camiones"];
                $sacosEspeciales = $_GET["sacosEspeciales"];
                $sacosDefectuosos = $_GET["sacosDefectuosos"];
                $contenedorEspecial = $_GET["contenedorEspecial"];
                $contenedorNormal = $_GET["contenedorNormal"];
                $capacidadEspecial = $_GET["capacidadEspecial"];
                $capacidadNormal = $_GET["capacidadNormal"];

               #MOSTRAR INFORMACION
                echo "<div class='debug-box'>";  
                echo "<p>CAPACIDAD DE CARGA: = $resta<p>";
                echo "<p> LLEVAS UN ACUMULADO DE: = $acumulado<p>";
                echo "<p>CAMIONES DESCARGADOS: = $camionesDescargados<p>";
                echo "<p>TOTAL DE CAMIONES A DESCARGAR = $camiones<p>";
                echo "<p>LLEVAS UN TOTAL DE SACOS ESPECIALES= $sacosEspeciales<p>";
                echo "<p>LLEVAS UN TOTAL DE SACOS DEFECTUOSOS = $sacosDefectuosos<p>";
                echo "<p>LLEVAS UN TOTAL DE CONTENEDORES ESPECIALES =$contenedorEspecial<p>";
                echo "<p>LLEVAS UN TOTAL DE CONTENEDORES NORMALES = $contenedorNormal<p>"; 
                echo "</div>";

                #FORMULARIO 
                echo "<label for='ptotal'>Peso camion Lleno en kg:</label>";
                echo "<input type='number' name='ptotal' id='ptotal' required>";
                echo "<br><br>";
                echo "<label for='pvacio'>Peso camion vacio en kg:</label>";
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
                echo "<label for='ptotal'>Peso camion Lleno en kg:</label>";
                echo "<input type='number' name='ptotal' id='ptotal' required>";
                echo "<br><br>";
                echo "<label for='pvacio'>Peso camion vacio en kg:</label>";
                echo "<input type='number' name='pvacio' id='pvacio' required>";
                echo "<br><br>";
                echo "<input type='submit' value='Siguiente'>";
                
            } 
            ?>
        </form>
    </div>
</body>
</html>
