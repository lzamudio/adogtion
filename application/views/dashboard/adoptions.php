<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?= display_error_msjs(); ?>
            <?= display_success_msjs(); ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Mis Adopciones</h3>
                </div>
                <div class="panel-body">
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
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($adoptions as $adoption): ?>
                                <tr <?= $adoption->approved ? 'class="success"' : ''; ?>>
                                    <td><?= $adoption->name ?></td>
                                    <td><?= $adoption->especie ?></td>
                                    <td><?= $adoption->age ?></td>
                                    <td><?= $adoption->sex ?></td>
                                    <td><?= $adoption->breed ?></td>
                                    <td><?= $adoption->address ?></td>
                                    <td>
                                        <?php if ($adoption->approved): ?>
                                            <label class="label label-success">Adoptado</label>
                                        <?php else: ?>
                                            <label class="label label-warning">En espera de respuesta</label>
                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-xs" onclick="showModal(<?= $adoption->id ?>)"><i class="fa fa-eye"></i></button>
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

<div class="modal fade" id="petDetail" tabindex="-1" role="dialog" aria-labelledby="petDetailLabel"></div>

<script>
    function showModal(id) {
        $.get('<?= base_url('dashboard/get_info_pet/'); ?>/' + id, function (response) {
            $("#petDetail").html(response);
            $("#petDetail").modal('show');
        });

    }
</script>