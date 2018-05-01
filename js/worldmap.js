function initMap() {
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
    var map = new google.maps.Map(document.getElementById('worldmap'), {
        zoom: 8,
        center: {lat: 48.995555555556, lng: 8.4766666666667},
        mapTypeId: 'terrain'

    });


    var allmarkers=[];
    var allboxes=[];

    var json = new XMLHttpRequest();
    json.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           // console.log(json.responseText);
            var tp = JSON.parse(json.responseText);
            var pos;
            var infoboxtext;

            map.setMapTypeId('terrain');





            for (var key in tp.turnpoints) {
                if (tp.turnpoints.hasOwnProperty(key)) {
                    infoboxtext="<strong>"
                        + tp.turnpoints[key].name +
                        + "</strong><br />";

                    pos = {lat: parseFloat( tp.turnpoints[key].lat), lng: parseFloat(tp.turnpoints[key].lon)};
                    allmarkers[key] = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: tp.turnpoints[key].name,

                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 3
                        }


                    }),
                    allboxes[key] = new google.maps.InfoWindow({
                        content: infoboxtext
                        });

                    allmarkers[key].addListener('click', function() {
                        allboxes[key].open(map, allmarkers[key]);
                        console.log(this);
                    });

                }
            }
        }
    };
    json.open('GET', 'query.json.php', true);
    json.send();
}