var map = L.map('map').setView([50.3231527, 3.5132381], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
  maxZoom: 18
}).addTo(map);

L.marker([50.3231527, 3.5132381]).addTo(map)
  .bindPopup("Shreknema")
  .openPopup();