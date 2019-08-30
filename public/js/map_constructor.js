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

        // CUSTOM MARKER

        function CustomMarker(latlng, map, imageSrc, user) {
            this.latlng_ = latlng;
            this.imageSrc = imageSrc; //added imageSrc
            this.user = user;
        }

        CustomMarker.prototype = new google.maps.OverlayView();

        CustomMarker.prototype.draw = function () {
            let self = this;
            let subDescription = this.getUser().description !== null && this.getUser().description.length > 90 ? this.getUser().description.substring(0, 90) + ' ...' : this.getUser().description;
            const contentString = '<div id="content" class="container-size">' +
                '<a href="' + window.location.href + "profiles/" + this.getUser().id + '">' +
                '<h1 id="firstHeading" class="firstHeading dont-break-out">' +
                this.getUser().username + '</h1></a>' +
                '<img class="img-thumbnail" src="' + window.location.href + "img/uploads/avatars/" + this.getUser().avatar + '" >' +
                '<br>' +
                '<div id="bodyContent">' +
                '<p>' + subDescription + '</p>' +
                '</div>' +
                '<div class="d-flex container justify-content-around">' +
                '<a href="' + window.location.href + "profiles/" + this.getUser().id + '" class="btn btn-primary btn-sm"><i class="fas fa-user-circle"></i></a>' +
                '<a href="' + window.location.href + "messages/create/" + this.getUser().id + '" class="btn btn-primary btn-sm"><i class="far fa-comments"></i></a>' +
                '</div>' +
                '</div>';
            // Check if the div has been created.
            let div = this.div_;
            if (!div) {
                const infowindow = new google.maps.InfoWindow({content: contentString});
                // Create a overlay text DIV
                div = this.div_ = document.createElement('div');
                // Create the DIV representing our CustomMarker
                div.className = "customMarker"; //replaced styles with className

                let img = document.createElement("img");
                img.src = this.imageSrc; //attach passed image uri
                div.appendChild(img);

                google.maps.event.addDomListener(div, "click", function (event) {
                    infowindow.open(map, self);
                });

                // Then add the overlay to the DOM
                let panes = this.getPanes();
                panes.overlayImage.appendChild(div);
            }

            // Position the overlay
            let point = this.getProjection().fromLatLngToDivPixel(this.latlng_);
            if (point) {
                div.style.left = point.x + 'px';
                div.style.top = point.y + 'px';
            }
        };

        CustomMarker.prototype.remove = function () {
            // Check if the overlay was on the map and needs to be removed.
            if (this.div_) {
                this.div_.parentNode.removeChild(this.div_);
                this.div_ = null;
            }
        };

        CustomMarker.prototype.getPosition = function () {
            return this.latlng_;
        };

        CustomMarker.prototype.getUser = function () {
            return this.user;
        };

        CustomMarker.prototype.getOms = function () {
            return this.oms;
        };

        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(currentUserCity.address_latitude, currentUserCity.address_longitude),
            mapTypeId: 'terrain'
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


                let marker = new CustomMarker(
                    new google.maps.LatLng(usersMapInfos[i].address_latitude + getMarkerOffset(),
                        usersMapInfos[i].address_longitude + getMarkerOffset()),
                    map,
                    window.location.href + "img/uploads/avatars/" + usersMapInfos[i].avatar,
                    usersMapInfos[i]
                );

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
        let offset = Math.random() / 1000;
        let isEven = (offset * 400000) % 2 === 0;
        if (isEven) return offset;
        else return -offset;
    }


});


