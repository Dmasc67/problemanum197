<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desencriptar Frase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Desencriptar Frase</h1>

    <!-- Formulario para ingresar la frase -->
    <form method="POST">
        <label for="frase">Introduce la frase encriptada:</label><br>
        <input type="text" id="frase" name="frase" required><br><br>
        <input type="submit" value="Desencriptar">
    </form>

    <?php
        function desencriptarFrase($frase) {
            $vocales = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
            $resultado = '';
            $caracteresEntreVocales = '';
            $longitudFrase = strlen($frase);
            for ($i = 0; $i < $longitudFrase; $i++) {
                $caracter = $frase[$i];
                if (in_array($caracter, $vocales)) {
                    $resultado .= strrev($caracteresEntreVocales);
                    $resultado .= $caracter;
                    $caracteresEntreVocales = '';
                } else {
                    $caracteresEntreVocales .= $caracter;
                }
            }

            $resultado .= strrev($caracteresEntreVocales);

            return $resultado;
        }

        if (isset($_POST['frase'])) {
            $frase_encriptada = $_POST['frase'];
            $frase_desencriptada = desencriptarFrase($frase_encriptada);
            echo "<h2>Frase desencriptada: </h2>";
            echo "<p><strong>" . htmlspecialchars($frase_desencriptada) . "</strong></p>";
        }

    ?>
</body>
</html>
