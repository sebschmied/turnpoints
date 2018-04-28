function initMap() {

    var map = new google.maps.Map(document.getElementById('worldmap'), {
        zoom: 8,
        center: {lat: 48.995555555556, lng: 8.4766666666667},
        mapTypeId: 'terrain'

    });


    var allmarkers=[];
    var json = new XMLHttpRequest();
    json.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           // console.log(json.responseText);
            var tp = JSON.parse(json.responseText);
            //console.log(tp.turnpoints);


            var pos;
            for (var key in tp.turnpoints) {
                if (tp.turnpoints.hasOwnProperty(key)) {
                    console.log(key + " -> " + tp.turnpoints[key].name);
                    console.log(key + " -> " + tp.turnpoints[key].lat);
                    console.log(key + " -> " + tp.turnpoints[key].lon);
                    console.log(key + " -> " + tp.turnpoints[key].sha1);
                    pos = {lat: parseFloat( tp.turnpoints[key].lat), lng: parseFloat(tp.turnpoints[key].lon)};
                    console.log (pos);
                    allmarkers[key] = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: tp.turnpoints[key].name


                    });

                }
            }
        }
    };
    json.open('GET', 'query.json.php', true);
    json.send();
}