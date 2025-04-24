<?php

    $altura = $_POST["altura"];
    $peso = $_POST["peso"];

    $imc = $peso / ($altura * $altura);

    echo "<h2>Seu IMC é: " . number_format($imc, 2) . "</h2>";

    if ($imc < 18.5) {
        echo "<p>Classificação: Abaixo do peso</p>";
    } elseif ($imc >= 18.5 && $imc < 25) {
        echo "<p>Classificação: Peso normal</p>";
    } elseif ($imc >= 25) {
        echo "<p>Classificação: Sobrepeso</p>";
    }
