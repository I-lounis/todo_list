<?php

namespace App\Controllers;

use App\Models\Task;

class HomeController
{
    public function index()
    {
        $searchTask = new Task(null, null, null, null);
        $tasks = $searchTask->getAllTask();
        
        require_once(__DIR__ . "/../Views/home.view.php");       
    }
}