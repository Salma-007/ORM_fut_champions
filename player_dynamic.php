<?php 
include_once('./db_conn.php');
$conn = DatabaseConnection::connect();

class PlayerDynamic{
    private $conn;

    public function __construct($conn) {
        $this->setConn($conn);
    } 
    public function setConn($conn){
        $this->conn = $conn;
    }

    // methode d'insertion joueur
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


    // methode de suppression d'un joueur
    function deleteRecord($conn, $table, $id) {
        // Use prepared statements to prevent SQL injection
        $sql = "DELETE FROM $table WHERE id = :id";
        
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            die("Error in prepared statement: " . print_r($conn->errorInfo(), true));
        }
        // Execute the prepared statement with the parameters
        $result = $stmt->execute([':id' => $id]);
        
        return $result;
    }

    // methode de update d'un joueur
    function updateRecord($conn, $table, $data, $id) {
        // Use prepared statements to prevent SQL injection
        $args = array();
    
        foreach ($data as $key => $value) {
            $args[] = "$key = ?";
        }
    
        $sql = "UPDATE $table SET " . implode(',', $args) . " WHERE id = ?";
    
        $stmt = $conn->prepare($sql);
    
        if (!$stmt) {
            die("Error in prepared statement: " . print_r($conn->errorInfo(), true));
        }
    
        // Bind parameters to the prepared statement
        $params = array_values($data);
        $params[] = $id;
    
        // Execute the prepared statement with the parameters
        $result = $stmt->execute($params);
    
        return $result;
    }

    //methode d'affichage de tous les joueurs
    public function listPlayers($conn) {
        $query = "SELECT * FROM players;";
        $stmt = $conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if ($result) {
            echo '<table border="1">';
            echo '<tr>';
            // Output the column headers
            foreach (array_keys($result[0]) as $column) {
                echo '<th>' . htmlspecialchars($column) . '</th>';
            }
            echo '</tr>';
    
            // Output the rows
            foreach ($result as $row) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . htmlspecialchars($value) . '</td>';
                }
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            echo 'No records found.';
        }
    }

}


// Instanciation
$player1 = new PlayerDynamic($conn);
// $insertData = array('name' => 'taha', 'club' => 'Man City','nationality' => 'England','rating' => 55);
// $player1->insertRecord($conn, 'players', $insertData);
// $player1->deleteRecord($conn,'players', 2);
// $updateData = array('name' => 'Jude belligoal', 'nationality' => 'english');
// $player1->updateRecord($conn,'players',$updateData,3);
$player1->listPlayers($conn);


?>