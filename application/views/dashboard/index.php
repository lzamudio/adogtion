


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="bottom: 0;position: absolute !important; top:52px;" >
            <div id="map" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"></div>
        </div>
    </div>
</div>



<div class="modal fade" id="petDetail" tabindex="-1" role="dialog" aria-labelledby="petDetailLabel"></div>

<script type="text/javascript">
    var circle, center, map, marker;
    var markers = [];

    function showMap() {
        center = new google.maps.LatLng('19.4314969', '-99.1356256');

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: center,
        });

        marker = new google.maps.Marker({
            position: center,
            map: map,
            //draggable:true,
            title: "Mi ubicación"
        });

        circle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.15,
            map: map,
            center: center,
            radius: 1000,
            editable: true

        });

        circle.setMap(map);
        searchPets();

        circle.addListener('center_changed', changeCenterCircle);
        circle.addListener('radius_changed', searchPets);
        
        <?php if($this->input->get('search')): ?>
                $("#formSearchLocation").trigger('submit');
        <?php else: ?>
            getMyLocation();
        <?php endif; ?>
        

    }
    function searchPets() {
        var image = '<?= base_url('assets/dashboard/images/animal.png') ?>';

        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        markers = [];

        $.post('<?= base_url('dashboard/search_pet/'); ?>/' + circle.getCenter().lat() + '/' + circle.getCenter().lng() + '/' + circle.getRadius(), function (response) {
            $.each(response, function (index, pet) {
                var mar = new google.maps.Marker({
                    position: {lat: parseFloat(pet.lat), lng: parseFloat(pet.lng)},
                    map: map,
                    icon: image,
                    title: pet.name,
                    id: pet.id,
                });
                markers.push(mar);
                google.maps.event.addListener(mar, 'click', function () {
                    showModal(this.id);
                });
            });

        }, 'json');
    }
    function changeCenterCircle() {
        map.setCenter(circle.center);
        marker.setPosition(circle.center);
        searchPets();
    }
    function showModal(id) {
        $.get('<?= base_url('dashboard/get_info_pet/'); ?>/'+id, function(response){
            $("#petDetail").html(response);
            $("#petDetail").modal('show');
        });
    }
    function myLocation(position){
        console.log(position);
    }
    function getMyLocation(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(location){
                var c = new google.maps.LatLng(location.coords.latitude, location.coords.longitude);
                map.setCenter(c);
                marker.setPosition(c);
                circle.setCenter(c);
                
                
                var latlng = {lat: location.coords.latitude, lng: location.coords.longitude};
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({location: latlng}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                          $("#inputSearchLocation").val(results[1].formatted_address);
                        }
                    }

                });
            }, errorGeolocation);
        }else{
            alert('No se ha podido obtener tu ubicación ya que tu navegador no soporta está funcionalidad (Intenta con Firefox)');
        }
    }
    function errorGeolocation(){
        alert('No se ha podido obtener tu ubicación por un error, tu navegador no soporta esta funcionalidad (Intenta con Firefox)');
    }
        
    function searchLocationNear(obj){
        $("#loadGif").show();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({address: $(obj).val()}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var c = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                map.setCenter(c);
                marker.setPosition(c);
                circle.setCenter(c);
            }else{
                alert('No se encontraron resultados.');
            }
            $("#loadGif").hide();
        });
        return false;
    }
    

    google.maps.event.addDomListener(window, 'load', showMap);
</script>