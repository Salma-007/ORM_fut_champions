<?php
include_once('./db_conn.php');
$conn = DatabaseConnection::connect();
class Player{
    private $nom;
    private $nationality;
    private $club;
    private $rating;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    } 

    

    //methode d'insertion 
    public function insert_player($nom,$nationality,$club,$rating){
        $query = "insert into players (name, nationality, club, rating) values ('$nom','$nationality','$club','$rating')";
        $result = $this->conn->query($query);
        if($result){
            echo'inserted success';
        }
        else{
            echo'not inserted';
        }
    }
    // methode de suppression
    public function delete_by_id($id){
        $query = "delete from players where id = $id";
        
    }
    // methode de modification
    public function update_player(){

    }

}

$player1 = new Player($conn);
$player1->insert_player('jawad','maroc','PSG',90);


?>