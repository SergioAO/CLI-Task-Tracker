<?php
// src/task_tracker.php

const FILE_PATH = '../tasks.json';

// Función para cargar tareas desde el archivo JSON
function loadTask()
{
    if (!file_exists(FILE_PATH)) 
    {
        return [];
    }
    $json = file_get_contents(FILE_PATH);
    return json_decode($json, true) ?? [];
}

// Función para guardar tareas en el archivo JSON
function saveTask($tasks)
{
    file_put_contents(FILE_PATH, json_encode($tasks, JSON_PRETTY_PRINT));
}

// Función para generar un nuevo ID
function generateID($tasks)
{
    return count($tasks) > 0 ? max(array_column($tasks, 'id')) + 1 : 1;
}

// Función para agregar una tarea
function addTask($description)
{
    $tasks = loadTask();
    $task = [
        'id' => generateID($tasks),
        'description' => $description,
        'status' => 'todo',
        'createAt' => date('d/m/Y H:i:s'),
        'updateAt' => date('d/m/Y H:i:s')
    ];
    $tasks[] = $task;
    saveTask($tasks);
    echo 'Tarea añadida: {$description}\n';
}

//Función para actualizar una tarea
function updateTask($id, $status)
{

}
