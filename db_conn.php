<?php

class Connect_db{
    private $host;
    private $password;
    private $username;
    private $dbname;
    private $pdo;

    public function __construct($host = 'localhost', $dbname = 'orm_fut_champions', $username = 'root', $password = '', $charset = "utf8mb4") {
        try {
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

$dbb = new Connect_db();
$dbb->getConnection(); 
?>