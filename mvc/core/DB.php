<?php

class DB{

    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $db = "mobilestore_mysql";
    public $conn;

    function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->db);
        // mysqli_query($this->conn, "SET NAMES 'uft8'");
        mysqli_set_charset($this->conn,"utf8");
    }

    // public function update2($sql)
    // {
    //     mysqli_query($this->conn, $sql) or die();
    //     return mysqli_affected_rows($this->link);
    // }
}
