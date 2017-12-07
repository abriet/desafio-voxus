<?php
include_once '../inc/Config.php';
?>

    <table id="profissionais" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Tarefa</th>
        <th>Descrição</th>
        <th>Level</th>
        <th>Status</th>
        <th>Autor</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Tarefa</th>
        <th>Descrição</th>
        <th>Level</th>
        <th>Status</th>
        <th>Autor</th>
        <th>Ação</th>
    </tr>
    </tfoot>
    <tbody >
<?php
$user_id    =$userData['user_id'];
$query = mysqli_query($cnx,"SELECT tasks.* , users.* FROM tasks INNER JOIN users ON tasks.user_id = users.user_id WHERE tasks.user_id = $user_id" );
while($row = mysqli_fetch_array($query)):
    ?>
    <tr id="task-<?php echo $row['task_id'] ?>">
        <td><?php echo $row['task_name'] ?></td>
        <td><?php echo $row['task_description'] ?></td>
        <td><?php echo $row['task_level'] ?></td>
        <td><?php echo $row['task_status'] ?></td>
        <td><?php echo $row['first_name'] ?></td>
        <td class="text-center"><a style="text-decoration: none;" data-toggle="modal" href="#modal-update-task" class="fa fa-pencil-square-o" style="color:darkblue;"
            data-id="<?php echo $row['task_id'] ?>" data-task_name="<?php echo $row['task_name'] ?>" data-task_description="<?php echo $row['task_description'] ?>" data-task_level="<?php echo $row['task_level'] ?>" data-task_status="<?php echo $row['task_status'] ?>" ">  </a> | <span class="fa fa-trash-o" style="color: darkred;" onclick="(confirm('Você deseja deletar a tarefa de id # <?php echo $row['task_id'] ?> ?')) ? deleteAjax(<?php echo $row['task_id'] ?>, '#task-'+<?php echo $row['task_id'] ?> ) : alert('Você cancelou e nada foi deletado!') "></span></td>
    </tr>
    <?php
endwhile;
?>
    </tbody>
    </table>
<script>
    $(document).ready(function () {
        $('#profissionais').dataTable();
    });
</script>