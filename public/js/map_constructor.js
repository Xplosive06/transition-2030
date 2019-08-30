/* ===================================== MAP =======================================*/

$(document).ready(function () {
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

        const oms = new OverlappingMarkerSpiderfier(map, {
            markersWontMove: true,   // we promise not to move any markers, allowing optimizations
            markersWontHide: true,   // we promise not to change visibility of any markers, allowing optimizations
            basicFormatEvents: true  // allow the library to skip calculating advanced formatting information
        });

        const markersList = [];

// Create a <script> tag and set the USGS URL as the source.
        const script = document.createElement('script');

// This example uses a local copy of the GeoJSON stored at
// http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        document.getElementsByTagName('head')[0].appendChild(script);


// Loop through the results array and place a marker and an icon for each
// set of coordinates.

        for (let i = 0; i < usersMapInfos.length; i++) {
            (function () {
                console.log(usersMapInfos[i]);
                let subDescription = usersMapInfos[i].description !== null && usersMapInfos[i].description.length > 90 ? usersMapInfos[i].description.substring(0, 90) + ' ...' : usersMapInfos[i].description;
                const contentString = '<div id="content" class="container-size">' +
                    '<a href="' + window.location.href + "profiles/" + usersMapInfos[i].id + '">' +
                    '<h1 id="firstHeading" class="firstHeading dont-break-out">' +
                    usersMapInfos[i].username + '</h1></a>' +
                    '<img class="img-thumbnail" src="' + window.location.href + "img/uploads/avatars/" + usersMapInfos[i].avatar + '" >' +
                    '<br>' +
                    '<div id="bodyContent">' +
                    '<p>' + subDescription + '</p>' +
                    '</div>' +
                    '<div class="d-flex container justify-content-around">' +
                    '<a href="' + window.location.href + "profiles/" + usersMapInfos[i].id + '" class="btn btn-primary btn-sm"><i class="fas fa-user-circle"></i></a>' +
                    '<a href="' + window.location.href + "messages/create/" + usersMapInfos[i].id + '" class="btn btn-primary btn-sm"><i class="far fa-comments"></i></a>' +
                    '</div>' +
                    '</div>';

                const icon = {
                    url: window.location.href + "img/uploads/avatars/" + usersMapInfos[i].avatar, // url
                    scaledSize: new google.maps.Size(50, 50), // scaled size
                    origin: new google.maps.Point(0, 0), // origin
                    anchor: new google.maps.Point(0, 0), // anchor
                };

                const infowindow = new google.maps.InfoWindow({content: contentString});
                const latLng = new google.maps.LatLng(usersMapInfos[i].address_latitude + getMarkerOffset(), usersMapInfos[i].address_longitude + getMarkerOffset());
                const marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title: usersMapInfos[i].username,
                    icon: icon
                });

                google.maps.event.addListener(marker, 'spider_click', function (e) {  // 'spider_click', not plain 'click'
                    infowindow.open(map, marker);
                });
                oms.addMarker(marker);  // adds the marker to the spiderfier _and_ the map

                markersList.push(marker);

            })();
        }
        let markerCluster = new MarkerClusterer(map, markersList, {
            imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
            maxZoom: 15
        });
    }

    function getMarkerOffset() {
        //add tiny random offset to keep markers from dropping on top of themselves
        let offset = Math.random() / 4000;
        let isEven = (offset * 400000) % 2 === 0;
        if (isEven) return offset;
        else return -offset;
    }
});

