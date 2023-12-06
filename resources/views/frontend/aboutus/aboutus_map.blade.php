<!-- Include Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Map container with additional styling -->
<div id="map" style="height: 400px; border: 2px solid #ccc; border-radius: 10px; margin-top: 20px;"></div>

<!-- Map script -->
<script>
    var map = L.map('map', { zoomControl: false }).setView([0, 0], 2);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Define a custom marker icon with CSS animation
    var animatedIcon = L.divIcon({
        className: 'animated-icon',
        html: '<div class="pulse"></div>'
    });

    // Adding markers for different continents with clickable names
    var markers = [
        L.marker([37.7749, -122.4194], { icon: animatedIcon }).bindPopup('<a href="#">North America - USA</a>'),
        L.marker([-14.2350, -51.9253], { icon: animatedIcon }).bindPopup('<a href="#">South America - Brazil</a>'),
        L.marker([51.1657, 10.4515], { icon: animatedIcon }).bindPopup('<a href="#">Europe - Germany</a>'),
        L.marker([-25.2744, 133.7751], { icon: animatedIcon }).bindPopup('<a href="#">Australia - Australia</a>'),
        L.marker([4.7100, -74.0721], { icon: animatedIcon }).bindPopup('<a href="#">South America - Colombia</a>'),
        L.marker([25.2048, 55.2708], { icon: animatedIcon }).bindPopup('<a href="#">Asia - UAE</a>'),
        L.marker([-30.5595, 22.9375], { icon: animatedIcon }).bindPopup('<a href="#">Africa - South Africa</a>')
    ];

    var markerGroup = L.layerGroup(markers).addTo(map);
</script>

<style>
    .animated-icon {
        width: 20px;
        height: 20px;
        margin: 0;
        text-align: center;
        line-height: 1;
    }

    .pulse {
        width: 20px;
        height: 20px;
        border: 4px solid #3498db;
        border-radius: 50%;
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(0.9);
            box-shadow: 0 0 0 0 rgba(52, 152, 219, 0.7);
        }

        50% {
            transform: scale(1);
            box-shadow: 0 0 0 10px rgba(52, 152, 219, 0);
        }

        100% {
            transform: scale(0.9);
            box-shadow: 0 0 0 0 rgba(52, 152, 219, 0);
        }
    }
</style>