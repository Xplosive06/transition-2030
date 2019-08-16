google.maps.event.addDomListener(window, 'load', function () {
    var input = document.getElementById('address_city');
    var autocomplete = new google.maps.places.Autocomplete(input, {types: ["geocode"]});

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var placeResult = autocomplete.getPlace();
        var placeLatitude = placeResult.geometry.location.lat();
        var placeLongitude = placeResult.geometry.location.lng();

        var address_latitude_input = document.getElementById('address_latitude');
        var address_longitude_input = document.getElementById('address_longitude');

        console.log(address_latitude_input);
        console.log(address_longitude_input);

        address_latitude_input.value = new Number(placeLatitude);
        address_longitude_input.value = new Number(placeLongitude);
    });
});
