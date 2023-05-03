function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng(12.9234 ,59.60288),
      zoom: 9,
      mapTypeId: google.maps.MapTypeId.HYBRID,
      scrollwheel: false,
      draggable: false,
      panControl: true,
      zoomControl: true,
      mapTypeControl: true,
      scaleControl: true,
      streetViewControl: true,
      overviewMapControl: true,
      rotateControl: true,
    };
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  }
  google.maps.event.addDomListener(window, 'load', initialize);
  