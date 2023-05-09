<?php
class DBManager {
    private $mysql;

    public function __construct(){
        try{
            $this->mysql = new PDO(
                'mysql:host=localhost;dbname=ToDoList_Vacances;charset=utf8',
                'votre mot de passe 1',
                'votre mot de passe 2'
            );
        }
        catch(PDOException $error) {
            die("Error: " . $error->getMessage());
        }
    }
    public function getConnexion() {
        return $this->mysql;
    }
}
?>