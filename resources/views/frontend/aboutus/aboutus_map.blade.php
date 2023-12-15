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
        L.marker([37.7749, -122.4194], { icon: animatedIcon }).bindPopup('<a href="https://www.cnbc.com/weather-and-natural-disasters/">North America - USA</a>'),
        L.marker([-14.2350, -51.9253], { icon: animatedIcon }).bindPopup('<a href="https://floodlist.com/america/brazil-floods-santa-catarina-october-2023">South America - Brazil</a>'),
        L.marker([51.1657, 10.4515], { icon: animatedIcon }).bindPopup('<a href="https://www.theguardian.com/world/2022/jul/13/floods-then-and-now-photographs-germany-ahr-valley-flooding-disaster-july-2021">Europe - Germany</a>'),
        L.marker([-25.2744, 133.7751], { icon: animatedIcon }).bindPopup('<a href="https://clearinsurance.com.au/australias-biggest-natural-disasters-in-history/">Australia - Australia</a>'),
        L.marker([4.7100, -74.0721], { icon: animatedIcon }).bindPopup('<a href="https://www.aljazeera.com/news/2023/7/18/heavy-rains-cause-landslides-in-colombia-killing-at-least-eight">South America - Colombia</a>'),
        L.marker([14.0583, 108.2772], { icon: animatedIcon }).bindPopup('<a href="https://e.vnexpress.net/vietnam-natural-disaster/tag-1036455.html">Asia - Vietnam</a>'),
        L.marker([-30.5595, 22.9375], { icon: animatedIcon }).bindPopup('<a href="https://www.bloomberg.com/news/articles/2023-11-08/south-africa-declares-national-disasters-after-floods-storms?leadSource=uverify%20wall">Africa - South Africa</a>')
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