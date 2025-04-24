<?php

for ($i = 0; $i <= $_POST["exclamacao"]; $i++) {
    echo "<br/>";
    for ($j = 0; $j < $i; $j++) {
        echo "!";
    }
}
