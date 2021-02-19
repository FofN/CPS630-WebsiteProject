let map;

function showMap(){
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 43.6532, lng: -79.518143 },
        zoom: 8,
    });
    new directionsHandler(map);
}

class directionsHandler{
    constructor(map){
        this.map = map;
        this.originId = "";
        this.destinId = "";
        this.travelMode = google.maps.TravelMode.DRIVING;
        this.directionsService = new google.maps.DirectionsService();
        this.directionsRenderer = new google.maps.DirectionsRenderer();
        this.directionsRenderer.setMap(map);
        const originInput = document.getElementById("txtOrigin");
        const destinInput = document.getElementById("txtDestin");
        const originPlace = new google.maps.places.Autocomplete(originInput);
        const destinPlace = new google.maps.places.Autocomplete(destinInput);
        this.setupPlaceChangedListener(originPlace, "ORIG");
        this.setupPlaceChangedListener(destinPlace, "DEST");
    }

    setupPlaceChangedListener(location, mode){
        location.bindTo("bounds", this.map);
        location.addListener("place_changed", () => {
            const place = location.getPlace();
            if (mode === "ORIG") {
                this.originId = place.place_id;
                console.log(this.originId);
            } else {
                this.destinId = place.place_id;
                console.log(this.destinId);
            }
            this.route();
        });
    }
    route() {
        if (!this.originId || !this.destinId){
            return;
        }
        const me = this;
        this.directionsService.route(
            {
              origin: { placeId: this.originId },
              destination: { placeId: this.destinId },
              travelMode: this.travelMode,
            },
            (response, status) => {
              if (status === "OK") {
                me.directionsRenderer.setDirections(response);
              } else {
                window.alert("Directions request failed due to " + status);
              }
            }
        );
    }
}
