<?php

namespace App\Controllers;

use App\Models\Task;
use App\Utils\AbstractController;



class TaskController extends AbstractController
{
    public function addTask()
    {
        if(isset($_POST['addTask'])){
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $this->totalCheck('title', $title);
            $this->totalCheck('description', $description);
            
            if(empty($this->arrayError)){
                $task = new Task(null, $title, $description, null);
                $task->addTask();
                $this->redirectToRoute('/', 200);
            }
        }
        require_once(__DIR__ . "/../Views/addTask.view.php");
    }


    public function task()
    {
            if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $list = new Task($id, null, null, null);
            $myList = $list->getTaskById();

            require_once(__DIR__ . "/../Views/editTask.view.php");
        }
    }

}
