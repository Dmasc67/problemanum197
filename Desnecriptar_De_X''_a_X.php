<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptar Frase X'' a X</title>
</head>
<body>
    <h1>Desencriptar Frase X'' a X</h1> 
    
    <form method="post" action="">
        <label for="frase">Introduce la frase X'' (por ejemplo: BnodJo s, dBneam):</label><br><br>
        <input type="text" id="frase" name="frase" required>
        <br><br>
        <input type="submit" value="Desencriptar a X">
    </form>

    <?php
    // Comprobar si se ha enviado el formulario
    if (isset($_POST['frase'])) {
        // Recoger la frase ingresada en el formulario
        $fraseX2 = $_POST['frase'];

        // Función para desencriptar de X'' a X'
        function desencriptarX2($frase) {
            $longitud = strlen($frase);
            $resultado = array_fill(0, $longitud, '');  
            $caracteresInicio = 0;
            $caracteresFinal = $longitud - 1;
            $pos = 0;

            while ($pos < $longitud) {
                if ($pos % 2 == 0) {
                    $resultado[$caracteresInicio] = $frase[$pos];
                    $caracteresInicio++; 
                } else {
                    $resultado[$caracteresFinal] = $frase[$pos];
                    $caracteresFinal--; 
                }
                $pos++;
            }
            return implode('', $resultado);  
        }

        // Función para desencriptar de X' a X
        function desencriptarX1($frase) {
            // Lista de vocales
            $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
            $resultado = '';  // Almacena la frase final
            $caracteresEntreVocales = '';  // Almacena caracteres no vocales entre vocales
            $longitudFrase = strlen($frase);

            // Recorremos la frase desde el principio hasta el final.
            for ($i = 0; $i < $longitudFrase; $i++) {
                $caracter = $frase[$i];  // Carácter actual
                
                if (in_array($caracter, $vocales)) {
                    // Si el carácter es vocal, invertir los caracteres anteriores no vocales
                    $resultado .= strrev($caracteresEntreVocales);
                    $resultado .= $caracter;  // Añadir la vocal al resultado
                    $caracteresEntreVocales = '';  // Limpiar la secuencia de caracteres no vocales
                } else {
                    // Si no es vocal, almacenarlo temporalmente
                    $caracteresEntreVocales .= $caracter;
                }
            }
            // Añadir cualquier grupo de caracteres no vocales restante al final
            $resultado .= strrev($caracteresEntreVocales);

            return $resultado;
        }

        // Paso 1: Desencriptar de X'' a X'
        $fraseX1 = desencriptarX2($fraseX2);

        // Paso 2: Desencriptar de X' a X
        $fraseX = desencriptarX1($fraseX1);

        // Mostrar el resultado usando htmlspecialchars para evitar inyección de código
        echo "<h2>Frase desencriptada a X:</h2>";
        echo "<p>" . htmlspecialchars($fraseX) . "</p>";
    }
    ?>
</body>
</html>
