/**
 * Created by BRIET on 07/12/2017.
 */
$(document).ready(function () {
    loadAjax('action/select_task.php', '#list-task');
});





/*
            FUNÇÕES AJAX
 */

/*
formID = ID do formulário que vai ser submetido
action = Arquivo PHP que vai realizar a ação
resID  = Campo de resposta.
 */
function createAjax(formID,action,resID) {

        jQuery(formID).submit(function(){
            var dados = jQuery( this ).serialize();
            var recHtml = $(resID).html();

            jQuery.ajax({
                type: "POST",
                url: action,
                data: dados,
                beforeSend: function () {
                    $(resID).html('<br><br><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></center><br><br>');

                },
                success: function( data )
                {
                    $(resID).html(recHtml);
                    $('.aviso-task').html(data);

                    loadAjax('action/select_task.php', '#list-task');
                }
            });
            return false;
        });
}

function loadAjax(action, resID) {
    jQuery.ajax({
        type: "POST",
        url: action,
        beforeSend: function () {
            $(resID).html('<br><br><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></center><br><br>');
        },
        success: function( data )
        {
            $(resID).html(data);
        }
    });
}

function deleteAjax(idItem, resID) {
    jQuery.ajax({
        type: "POST",
        url: 'action/delete_task.php',
        data: {task_id: idItem},
        beforeSend: function () {
            $(resID).html('<br><br><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></center><br><br>');
        },
        success: function( data )
        {
            $(resID).hide();
        }
    });
}




function updateAjax(formID,action,resID) {

    jQuery(formID).submit(function(){
        var dados = jQuery( this ).serialize();
        var recHtml = $(resID).html();

        jQuery.ajax({
            type: "POST",
            url: action,
            data: dados,
            beforeSend: function () {
                $(resID).html('<br><br><center><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span></center><br><br>');
            },
            success: function( data )
            {
                $(resID).html(recHtml);
                $('.aviso-task').html(data);
                $('.close').click();
                loadAjax('action/select_task.php', '#list-task');
            }
        });
        return false;
    });
}


$('#modal-update-task').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var task_id = button.data('id');
    var task_name = button.data('task_name');
    var task_description = button.data('task_description');
    var task_level = button.data('task_level');
    var task_status = button.data('task_status');

    var modal = $(this);
    modal.find('.modal-title').text('Editar tarefa #' + task_id);
    modal.find('#task_id').val(task_id);
    modal.find('#task_name').val(task_name);
    modal.find('#task_description').val(task_description);
    modal.find('#task_level').html(function () {
        if(task_level == '1'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1' selected >1</option>"
                +"<option value='2'>2</option>"
                +"<option value='3'>3</option>"
                +"<option value='4'>4</option>"
                +"<option value='5'>5</option>");
        }else if(task_level == '2'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1'  >1</option>"
                +"<option value='2' selected >2</option>"
                +"<option value='3'>3</option>"
                +"<option value='4'>4</option>"
                +"<option value='5'>5</option>");
        }else if(task_level == '3'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1'  >1</option>"
                +"<option value='2'  >2</option>"
                +"<option value='3' selected >3</option>"
                +"<option value='4'>4</option>"
                +"<option value='5'>5</option>");
        }else if(task_level == '4'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1'  >1</option>"
                +"<option value='2'  >2</option>"
                +"<option value='3'  >3</option>"
                +"<option value='4' selected >4</option>" +
                "<option value='5' >5</option>");
        }else if(task_level == '5'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1'  >1</option>"
                +"<option value='2'  >2</option>"
                +"<option value='3'  >3</option>"
                +"<option value='4'  >4</option>" +
                "<option value='5' selected >5</option>");
        }
    });

    modal.find('#task_status').html(function () {
        if(task_status == 'Nova'){
                $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1' selected >Nova</option>"
                +"<option value='2'>Em Processo</option>"
                +"<option value='3'>Pronta</option>"
                +"<option value='4'>Finalizada</option>");
        }else if(task_status == 'Em processo'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1'  >Nova</option>"
                +"<option value='2' selected >Em Processo</option>"
                +"<option value='3'>Pronta</option>"
                +"<option value='4'>Finalizada</option>");
        }else if(task_status == 'Pronta'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1'  >Nova</option>"
                +"<option value='2'  >Em Processo</option>"
                +"<option value='3' selected >Pronta</option>"
                +"<option value='4'>Finalizada</option>");
        }else if(task_status == 'Finalizada'){
            $(this).html("<option value=''>Selecione...</option>"
                +"<option value='1'  >Nova</option>"
                +"<option value='2'  >Em Processo</option>"
                +"<option value='3'  >Pronta</option>"
                +"<option value='4' selected >Finalizada</option>");
        }
    });



});