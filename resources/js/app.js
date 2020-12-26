const { LatLng } = require('leaflet');

require('./bootstrap');

require('alpinejs');

require('leaflet');

require('leaflet.markercluster');

window.warkerMap;
window.cityMarkerCluster;
window.stationMarkerCluster;
window.oldCenter = { lat: 99999999, lng: 999999};
window.stationMarkers = {};
window.cityMarkers = {};

window.WarkerMarker = class extends L.Marker {
    constructor(data, type) {

        let LatLng = { lat: data.latitude, lng: data.longitude };
        let icon;

        if(type == 'cidade') {
            icon = L.icon({
                iconUrl: '/images/vendor/leaflet/dist/marker-icon-2x-city.png',
            });
        } else {
            icon = L.icon({
                iconUrl: '/images/vendor/leaflet/dist/marker-icon-2x.png',
               iconSize: [20/2, 30/2]
            });
        }

        let MarkerOptions = {
            icon,

        }

        super(LatLng, MarkerOptions);
        this.type = type;
        
        for(let i in data) {
            this[i] = data[i];
        }
    }

    delete(map) {
        axios.delete('/api/'+ this.type +'/'+ this.id);
        map.removeLayer(this);
    }
}


window.addEventListener('DOMContentLoaded', (event) => {
    warkerMap = L.map('warker-map').setView([-15.14, -51.53], 4);

    cityMarkerCluster = new L.MarkerClusterGroup();
    stationMarkerCluster = new L.MarkerClusterGroup();
    
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieWRyZXplbmRlIiwiYSI6ImNraXhpNDY2NzExem4ycnNiY2R6MjR4eG4ifQ.B1LhPfrTODlsgDbNjp8YxA', {
        maxZoom: 15,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoieWRyZXplbmRlIiwiYSI6ImNraXhpNDY2NzExem4ycnNiY2R6MjR4eG4ifQ.B1LhPfrTODlsgDbNjp8YxA'
    }).addTo(warkerMap);

    setTimeout(loadMakers, 600);
});

window.generateToken = function () {
    axios.post('/api/token/generate').then(response => {
        let api_token = response.data.api_token.split('|')[1];

        document.querySelector('#plain_token').innerHTML = api_token;
    });
}


window.loadMakers = function () {
    let center = warkerMap.getCenter();
    let north = warkerMap.getBounds().getNorth() * 0.2;

    let range = north - center.lat;

    if(center.distanceTo(oldCenter) > 10) {
        axios.get('/api/cidades?lat='+center.lat+'&lng='+center.lng+'&range='+range).then(response => {
            let stations = response.data;

            for(i in stations) {
                if(!stationMarkers[stations[i].id]) {
                    warkerMarker = new WarkerMarker(stations[i], 'posto');
                    stationMarkers[warkerMarker.id] = warkerMarker;
                    warkerMarker.on('contextmenu', function (e) {
                        delete stationMarkers[this.id];
                        this.delete(warkerMap);
                    });

                    stationMarkerCluster.addLayer(warkerMarker);
                }
            }

            warkerMap.addLayer(stationMarkerCluster);
        });

        axios.get('/api/postos?lat='+center.lat+'&lng='+center.lng+'&range='+range).then(response => {
            let cities = response.data;

            for(i in cities) {
                if(!cityMarkers[cities[i].id]) {
                    warkerMarker = new WarkerMarker(cities[i], 'cidade');
                    cityMarkers[warkerMarker.id] = warkerMarker;
                    warkerMarker.on('contextmenu', function (e) {
                        delete cityMarkers[this.id];
                        this.delete(warkerMap);
                    });

                    cityMarkerCluster.addLayer(warkerMarker);
                }
            }

            warkerMap.addLayer(cityMarkerCluster);
        });

        oldCenter = center;
    }
    
    setTimeout(loadMakers, 600);
}