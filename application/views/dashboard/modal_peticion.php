<div class="modal-dialog" role="document" >
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Información de usuario</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger" id="alertRequestError" style="display: none"></div>
            <div class="alert alert-success" id='alertRequestOk' style="display: none"></div>
            <div class="row">
                <div class="col-md-12">
                    <section class="comment-list">
                        <article class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="notice notice-info">
                                            <strong>Nombre</strong> <?= $user->first_name ?>
                                        </div>
                                        <div class="notice notice-info">
                                            <strong>Apellidos</strong> <?= $user->last_name ?>
                                        </div>
                                        <div class="notice notice-info">
                                            <strong>Correo</strong> <?= $user->email ?>
                                        </div>
                                        <div class="notice notice-info">
                                            <strong>Teléfono</strong> <?= $user->phone ?>
                                        </div>
                                            
                                        
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-success" id="btnRequestAceptar" onclick="cambiaPeticion(<?=  $request_id ?>,1)">Aceptar Solicitud</button>
            <button type="button" class="btn btn-danger" id="btnRequestRechazar" onclick="cambiaPeticion(<?=  $request_id ?>, 0)">Rechazar Solicitud</button>
        </div>
    </div>
</div>

<script>
function cambiaPeticion(requestId, respuesta){
    $("#btnRequest").hide();
    $("#alertRequestOk").hide();
    $("#alertRequestError").hide();
    $.post('<?= base_url('dashboard/set_request/'); ?>/' ,{pet_id: requestId, aceptacion:respuesta }, function (response) {
        if(response == '1'){
            location.reload(); 
        }else{
            $("#btnRequest").show();
            $("#alertRequestError").html('No se ha podido realizar la solicitud, intenta más tarde.');
            $("#alertRequestError").show();
        }
         
    });
}    
</script>