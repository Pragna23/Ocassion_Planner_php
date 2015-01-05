<?php
  //$Address = "168 hutton st, jersey city, nj 07307";
  $Address = urlencode($Address);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat = $xml->result->geometry->location->lat;
      $Lon = $xml->result->geometry->location->lng;
      $LatLng = "$Lat,$Lon";
  }
  //echo $LatLng;
?>
<!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
var lt = document.getElementById("latt").value;
var ln = document.getElementById("long").value;

  var mapProp = {
    center:new google.maps.LatLng(lt,ln),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP,
	 mapTypeControl: false
  };
  var marker=new google.maps.Marker({
  position:new google.maps.LatLng(lt,ln),
  });



  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>
<div id="googleMap" style="width:500px;height:380px;"></div>
<input type="text" id="latt" style="display:none" value="<?php echo $Lat; ?>" />
<input type="text" id="long" style="display:none"  value="<?php echo $Lon; ?>" />
</body>

</html>