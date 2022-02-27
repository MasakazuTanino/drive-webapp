"use strict"

function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
  zoom: 14,
  center: myLatLng,
  });

  new google.maps.Marker({
      position: myLatLng,
      map,
  });
}
