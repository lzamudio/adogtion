<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?= $pet->name ?></h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-warning" id="alertRequestWarning" style="display: none">Enviando solicitud . . . </div>
            <div class="alert alert-danger" id="alertRequestError" style="display: none"></div>
            <div class="alert alert-success" id='alertRequestOk' style="display: none"></div>
            <div class="row">
                <div class="col-md-5">
                    <a href="#" class="thumbnail" >
                        <img src="<?= base_url('uploads/'.$pet->photo); ?>" style="max-height: 400px">
                    </a>
                </div>
                <div class="col-md-7">
                    <section class="comment-list">
                        <article class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default arrow left">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="notice notice-info">
                                                    <strong>Especie</strong> <?= $pet->especie ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="notice notice-info">
                                                    <strong>Edad</strong> <?= $pet->age ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="notice notice-info">
                                                    <strong>Sexo</strong> <?= $pet->sex ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="notice notice-info">
                                                    <strong>Raza</strong> <?= $pet->breed ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="notice notice-info">
                                                    <strong>Talla</strong> <?= $pet->size ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="notice notice-info">
                                                    <strong>Esterilización</strong> <?= $pet->sterilization? '<span class="label label-success">SI</span>' : '<span class="label label-danger ">No</span>' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notice notice-info">
                                            <strong>Vacunas</strong> 
                                            <?php foreach ($pet->vaccines as $vaccine):  ?>
                                            <span class="label label-info margin-r-5"><?= $vaccine->name ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="notice notice-info">
                                            <strong>Ubicación</strong> <?= $pet->address ?>
                                        </div>
                                        <div class="notice notice-sm">
                                            <strong><i class="fa fa-user"></i></strong>  <?= $pet->owner->first_name.' '.$pet->owner->last_name ?>
                                            <br>
                                            <strong><i class="fa fa-clock-o"></i></strong> <?= date('d-m-Y h:i:s', strtotime($pet->date_register)) ?>
                                        </div>
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        
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
            <button type="button" class="btn btn-danger" id="btnRequest" onclick="solicitarAdopcion(<?= $pet->id ?>)">Solicitar Adopción</button>
        </div>
    </div>
</div>

<script>
function solicitarAdopcion(pet){
    $("#alertRequestWarning").show();
    $("#btnRequest").hide();
    $("#alertRequestOk").hide();
    $("#alertRequestError").hide();
    $.post('<?= base_url('dashboard/adoption_request/'); ?>/' ,{pet_id: pet}, function (response) {
        $("#alertRequestWarning").hide();
        if(response == '1'){
            $("#alertRequestOk").html('Hemos enviado un correo al dueño actual de la mascota, pronto se pondrá en contacto contigo.');
            $("#alertRequestOk").show();
            searchPets();
        }else{
            $("#btnRequest").show();
            $("#alertRequestError").html('No se ha podido realizar la solicitud, intenta más tarde.');
            $("#alertRequestError").show();
        }
         
    });
}    
</script>