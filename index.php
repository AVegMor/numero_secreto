<!DOCTYPE html>
<html>

<head>
    <title>Juego del número secreto</title>
</head>

<body>

    <?php
    const MAX_INTENTOS = 4;

    $numeroSecreto = $_REQUEST['numeroSecreto'] ?? rand(0, 50);
    $intentos = $_REQUEST['intentos'] ?? 0;
    $numeroUsuario = $_REQUEST['numero'] ?? null;
    $juegoTerminado = false;

    $mensaje = "Adivina el número entre 0 y 50:";

    if (isset($numeroUsuario)) {
        if ($intentos >= MAX_INTENTOS  && !$juegoTerminado) {
            $mensaje = "HAS SUPERADO EL NÚMERO MÁXIMO DE INTENTOS. El número secreto era: $numeroSecreto";
            $juegoTerminado = true;
        } else {
            $intentos++;
            if ($numeroUsuario > $numeroSecreto) {
                $mensaje = "El número es MENOR. Inténtalo de nuevo:";
            } elseif ($numeroUsuario < $numeroSecreto) {
                $mensaje = "El número es MAYOR. Inténtalo de nuevo:";
            } else {
                $mensaje = "¡ENHORABUENA, HAS ACERTADO! Has necesitado $intentos intentos.";
                $juegoTerminado = true;
            }
        }
    }
    ?>

    <p><?php echo $mensaje; ?></p>

    <?php if (!$juegoTerminado) {

        echo "<form action='index2.php' method='post'>
                <input type='number' name='numero' required><br>
                <input type='hidden' name='numeroSecreto' value=$numeroSecreto>
                <input type='hidden' name='intentos' value= $intentos>
                <br>
                <input type='submit' value='Enviar'>
            </form>";
    } else {
        echo "<form action='index2.php' method='post'>
                <input type='submit' value='Jugar de nuevo'>
            </form>";
    }
    ?>

</body>

</html>