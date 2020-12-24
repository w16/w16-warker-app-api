require('./bootstrap');

require('alpinejs');

require('leaflet');

window.map;

window.addEventListener('DOMContentLoaded', (event) => {
    map = L.map('warker-map').setView([-15.14, -51.53], 4);
    
    let tileLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieWRyZXplbmRlIiwiYSI6ImNraXhpNDY2NzExem4ycnNiY2R6MjR4eG4ifQ.B1LhPfrTODlsgDbNjp8YxA', {
        maxZoom: 15,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoieWRyZXplbmRlIiwiYSI6ImNraXhpNDY2NzExem4ycnNiY2R6MjR4eG4ifQ.B1LhPfrTODlsgDbNjp8YxA'
    }).addTo(map);
});

window.generateToken = function () {
    axios.post('/api/token/generate').then(response => {
        let api_token = response.data.api_token.split('|')[1];

        document.querySelector('#plain_token').innerHTML = api_token;
    });
}
