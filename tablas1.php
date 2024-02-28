<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar</title>
</head>
<body>
    <h2>Tabla de Multiplicar</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = $_POST['numero'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];

        // Ordenar el rango
        $temp = $inicio;
        $inicio = min($inicio, $fin);
        $fin = max($temp, $fin);

        echo "<form method='post' action='calificar1.php'>";
        echo "<p>Tabla de multiplicar del $numero en el rango [$inicio - $fin]</p>";
        echo "<table border='1'>";
        for ($i = $inicio; $i <= $fin; $i++) {
            echo "<tr><td>$numero x $i</td><td><input type='number' name='respuestas[]' required></td></tr>";
        }
        echo "</table>";
        echo "<br><input type='submit' value='Calificar'>";
        echo "<input type='hidden' name='numero' value='$numero'>";
        echo "<input type='hidden' name='inicio' value='$inicio'>";
        echo "<input type='hidden' name='fin' value='$fin'>";
        echo "</form>";

    } else {
    ?>
        <form method="post" action="tablas1.php">
            <label for="numero">Número:</label>
            <input type="number" name="numero" required>

            <label for="inicio">Inicio del rango:</label>
            <input type="number" name="inicio" required>

            <label for="fin">Fin del rango:</label>
            <input type="number" name="fin" required>

            <br><br>
            <input type="submit" value="Generar Tabla">
        </form>
    <?php
    }
    ?>
</body>
</html>

