var map;

$(() => {
    map = L.map('warker-map').setView([23.505, -43.000], 13);
    
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieWRyZXplbmRlIiwiYSI6ImNraXhpNDY2NzExem4ycnNiY2R6MjR4eG4ifQ.B1LhPfrTODlsgDbNjp8YxA', {
        maxZoom: 15,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoieWRyZXplbmRlIiwiYSI6ImNraXhpNDY2NzExem4ycnNiY2R6MjR4eG4ifQ.B1LhPfrTODlsgDbNjp8YxA'
    }).addTo(map);

    setTimeout(() => { map.invalidateSize() ; }, 1000);
});
