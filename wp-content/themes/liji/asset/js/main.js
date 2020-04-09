mapboxgl.accessToken = 'pk.eyJ1Ijoid2ViYXBzeSIsImEiOiJjazhlYXk1ejkxNGFpM2dsdjJkaDd2b2RmIn0.pWabX6z0Us-G8OiF9DhuNA';

var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styleivals/mapbox/streets-v11',
    center: [1.098696, 49.4379469],
    zoom: 12,
});


$.ajax({

    // Adresse à laquelle la requête est envoyée
    url: '../request',
    type: 'GET',
    // La fonction à apeller si la requête aboutie

    success: function (content) {
        var users = jQuery.parseJSON(content);
        console.log(users);

        map.on('load', function () {
            var geojson = {
                type: 'FeatureCollection',
                features: [{
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [1.101775, 49.438669]
                    },
                    properties: {
                        title: 'Campus Saint Marc',
                        description: ''
                    }
                },/*If need one more put it here*/]
            };
            var i;
            for (i = 0; i < users.length; i++) {
                geojson.features.push({
                    type: 'Feature',
                    geometry: {
                        type: 'Point',
                        coordinates: [users[i]['longitude'], users[i]['latitude']]
                    },
                    properties: {
                        title: users[i]['nom_creche'],
                        description: '<p>Téléphone : 0' + users[i]['telephone'] + '</p>' + '<p>Mail : ' + users[i]['mail'] + '</p>' + '<p>' + users[i]['adresse'] + ' ' + '<p>' + users[i]['postal'] + ' ' + users[i]['ville'] + '</p>'
                    }
                });
            }

            // add markers to map
            geojson.features.forEach(function (marker) {

                //Instantiation de l'image du pointeur également à gérer sur le style (mapbox.css)
                // create a HTML element for each feature
                var el = document.createElement('div');
                el.className = 'marker';


                // make a marker for each feature and add to the map
                new mapboxgl.Marker(el)
                    .setLngLat(marker.geometry.coordinates)
                    .addTo(map)
                    .setPopup(new mapboxgl.Popup({offset: 25}) // add popups
                        .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
                    .addTo(map);

            });

            var geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            });

            var gelocalisation = new mapboxgl.GeolocateControl({
                positionOptions: {enableHighAccuracy: true},
                trackUserLocation: true
            });

            map.addControl(gelocalisation, 'top-right');

            map.addControl(geocoder, 'top-left');

        });
    },
});
