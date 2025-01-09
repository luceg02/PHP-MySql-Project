<?php
class Connection {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $db;

    public function __construct() {
        $this->host = 'np16029-001.privatesql:35815';
        $this->dbname = 'licence12';
        $this->username = 'licence12';
        $this->password = 'f24aACdfbf';
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, $this->password);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getDb() {
        return $this->db;
    }
}