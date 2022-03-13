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

$(function () {
  $('.comment-area').on('input', function () {
      if ($(this).outerHeight() > this.scrollHeight) {
      $(this).height(1)
  }
  while ($(this).outerHeight() < this.scrollHeight) {
      $(this).height($(this).height() + 1)
  }
  });
});