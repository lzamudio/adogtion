<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?= display_error_msjs(); ?>
            <?= display_success_msjs(); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Mis publicaciones</h3>
                </div>
                <div class="panel-body">
                    <a href="<?= base_url('publications/add'); ?>" class="btn btn-primary pull-right"  ><i class="glyphicon glyphicon-plus"></i> Agregar</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Especie</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Raza</th>
                                <th>Dirección</th>
                                <th>Estatus</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($publicaciones as $publicacion): ?>
                                <tr <?= !$publicacion->approved && $publicacion->user_request ? 'class="warning"' : ''; ?>>
                                    <td><?= $publicacion->name ?></td>
                                    <td><?= $publicacion->especie ?></td>
                                    <td><?= $publicacion->age ?></td>
                                    <td><?= $publicacion->sex ?></td>
                                    <td><?= $publicacion->breed ?></td>
                                    <td><?= $publicacion->address ?></td>
                                    <td>
                                        <?php if($publicacion->approved): ?>
                                        <label class="label label-success">Adoptado</label>
                                        <?php elseif(!$publicacion->approved && $publicacion->user_request): ?>
                                        <button class="btn btn-info btn-xs" onclick="verSolicitud(<?= $publicacion->user_request ?>, <?= $publicacion->id ?>);">Ver solicitante</button>
                                        <?php else: ?>
                                        <label class="label label-warning">En espera de solicitud</label>
                                        <?php endif; ?>
                                        
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" >
                                            <?php if(!$publicacion->approved && !$publicacion->user_request): ?>
                                                <a href="<?= base_url('publications/add/' . $publicacion->id) ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                            <?php endif; ?>
                                                <a href="<?= base_url('publications/delete/'.$publicacion->id); ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="solicitudAdopcion" tabindex="-1" role="dialog" aria-labelledby="solicitudAdopcionLabel"></div>

<script>
    function verSolicitud(user, request){
        $.get('<?= base_url('dashboard/get_info_request/'); ?>/'+user+'/'+request, function(response){
            $("#solicitudAdopcion").html(response);
            $("#solicitudAdopcion").modal('show');
        });
    }
</script>