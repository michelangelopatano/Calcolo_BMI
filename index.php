<?php
    $err = false
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "GET"){

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
        }else{
            
    ?>

    <div class="box_risultato">
        <h1>Ciao</h1>
    </div>

    <?php 
        }
    ?>

</body>
</html>