<?php

$n1 = $_POST['n1'];
$n2 = $_POST['n2'];

function soma(&$n1, $n2) {
    $n1 = $n1 + $n2;
}

soma($n1, $n2);

echo "<p>A soma dos números é: " . $n1 . "</p>";
