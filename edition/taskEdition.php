<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/task.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/manager/TaskManager.php");
    // require_once('./task.php');
    // require_once('./manager/TaskManager.php');


        if(!empty($_GET["task"])){
            $taskManager = new TaskManager();
            if(!empty($_POST["title"]) && !empty($_POST["description"])){

                $new_task = new Task();
                $new_task->setID($_GET["task"]);
                $new_task->setTitle($_POST["title"]);
                $new_task->setDescription($_POST["description"]);
                $new_task->setImportant(1);
                $taskManager->updateTask($new_task);
                // header("Location:/task.php");
                exit();
            }
            $html_table = "<table>\n"
            . "<tr>\n"
            . "<th>#</th>\n"
            . "<th>Title</th>\n"
            . "<th>Description</th>\n"
            . "<th>Important</th>"
            . "</tr>"
            . "<tr>";

            $task_id = $_GET['task'];



            // $taskManager = new taskManager();
            $task = $taskManager->getTaskByID($task_id);
            $html = "<th>\n"
            . $task->getID() . "\n"
            . "</th>\n"

            ."<td>\n"
            . $task->getTitle() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $task->getDescription() . "\n"
            . "</td>\n"

            ."<td>\n"
            . $task->getImportant() . "\n"
            . "</td>\n";
                
            $html_end_table = "</tr>\n"
            . "</table>";


            $options = "";


            $html_form =
              "<form action='/edition/taskEdition.php?task=" . $task_id . "' method='post'>"
            . "<label for='title'>Title Modification</label>"
            . "<input type='text' name='title' value='" . $task->getTitle() . "'>"

            . "<label for='description'>Description Modification</label>"
            . "<input type='text' name='description' value='" . $task->getDescription() . "'>"

            . "<input type='submit' value='Confirm'>"
            . "</form>";


            $taskManager = new TaskManager();
            if ($taskManager->taskExist(intval($_GET["task"]))) {
                echo($html_table);
                echo ($html);
                echo($html_end_table);

                echo($html_form);
            }
        }
    ?>

        
    
