<?php
/**
 * Created by PhpStorm.
 * User: BRIET
 * Date: 07/12/2017
 * Time: 14:40
 */


include_once '../inc/Config.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
   $task_id   = $_POST['task_id'];


    $query = mysqli_query($cnx, "DELETE FROM tasks WHERE task_id = $task_id ") or die("<div class=\"alert alert-danger\" role=\"alert\"> ERRO => ".mysqli_error($cnx)."</div>");
    if($query){
        echo "<div class=\"alert alert-success\" role=\"alert\">Tarefa DELETADA com sucesso!</div><br>";
    }
}else{
    echo "<div class=\"alert alert-success\" role=\"danger\">ERRO</div><br>";
}