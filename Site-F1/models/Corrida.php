<?php

class Corrida {
    private $pista;
    private $local;
    private $data;
    private $url;

    public function setPista($pista) {
        $this->pista = $pista;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getPista() {
        return $this->pista;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getData() {
        return $this->data;
    }

    public function getUrl() {
        return $this->url;
    }
}