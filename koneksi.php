<?php

// Mendefinisikan namespace
namespace Connection{
    // Memanggil library PDO
    use PDO;
    use PDOException;


// Mmebuat class untuk koneksi ke database
class Connect {
    protected $host = "localhost";
    protected $port = 3306;
    protected $database = "tokobangunan";
    protected $username = "root";
    protected $password = "";
    protected $connection;

    // Membuat fungsi untuk koneksi ke database
    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->host:$this->port;dbname=$this->database", $this->username, $this->password);
            // Optional: Set PDO attributes or perform other initialization if needed
        } catch (PDOException $e) {
            // Handle connection errors here
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
} 

}

?>