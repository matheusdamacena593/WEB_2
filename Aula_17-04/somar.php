<?php

if (isset($_POST['txtNumero']) && is_array($_POST['txtNumero'])) {
    $soma = 0;
    $media = 0;
    $minimo = 0;
    $maximo = 0;
    $somaPares = 0;
    $qtdPares = 0;
    $mediaPares = 0;

    $numerosValidos = array_filter($_POST['txtNumero'], function($valor) {
        return $valor !== '' && is_numeric($valor);
    });

    if (empty($numerosValidos)) {
        echo "<p>Nenhum numero Digitado.</p>";
        exit;
    }

    $numDigitados = count($numerosValidos);

    foreach ($numerosValidos as $valor) {
        if ($valor % 2 == 0) {
            $qtdPares++;
            $somaPares += $valor;
        }
        
        $soma += $valor;
    }

    $media = $soma / $numDigitados;
    $minimo = min($numerosValidos);    
    $maximo = !empty($numerosValidos) ? max($numerosValidos) : 'Nenhum número válido enviado';

    if ($somaPares != 0) {
        $mediaPares = $somaPares / $qtdPares;
    }

    echo "<p>O resultado da soma é: " . $soma . "</p>";
    echo "<p>Quantidade de numeros digitados: " . $numDigitados . "</p>";
    echo "<p>O resultado da media é: " . number_format($media, 2) . "</p>";
    echo "<p>O menor número é: " . $minimo . "</p>";
    echo "<p>O maior número é: " . $maximo . "</p>";
    echo "<p>O resultado da media dos números pares é: " . number_format($mediaPares, 2) . "</p>";
}

