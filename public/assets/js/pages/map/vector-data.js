$(document).ready(function () {
  var selectedRegion = "";

  var map = new jvm.Map({
    map: "world_mill_en",
    container: $("#vmap_world"),
    zoomOnScroll: true,
    regionsSelectable: true,
    regionsSelectableOne: true,
    backgroundColor: "aliceblue",
    regionStyle: { fill: "black", selected: { fill: "red" } },
    markerStyle: { initial: { fill: "yellow" } },
    hoverColor: "#FCEF06",
    hover: { stroke: "black", "stroke-width": 2, fill: "#FCEF06" },
    markers: [],
    series: { markers: [{ attribute: "fill", scale: {}, values: [] }] },
    regionStyle: {
      initial: {
        fill: "#128da7",
      },
      hover: {
        fill: "#A0D1DC",
      },
    },
    onMarkerClick: function (e, code) {
      map.tip.hide();
    },
    onMarkerTipShow: function (e, label, code) {
      var coords = map.markers[code].config.latLng;
      map.tip.text(coords[0].toFixed(2) + ", " + coords[1].toFixed(2));
    },
  });

  map.container.on("click", function (e) {
    var name = "MARKER",
      latLng = map.pointToLatLng(
        e.pageX - map.container.offset().left,
        e.pageY - map.container.offset().top
      ),
      targetCls = $(e.target).attr("class");
    if (latLng) {
      var currentRegion = map.getSelectedRegions()[0];
      var isRegion = targetCls && ~targetCls.indexOf("jvectormap-region");
      var isMarker = targetCls && ~targetCls.indexOf("jvectormap-marker");
      if (isRegion) {
        var isSameRegion = selectedRegion === currentRegion;
        selectedRegion = currentRegion;
        map.removeAllMarkers();
        map.addMarker(name, { latLng: [latLng.lat, latLng.lng] });
      }
    }
  });
});
