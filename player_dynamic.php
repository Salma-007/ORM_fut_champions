<?php 
include_once('./db_conn.php');
$conn = DatabaseConnection::connect();
class PlayerDynamic{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    } 

    function insertRecord($conn, $table, $data) {
        // Use prepared statements to prevent SQL injection
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " . print_r($conn->errorInfo(), true));
        }

        // Execute the prepared statement
        $result = $stmt->execute(array_values($data));

        return $result;
    }

}


// Insert example
$player1 = new PlayerDynamic($conn);
$insertData = array('name' => 'taha', 'club' => 'Man City','nationality' => 'England','rating' => 55);
$player1->insertRecord($conn, 'players', $insertData);

?>