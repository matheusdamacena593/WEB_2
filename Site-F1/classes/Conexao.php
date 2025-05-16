<?php

abstract class Conexao {
    protected $host;
    protected $user;
    protected $pass;
    protected $dba;
    protected $conn;
    protected $sql;
    protected $qr;
    protected $data;
    protected $status;
    protected $totalFields;
    protected $error;

    public function __construct() {
        $this->host = "mysql";
        $this->user = "root";
        $this->pass = 'root';
        $this->dba = "db_formula1";
        self::connect();
    }

    public function connect () {
        $this->conn = @mysqli_connect($this->host, $this->user, $this->pass) or die ('erro');
        $this->dba = @mysqli_select_db($this->conn, $this->dba) or die ("erro 2");
        mysqli_set_charset($this->conn, 'utf8');
        return $this->conn;
    }

    protected function execSQL ($sql) {
        $this->qr = @mysqli_query($this->conn, $sql) or die ("erro 3");
        return $this->qr;
    }

    protected function listQr ($qr) {
        $this->data = @mysqli_fetch_assoc($qr);
        return $this->data;
    }

    protected function countData ($qr) {
        $this->totalFields = @mysqli_num_rows($qr);
        return $this->totalFields;
    }
}
