<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encriptar Frase X' a X''</title>
</head>
<body>
    <h1>Encriptar Frase X' a X''</h1>
    <form method="POST" action="">
        <label for="frase">Introduce la frase X':</label><br><br>
        <input type="text" id="frase" name="frase" required>
        <br><br>
        <input type="submit" value="Encriptar a X''">
    </form>

    <?php
        // Verificar si el formulario ha sido enviado
        if (isset($_POST['frase'])) {
            // Recoger la frase ingresada en el formulario de manera segura
            $fraseX1 = $_POST['frase'];

            // Función para encriptar de X' a X''
            function encriptarX2($frase) {
                // Obtener la longitud de la frase
                $longitud = strlen($frase);

                // Inicializar la variable que contendrá la frase encriptada
                $fraseEncriptada = '';

                // Inicializar los índices para recorrer la frase de principio a fin
                $inicioFrase = 0; // Inicio de la frase
                $finalFrase = $longitud - 1; // Fin de la frase

                // Bucle para recorrer la frase hasta que los índices se crucen
                while ($inicioFrase <= $finalFrase) {
                    // Tomar el carácter de la izquierda (inicioFrase)
                    $fraseEncriptada .= $frase[$inicioFrase];

                    // Incrementar el inicio de la frase
                    $inicioFrase++; 

                    // Tomar el carácter de la derecha (finalFrase) si no se han cruzado
                    if ($inicioFrase <= $finalFrase) {
                        $fraseEncriptada .= $frase[$finalFrase];

                        // Decrementar el final de la frase
                        $finalFrase--; 
                    }
                }

                // Retornar la frase encriptada
                return $fraseEncriptada;
            }

            // Aplicar la función a la frase recibida y guardar el resultado
            $fraseX2 = encriptarX2($fraseX1);

            // Mostrar el resultado, usando htmlspecialchars para evitar problemas de seguridad
            echo "<h2>Frase encriptada a X'':</h2>";
            echo "<p>" . htmlspecialchars($fraseX2) . "</p>";
        }
    ?>

</body>
</html>
