<!DOCTYPE html>
<html>
<head>
    <title>BANDAS TRANSPORTADORAS</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <?php
        session_start();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
            $ptotal = $_POST["ptotal"];
            $pvacio = $_POST["pvacio"];

            
        
            if (!isset($_POST["sacosEspeciales"])) {
                $sacosEspeciales = 0;
            }else{
                $sacosEspeciales = $_POST["sacosEspeciales"];
            }


            if (!isset($_POST["sacosDefectuosos"])) {
                $sacosDefectuosos = 0;
            }else{
                $sacosDefectuosos = $_POST["sacosDefectuosos"];
            }

            if (!isset($_POST["contenedorEspecial"])) {
                
                $contenedorEspecial= 0; 
                $capacidadEspecial= 1000; 
            }else{
                $contenedorEspecial = $_POST["contenedorEspecial"]; 
                $capacidadEspecial = $_POST["capacidadEspecial"]; 
            }

            if (!isset($_POST["contenedorNormal"])) {
                $contenedorNormal= 0; 
                $capacidadNormal= 1000; 
            }else{
                $contenedorNormal = $_POST["contenedorNormal"]; 
                $capacidadNormal = $_POST["capacidadNormal"]; 
            }
            
            
            if (isset($_POST["psacos"])) {
                $psacos = $_POST["psacos"];

                if ($psacos == 70) {

                    if ($_POST["capacidadEspecial"] <= 0) {
                        echo "CAMBIO DE CONTENEDOR ESPECIAL.";
                        $contenedorEspecial = $_POST["contenedorEspecial"]+1;
                        $_POST["capacidadEspecial"] = 1000;
                        $sacosEspeciales = $_POST["sacosEspeciales"]+1;
                        
                    }
                        echo "SACO ESPECIAL- GUARDADO EN UN CONTENEDOR ESPECIAL";
                        $sacosEspeciales = $_POST["sacosEspeciales"]+1;
                        if($sacosEspeciales == 1){
                            $contenedorEspecial = $_POST["contenedorEspecial"]+1;
                        }
                        $capacidadEspecial = $_POST["capacidadEspecial"]-$psacos;
                    
                        

                } elseif ($psacos < 70 || $psacos >70) {

                    if ($_POST["capacidadNormal"] <= 0) {
                        echo "CAMBIO DE CONTENEDOR NORMAL.";
                        $contenedorNormal= $_POST["contenedorNormal"]+1;
                        $_POST["capacidadNormal"] = 1000;
                        $sacosDefectuosos = $_POST["sacosDefectuosos"]+1;
                        
                    }
                        echo "Saco Defectuoso - Guardado en un contenedor normal.";
                        $sacosDefectuosos = $_POST["sacosDefectuosos"]+1;
                        if($sacosDefectuosos == 1){
                            $contenedorNormal= $_POST["contenedorNormal"]+1;
                        }
                        $capacidadNormal = $_POST["capacidadNormal"]-$psacos;
                }else {
                    echo "El saco debe tener 70 o menos para ser especial o mayor para ser defectuoso.";
                }
            
            }

            if(isset($_POST["camiones"])){
                $camiones = $_POST["camiones"];
            }else{
                $camiones = $_GET["camiones"];
            }

            $resta = $ptotal - $pvacio;

            
            if (isset($_POST["acumulado"])) {
                $acumulado = $_POST["acumulado"];
            } else {
                $acumulado = 0;
            }

            if (isset($_POST["camionesDescargados"])) {
                $camionesDescargados = $_POST["camionesDescargados"];
            } else {
                $camionesDescargados = 0;
            }
            
            $acumulado += $psacos;
            $_SESSION["acumulado"] = $acumulado;    
        }

        ?>
        <h2>PROCESO DE CARGUE</h2>
        <?php

         

        if (isset($resta)) {
            if ($_SESSION["acumulado"] < $resta) {

                echo "<form method='post' action='formulario2.php'>";
                echo "<label for='psacos'>Peso del saco de cafe en KG:</label>";
                echo "<input type='number' name='psacos' id='psacos' required>";
                echo "<input type='hidden' name='ptotal' value='$ptotal'>";
                echo "<input type='hidden' name='pvacio' value='$pvacio'>";
                echo "<input type='hidden' name='acumulado' value='$acumulado'>";
                echo "<input type='hidden' name='camionesDescargados' value='$camionesDescargados'>";
                echo "<input type='hidden' name='sacosEspeciales' value='$sacosEspeciales'>";
                echo "<input type='hidden' name='sacosDefectuosos' value='$sacosDefectuosos'>";
                echo "<input type='hidden' name='contenedorEspecial' value='$contenedorEspecial'>";
                echo "<input type='hidden' name='contenedorNormal' value='$contenedorNormal'>";
                echo "<input type='hidden' name='capacidadEspecial' value='$capacidadEspecial'>";
                echo "<input type='hidden' name='capacidadNormal' value='$capacidadNormal'>";
                echo "<input type='hidden' name='camiones' value='$camiones'>";
                echo "<input type='hidden' name='resta' value='$resta'>";
                echo "<br><br>";
                echo "<input type='submit' value='Enviar'>";
                echo "</form>";

            } elseif ($_SESSION["acumulado"] === $resta) {
                $camionesDescargados++;
                echo "El camión $camionesDescargados se descargó correctamente.br>";
                if ($camionesDescargados < $camiones) {
                    echo "<a href='index.php?camionesDescargados=$camionesDescargados&camiones=$camiones&sacosEspeciales=$sacosEspeciales&sacosDefectuosos=$sacosDefectuosos&contenedorNormal=$contenedorNormal&contenedorEspecial=$contenedorEspecial&capacidadNormal=$capacidadNormal&capacidadEspecial=$capacidadEspecial'>Continuar</a>";
                } else {
                    echo "Todos los camiones se han descargado. Por favor, revisa las estadísticas.<br>";
                }
                echo "<a href='estadisticas.php'>Ir a estadísticas</a>";

                $camiones = isset($_SESSION["camiones"]) ? $_SESSION["camiones"] : array();
                $acumulados = isset($_SESSION["acumulados"]) ? $_SESSION["acumulados"] : array();
                $camiones[] = $camionesDescargados; // Asociamos el acumulado al camión actual
                $acumulados[] = $acumulado;
                $_SESSION["sacosEspeciales"] = $sacosEspeciales;
                $_SESSION["sacosDefectuosos"] = $sacosDefectuosos;
                $_SESSION["camiones"] = $camiones;
                $_SESSION["acumulados"] = $acumulados;
                $_SESSION["contenedorEspecial"] =$contenedorEspecial;
                $_SESSION["contenedorNormal"] = $contenedorNormal;
                $_SESSION["capacidadEspecial"] = $capacidadEspecial;
                $_SESSION["capacidadNormal"] = $capacidadNormal;
            }

           
        }
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
        

         

        ?>
    </div>
</body>
</html>
