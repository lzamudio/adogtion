<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <h2><i class="fa fa-user"></i> Mi perfil</h2>
        <form method="post" action="<?= base_url('dashboard/profile') ?>">
            <?= display_error_msjs(); ?>
            <?= display_success_msjs(); ?>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="text" class="form-control input-lg" placeholder="Nombre(s) *" id="name" required="" name="first_name" value="<?= set_value('first_name', $user->first_name) ?>">
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="text" class="form-control input-lg" placeholder="Apellido(s) *" id="name" required="" name="last_name" value="<?= set_value('last_name', $user->last_name) ?>">
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="email" class="form-control input-lg" placeholder="Correo *" id="name" name="email" required="" value="<?= set_value('email', $user->email) ?>">
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="text" class="form-control input-lg" placeholder="Teléfono *" id="name" name="phone" required="" value="<?= set_value('phone', $user->phone) ?>">
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <p class="help-block">Si no deseas actualizar tu contraseña, manten los siguientes campos en blanco.</p>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="password" class="form-control input-lg" placeholder="Contraseña " id="name" name="password" >
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <input type="password" class="form-control input-lg" placeholder="Confirmar contraseña " id="name" name="passconf" >
                    <span class="help-block text-danger"></span>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-block">Actualizar</button>
        </form>
    </div>
</div>