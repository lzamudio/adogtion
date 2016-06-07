<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Agregar publicaciones</h3>
                </div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" method="post" action="<?= base_url('publications/add/'.$id) ?>" >
                        <?= display_error_msjs(); ?>
                        <?= display_success_msjs(); ?>
                        <div class="row">
                            <?php if($photo): ?>
                            <div class="col-md-3">
                                <a href="<?= base_url('uploads/'.$photo); ?>" target="_blank"><img src="<?= base_url('uploads/'.$photo); ?>" class="img-responsive"></a>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="">Foto *</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Foto *</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                            </div>
                            <?php endif; ?>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre * </label>
                                    <input type="text" class="form-control" name="name" value="<?= set_value('name', $name); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Especie *</label>
                                    <input type="text" class="form-control" name="especie" value="<?= set_value('especie', $especie); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Edad *</label>
                                    <input type="text" class="form-control" name="age" value="<?= set_value('age', $age); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Sexo *</label>
                                    <input type="text" class="form-control" name="sex" value="<?= set_value('sex', $sex); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Raza *</label>
                                    <input type="text" class="form-control" name="breed" value="<?= set_value('breed', $breed); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?=  $sterilization ? 'checked=""': ''; ?> name="sterilization" value="1"> Esterilización
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Talla *</label>
                                    <input type="text" class="form-control" name="size" value="<?= set_value('size', $size); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Dirección *</label>
                                    <input type="text" class="form-control" name="address" value="<?= set_value('address', $address); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                
                                <div class="form-group">
                                    <label for="">Vacunas </label>
                                    <div id="listaVacunas">
                                    <?php foreach ($vaccines as $key => $vaccine) : ?>
                                    <hr class="v_<?= $key ?>"><div class="input-group v_<?= $key ?>" >
                                        <input type="text" class="form-control" name="vaccine[]" value="<?= $vaccine->name ?>">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger" type="button" onclick="if(confirm('¿Estas seguro de querer eliminar esta vacuna?'))$('.v_<?= $key ?>').remove()"><i class="glyphicon glyphicon-trash"></i></button>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    
                                    </div>
                                    <button type="button" class="btn btn-link" onclick="agregaVacuna()">Agregar otra vacuna</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Guardar</button>
                            <a href="<?= base_url('publications'); ?>"  class="btn btn-primary" >Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var v = <?= count($vaccines) ?>;
    function agregaVacuna(){
        $("#listaVacunas").append('<hr class="v_'+v+'"><div class="input-group v_'+v+'" >'+
                                        '<input type="text" class="form-control" name="vaccine[]">'+
                                        '<div class="input-group-btn">'+
                                            '<button class="btn btn-danger" type="button" onclick="if(confirm(\'¿Estas seguro de querer eliminar esta vacuna?\'))$(\'.v_'+v+'\').remove()"><i class="glyphicon glyphicon-trash"></i></button>'+
                                        '</div>'+
                                    '</div>');
        v++;
    }
    
</script>