<?php
/**
 * Created by PhpStorm.
 * User: BRIET
 * Date: 07/12/2017
 * Time: 15:00
 */
include_once '../inc/Config.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $task_id            = $_POST['task_id'];
    $task_name          = $_POST['task_name'];
    $task_description   = $_POST['task_description'];
    $task_level          =$_POST['task_level'];
    $task_status        = $_POST['task_status'];

    if(empty($task_name) || empty($task_level)){
        echo "<div class=\"alert alert-warning\" role=\"alert\">Verefique os campos!</div><br>";
        die();
    }

    $query = mysqli_query($cnx, "UPDATE tasks SET  task_name = '$task_name', task_description = '$task_description', task_level = '$task_level', task_status = '$task_status' WHERE task_id= $task_id ") or die("<div class=\"alert alert-danger\" role=\"alert\"> ERRO => ".mysqli_error($cnx)."</div>");

    if($query){
        echo "<div class=\"alert alert-success\" role=\"alert\">Tarefa EDITADA com sucesso!</div><br>";
    }
}else{
    echo "<div class=\"alert alert-success\" role=\"danger\">ERRO</div><br>";
}