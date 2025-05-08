<?php

class Noticia {
    private $id;
    private $titulo;
    private $descricao;
    private $url;
    private $data;
    private $autor;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function setdescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }
    
    public function setautor($autor) {
        $this->autor = $autor;
    }

    public function getAutor() {
        return $this->autor;
    }
    
}