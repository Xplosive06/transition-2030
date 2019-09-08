google.maps.event.addDomListener(window, 'load', function () {

    let pacContainerInitialized = false;
    $('#address_city').keypress(function () {
        if (!pacContainerInitialized) {
            $(".pac-container").css("z-index", "9999");
            pacContainerInitialized = true;
        }
    });

    const input = document.getElementById('address_city');
    const autocomplete = new google.maps.places.Autocomplete(input, {types: ["geocode"]});

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        let placeResult = autocomplete.getPlace();
        let placeLatitude = placeResult.geometry.location.lat();
        let placeLongitude = placeResult.geometry.location.lng();

        let address_latitude_input = document.getElementById('address_latitude');
        let address_longitude_input = document.getElementById('address_longitude');

        console.log(address_latitude_input);
        console.log(address_longitude_input);

        address_latitude_input.value = Number(placeLatitude);
        address_longitude_input.value = Number(placeLongitude);
    });
});
