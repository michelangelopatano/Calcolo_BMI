<?php
    $err = false;
    $bmi = 0;
    $nome = "";
    $classe_bmi = "";
    $descrizione_bmi = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = htmlspecialchars($_POST["nome"] ?? "");
        $peso = floatval($_POST["peso"] ?? 0);
        $altezza_cm = floatval($_POST["altezza"] ?? 0);

        if ($peso > 0 && $altezza_cm > 0) {
            $altezza_m = $altezza_cm / 100;
            $bmi = $peso / ($altezza_m * $altezza_m);

            if ($bmi < 18.5) {
                $classe_bmi = "sottopeso";
                $descrizione_bmi = "SOTTOPESO";
            } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
                $classe_bmi = "normopeso";
                $descrizione_bmi = "NORMOPESO";
            } elseif ($bmi >= 25 && $bmi <= 29.9) {
                $classe_bmi = "sovrappeso";
                $descrizione_bmi = "SOVRAPPESO";
            } else {
                $classe_bmi = "obesita";
                $descrizione_bmi = "OBESITÀ";
            }
        } else {
            $err = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolatore BMI - Risultato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "GET" || $err):
    ?>
        <div class="container">
            <h1>Calcolatore BMI</h1>
            <main class="card">
                <form action="index.php" method="POST">
                    <div>
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Luca" required>
                    </div>
                    <div>
                        <label for="peso">Peso (kg)</label>
                        <input type="number" id="peso" name="peso" step="any" placeholder="70" required>
                    </div>
                    <div>
                        <label for="altezza">Altezza (cm)</label>
                        <input type="number" id="altezza" name="altezza" step="any" placeholder="180" required>
                    </div>
                    <button type="submit">Calcola</button>
                </form>
            </main>
        </div>
    <?php 
        else:
    ?>
        <div class="container">
            <h1>Risultato per <?php echo $nome; ?></h1>
            <main class="card card-risultato <?php echo $classe_bmi; ?>">
                <div class="bmi-valore"><?php echo number_format($bmi, 2, '.', ''); ?></div>
                <div class="bmi-etichetta"><?php echo $descrizione_bmi; ?></div>
            </main>
        </div>
    <?php 
        endif;
    ?>
</body>
</html>