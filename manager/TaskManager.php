<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/manager/DBManager.php");
        // include_once ('./manager/DBManager.php');
        // include_once ('./edition/taskEdition.php');

        class TaskManager extends DBManager {
            
            // Se connecter à la table task
            public function getAllTasks () {
                // préparer la connection avec le DBManager et faire une requete pour prendre toute la table task
                $prepare = $this->getConnexion()->query("SELECT * FROM `task`");
                // Créer un tableau vide qui stockera les colonnes
                $tasks = [];
                // Créer une boucle pour récupérer les colonnes qui alimenteront le tableau vide
                foreach ($prepare as $taskData){
                // Créer un nouvelle class étendue qui récupère les colonnes
                $task = new Task();
                // Définir les colonnes qui complèteront le tableau
                $task->setId($taskData["id"]);
                $task->setTitle($taskData["title"]);
                $task->setDescription($taskData["description"]);
                $task->setImportant($taskData["important"]);

                $tasks[] = $task;
            }
                return $tasks;
            }


            // Récupère les données de la table task
            public function createTask (string $title, string $description, int $important) {
                $prepare = $this->getConnexion()->prepare("INSERT INTO `task` (title, description, important) VALUES (:title, :description, :important);");
                $prepare->bindValue(":title", $title);
                $prepare->bindValue(":description", $description);
                $prepare->bindValue(":important", $important);
                $prepare->execute();
            }


            public function getTaskById (int $id) {
                $data = $prepare = $this->getConnexion()->prepare("SELECT * FROM `task` WHERE id =?");
                $prepare->execute([$id]);

                foreach ($data as $key => $value) {
                    $task = new Task();
                    $task->setId($value["id"]);
                    $task->setTitle($value["title"]);
                    $task->setDescription($value["description"]);
                    $task->setImportant($value["important"]);
                    return $task;
                }
                return null;
            }




            public function taskExist(int $id) {
                $data = $prepare = $this->getConnexion()->prepare("SELECT * FROM `task` WHERE id = ?");
                $prepare->execute([
                    $id
                ]);
    
                return !empty($data->fetch());
            }


            public function updateTask(Task $task) {
                $prepare = $this->getConnexion()->prepare("UPDATE `task` SET title = ?, description = ?, important = ? WHERE id = ?");
                $prepare->execute([
                    $task->getTitle(),
                    $task->getDescription(),
                    $task->getImportant(),
                    $task->getID()
                ]);
            }



            public function deleteStakById (int $id) {
                $data = $prepare = $this->getConnexion()->prepare("DELETE FROM `task` WHERE id =?");
                $prepare->execute([$id]);

                return !empty($data->fetch());
            }
 
            
        }
?>