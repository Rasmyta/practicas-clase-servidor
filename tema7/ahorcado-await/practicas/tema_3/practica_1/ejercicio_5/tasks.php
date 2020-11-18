<?php
session_start();
include('createTasksHTML.php');

// desc, fecha limite, prioridad

if (isset($_POST['action'])) {
  if ($_POST['action'] == 'addTask') {
    addTask();
  } elseif ($_POST['action'] == 'clearTasks') {
    clearTasks();
  } elseif ($_POST['action'] == 'deleteTask') {
    deleteTask($_POST['id']);
  }
}

echo createTasksHTML();

function addTask()
{
  $desc = $_POST['desc'];
  $priority = $_POST['priority'];
  $dueDate = $_POST['due-date'];
  $_SESSION['tasks'][] = array('desc' => $desc, 'dueDate' => $dueDate, 'priority' => $priority);
}

function deleteTask($id)
{
  unset($_SESSION['tasks'][$id]);
  $_SESSION['tasks'] = array_values($_SESSION['tasks']);
}

function clearTasks()
{
  $_SESSION['tasks'] = array();
}
