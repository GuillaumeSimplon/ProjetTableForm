<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/class/TaskClass.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/manager/TaskManager.php");

    $manager = new TaskManager ();



    if (!empty($_POST["title"]) && !empty($_POST["description"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    if (isset($_POST["important"])) {
    $important = 1;
}
else {
    $important = 0;
}

    $manager->createTask($title, $description, $important);
    }
    else if (!empty($_GET["delete"])){
        $id = $_GET["delete"];
        $manager->deleteStakById($id);
    }


?>


<link rel="stylesheet" href="./styles/style.css">

<main>
    <table>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Important</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>

        <?php
            $task = new Task();
            $statement = $manager->getAllTasks();
            foreach ($statement as $key => $value) {
                echo('<tr>');
                echo('<th>' . $value->getId() . '</th>');
                echo('<td>' . $value->getTitle() . '</td>');
                echo('<td>' . $value->getDescription() . '</td>');
                echo('<td>' . ($value->getImportant() ? "Fait" : "À faire") . '</td>');

                echo('<td>' . "<a class='edit' href='/edition/taskEdition.php?task=" . $value->getId() . "'>Update</a>" . '</td>');
                echo('<td>' . "<a class='delete' href='/task.php?delete=" . $value->getId() . "'>Delete</a>" . '</td>');

                echo('</tr>');
            }
        ?>

    </table>



    <form action="./task.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <input type="text" name="description" id="description">     
        
        <label class="important" for="important">Important</label>
        <input type="checkbox" name="important" id="important">

        <input type="submit" value="Confirmer">
    </form>

</main>