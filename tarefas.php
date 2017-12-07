<?php
include_once './inc/Config.php'; // CONFIGURAÇÕES DO SITE
include_once './inc/gpConfig.php'; // CONFIGURAÇÕES DO GOOGLE
include_once './inc/header.php';
include_once './inc/nav.php';
?>


<div class="container">
    <br><br>
    <div class="row">
        <div class="col">
            <div class="float-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-new-task"><span class="fa fa-tasks"></span> NOVA TAREFA</button>

                <!-- Modal CADASTRO -->
                <div class="modal fade" id="modal-new-task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">NOVA TAREFA</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body " id="ajaxCreate-tarefa">
                                <div class="aviso-task">

                                </div>
                                <form id="create-task" method="POST">
                                    <div class="form-group">
                                        <label for="task_name">Nome da Tarefa</label>
                                        <input type="text" name="task_name" class="form-control" id="task_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="task_level">Nível de Prioridade</label>
                                        <select class="form-control" name="task_level" id="task_level">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <button type="submit" onclick="createAjax('#create-task', 'action/create_task.php', '#ajaxCreate-tarefa')" class="btn btn-primary">Submit</button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>




                <div class="modal fade" id="modal-update-task" tabindex="-1" role="dialog" aria-labelledby="modal-update-task" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" >New message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="update-task">
                                <div class="aviso-task">

                                </div>
                                <form id="form-update-task">
                                    <input type="hidden" id="task_id" name="task_id">
                                    <div class="form-group">
                                        <label for="task_name" class="col-form-label">Nome:</label>
                                        <input type="text" class="form-control" id="task_name" name="task_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="task_description" class="col-form-label">Descrição:</label>
                                        <textarea class="form-control" id="task_description" name="task_description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="task_level">Nível de Prioridade</label>
                                        <select class="form-control" name="task_level" id="task_level">
                                            <option value="">Selecione...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="task_level">Status</label>
                                        <select class="form-control" name="task_status" id="task_status">

                                        </select>
                                    </div>

                                    <button type="submit" onclick="updateAjax('#form-update-task', 'action/update_task.php', '#update-task');" class="btn btn-info float-right"><span class="fa fa-save"></span> SALVAR</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <br><br>

    <div class="row-fluid">
        <h1>Lista de Tarefas</h1>
        <br><br><br>
        <div class="col" id="list-task"></div>
        <br><br><br>
    </div>
</div>


<?php
include_once './inc/footer.php';
?>
