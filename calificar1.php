<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calificación</title>
    <style>
        .correcta {
            background-color: #aaffaa; /* Verde claro */
        }

        .incorrecta {
            background-color: #ffaaaa; /* Rojo claro */
        }
    </style>
</head>
<body>
    <h2>Calificación de la Tabla de Multiplicar</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $respuestasUsuario = $_POST['respuestas'];
        $numero = $_POST['numero'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];

        echo "<p>Respuestas del usuario:</p>";
        echo "<table border='1'>";
        $puntaje = 0;

        for ($i = $inicio; $i <= $fin; $i++) {
            $correcta = $numero * $i;
            $respuestaUsuario = $respuestasUsuario[$i - $inicio];

            $esCorrecta = ($respuestaUsuario == $correcta);
            $estado = $esCorrecta ? "Correcta" : "Incorrecta";
            $claseCSS = $esCorrecta ? "correcta" : "incorrecta";

            echo "<tr class='$claseCSS'><td>$numero x $i</td><td>Respuesta: $respuestaUsuario</td><td>Correcta: $correcta</td><td>$estado</td></tr>";

            if ($esCorrecta) {
                $puntaje++;
            }
        }

        echo "</table>";

        $totalPreguntas = $fin - $inicio + 1;
        $porcentajeAciertos = ($puntaje / $totalPreguntas) * 100;

        echo "<br><p>Puntaje total: $puntaje / $totalPreguntas</p>";
        echo "<p>Porcentaje de aciertos: " . number_format($porcentajeAciertos, 2) . "%</p>";

    } else {
        echo "<p>Error al procesar las respuestas. Por favor, vuelve a intentarlo.</p>";
    }
    ?>
</body>
</html>
