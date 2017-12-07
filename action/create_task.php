<?php

include_once '../inc/Config.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $task_name  = $_POST['task_name'];
    $task_level =$_POST['task_level'];
    $user_id    = $userData['user_id'];

    if(empty($task_name) || empty($task_level)){
        echo "<div class=\"alert alert-warning\" role=\"alert\">Verefique os campos!</div><br>";
        die();
    }

    $query = mysqli_query($cnx, "INSERT INTO tasks( task_name, task_level, user_id ) VALUES ('$task_name','$task_level','$user_id' )") or die("<div class=\"alert alert-danger\" role=\"alert\"> ERRO => ".mysqli_error($cnx)."</div>");

    if($query){
        echo "<div class=\"alert alert-success\" role=\"alert\">Tarefa cadastrada com sucesso!</div><br>";
    }
}else{
    echo "<div class=\"alert alert-success\" role=\"danger\">ERRO</div><br>";
}