/* ===================================== MAP =======================================*/

$(document).ready(function() {
    chekIfUserConnected(currentUser);

    function chekIfUserConnected(currentUser) {
        if (currentUser !== "undefined") {
            initMap(currentUser)
        } else {
            displayErrorBecauseNotConnected();
        }
    }

    function displayErrorBecauseNotConnected() {
        document.getElementById("map").style.display = "none";
        document.getElementById("displayed_if_not_connected").style.display = "block";
        document.getElementById("home_title").style.display = "none";
    }

    function initMap(currentUserCity) {

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(currentUserCity.address_latitude, currentUserCity.address_longitude),
            mapTypeId: 'terrain'
        });

// Create a <script> tag and set the USGS URL as the source.
        const script = document.createElement('script');

// This example uses a local copy of the GeoJSON stored at
// http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        document.getElementsByTagName('head')[0].appendChild(script);


// Loop through the results array and place a marker and an icon for each
// set of coordinates.
        for (let i = 0; i < usersLatLng.length; i++) {
            const latLng = new google.maps.LatLng(usersLatLng[i].address_latitude, usersLatLng[i].address_longitude);
            const marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: "Username"
            });

        }
    }
});



