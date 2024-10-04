<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptar Frase X'' a X'</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Desencriptar Frase X'' a X'</h1> 
    
    <form method="post" action="">
        <label for="frase">Introduce la frase X'' (por ejemplo: BnodJo s, dBneam):</label><br><br>
        <input type="text" id="frase" name="frase" required>
        <br><br>
        <input type="submit" value="Desencriptar a X'">
    </form>

    <?php
    // Comprobar si se ha enviado el formulario
    if (isset($_POST['frase'])) {
        // Recoger la frase ingresada en el formulario
        $fraseX2 = $_POST['frase'];

        // Función para desencriptar de X'' a X'
        function desencriptarX2($frase) {
            // Guardamos la longitud de la frase
            $longitud = strlen($frase);

            // Creamos un array vacío para almacenar los caracteres progresivamente
            $resultado = array_fill(0, $longitud, '');  

            // Índice para colocar caracteres desde el inicio
            $caracteresInicio = 0;
            
            // Índice para colocar caracteres desde el final
            $caracteresFinal = $longitud - 1;
            
            // Índice para recorrer cada carácter de la frase
            $pos = 0;

            // Bucle para recorrer la frase encriptada (X'')
            while ($pos < $longitud) {

                // Si la posición actual es par, colocar el carácter en la posición original (desde la izquierda)
                if ($pos % 2 == 0) {
                    $resultado[$caracteresInicio] = $frase[$pos];
                    $caracteresInicio++; // Incrementar el índice izquierdo para la próxima iteración
                } else {
                    // Si la posición es impar, colocar el carácter en la posición original (desde la derecha)
                    $resultado[$caracteresFinal] = $frase[$pos];
                    $caracteresFinal--; // Decrementar el índice derecho para la próxima iteración
                }

                // Incrementar posición para el siguiente carácter
                $pos++;
            }

            // Convertir el array de caracteres de vuelta a una cadena y retornar el resultado
            return implode('', $resultado);  
        }

        // Desencriptar la frase X'' a X'
        $fraseX1 = desencriptarX2($fraseX2);

        // Mostrar el resultado usando htmlspecialchars para evitar inyección de código
        echo "<h2>Frase desencriptada a X':</h2>";
        echo "<p>" . htmlspecialchars($fraseX1) . "</p>";
    }
    ?>
</body>
</html>
