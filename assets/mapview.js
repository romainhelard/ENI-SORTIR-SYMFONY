let lat = document.querySelector('.latitude').value
let long = document.querySelector('.longitude').value

console.log(lat);
console.log(long);

var map = L.map('map').setView([lat, long], 12);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
var circle = L.circle([lat, long], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(map);