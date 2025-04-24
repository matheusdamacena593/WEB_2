<?php

class VerUrl
{
    function trocarUrl($url)
    {
        $secoes = array("home","corridas","pilotos","equipes");

        if (empty($url) || !in_array( $url, $secoes)) {
            $url = "secoes/home.php";
        } else {
            $url = "secoes/$url.php";
        }

        include_once($url);
    }
}