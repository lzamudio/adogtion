<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $id? 'Editar': 'Agregar'; ?> publicación</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?= base_url('publications/add/'.$id) ?>">
                        <?= display_error_msjs(); ?>
                        <?= display_success_msjs(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                 <?php if($photo): ?>
                                <div class="form-group">
                                    <div class="col-sm-9 col-md-offset-3">
                                        <span id="helpBlock" class="help-block">Imagen actual</span>
                                        <a href="<?= base_url('uploads/'.$photo); ?>" target="_blank"><img src="<?= base_url('uploads/'.$photo); ?>" class="img-responsive" style="max-height: 150px "></a>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Foto *</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="photo">
                                        <span id="helpBlock" class="help-block">La foto debe ser tomado con un objeto conocido para comprar su tamaño (por ejemplo, un envase o empaque)</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="<?= set_value('name', $name); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Especie *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="especie" value="<?= set_value('especie', $especie); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Edad *</label>
                                    <div class="col-sm-9">
                                        <div class="input-group" style="width: 100%">
                                            <input type="text" class="form-control" name="age" value="<?= set_value('age', explode('-', @$age)[0]); ?>">
                                            <div class="input-group-btn" style="width: auto">
                                                <select class="form-control" name="type_age">
                                                    <option value="Meses" <?= explode('-', @$age)[1] == 'Meses' ? ' selected="" ': ''; ?> >Meses</option>
                                                    <option value="Años" <?= explode('-', @$age)[1] == 'Años' ? ' selected="" ': ''; ?>>Años</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Sexo *</label>
                                    <div class="col-sm-9">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" <?=  $sex == 'Macho' ? 'checked=""': ''; ?> name="sex" value="Macho"> Macho
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" <?=  $sex == 'Hembra' ? 'checked=""': ''; ?> name="sex" value="Hembra"> Hembra
                                            </label>
                                        </div>
                                        <!--<input type="text" class="form-control" name="sex" value="<?= set_value('sex', $sex); ?>">-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Raza *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="breed" value="<?= set_value('breed', $breed); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Talla *</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="size" value="<?= set_value('size', $size); ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Esterilización </label>
                                    <div class="col-sm-9">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" <?=  $sterilization ? 'checked=""': ''; ?> name="sterilization" value="1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dirección *</label>
                                    <div class="col-sm-9">
                                        <div class="input-group" style="width: 100%">
                                            <input type="text" class="form-control"  autocomplete="off" id="address" name="address"  value="<?= set_value('address', $address); ?>" onkeyup="searchLocationNear(this)">
                                            <ul class="dropdown-menu" id="address-dropdown">
                                            </ul>
                                        </div>
                                        <span id="helpBlock" class="help-block" >Verifica la dirección en el mapa</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div id="map" style="width: 100%; height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Vacunas *</label>
                                    
                                    <div class="col-sm-9">
                                        <div id="listaVacunas" >
                                            <?php foreach ($vaccines as $key => $vaccine) : ?>
                                            <div class="input-group v_<?= $key ?>" style="margin-bottom: 10px;">
                                                <input type="text" class="form-control" name="vaccine[]" value="<?= $vaccine->name ?>">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger" type="button" onclick="if(confirm('¿Estas seguro de querer eliminar esta vacuna?'))$('.v_<?= $key ?>').remove()"><i class="glyphicon glyphicon-trash"></i></button>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <button type="button" class="btn btn-link" onclick="agregaVacuna()">Agregar vacuna</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-block">Guardar</button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= base_url('publications'); ?>" class="btn btn-primary btn-block">Cancelar</a>
                            </div>
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
        $("#listaVacunas").append('<div class="input-group v_'+v+'" style="margin-bottom: 10px;">'+
                                        '<input type="text" class="form-control" name="vaccine[]">'+
                                        '<div class="input-group-btn">'+
                                            '<button class="btn btn-danger" type="button" onclick="if(confirm(\'¿Estás seguro de querer eliminar esta vacuna?\'))$(\'.v_'+v+'\').remove()"><i class="glyphicon glyphicon-trash"></i></button>'+
                                        '</div>'+
                                    '</div>');
        v++;
    }
    
    var  center, map, marker;
    function showMap() {
        center = new google.maps.LatLng('19.4314969', '-99.1356256');

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: center,
            scrollwheel: false,
            streetViewControl: false,
            mapTypeControl: false,
        });

        marker = new google.maps.Marker({
            position: center,
            map: map
        });
        
        <?php if($address): ?>
               changeCenter('<?= $address ?>', <?= $lat ?>, <?= $lng ?>);
        <?php endif; ?>
    }
    
    function changeCenter(address, lat, lng){
        $("#address").val(address);
        $("#address-dropdown").hide();
        
        var c = new google.maps.LatLng(lat, lng);
        map.setZoom(15);
        map.setCenter(c);
        marker.setPosition(c);
    }
    
     function searchLocationNear(obj){
        $("#address-dropdown").html('<li><a href="#"><center><i class="fa fa-spinner fa-spin fa-fw"></i></center></a></li>');
        $("#address-dropdown").show();
        
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({address: $(obj).val()}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var list = '';
                $.each(results, function( index, value ) {
                    list += '<li><a href="javascript:void(0)" class="change-center" onclick="changeCenter(\''+value.formatted_address+'\','+value.geometry.location.lat()+','+value.geometry.location.lng()+')">'+value.formatted_address + '</a></li>';
                });
                $("#address-dropdown").html(list);

            }else{
                $("#address-dropdown").html('<li><a href="#">No se encontraron resultados.</a></li>');
            }
        });
    }
    
    $(document).ready(function(){
       $("body").click(function(e){
           if($(e.target).attr('class') != 'change-center'){
               $("#address-dropdown").hide();
           }
           
       });
    });
    
    google.maps.event.addDomListener(window, 'load', showMap);
    
</script>
