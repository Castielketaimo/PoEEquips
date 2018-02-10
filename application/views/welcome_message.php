<h1>Welcome to PoEEquips!</h1>
<script>
$().ready(function() {
	$.getJSON( "{urlLink}info/bundle", function( data ) {
	  $.each( data, function( key, val ) {
	  	$("#duck").append('<a class="dropdown-item" href="#">' + val.PresetId + '</a>' + '<br>');
	  });
	});

	function updateContainers(key) {
		
	}
});
</script>
<div id="body">
	<div class="dropdown">
	  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Dropdown button
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="duck">
	  </div>
	</div>
	<div id="bgcontainer">
		<div id = "weaponContainer">
		</div>
		<div id = "glovesContainer">
		</div>
		<div id = "shieldContainer">
		</div>
		<div id = "bootsContainer">
		</div>
		<div id = "helmatContainer">
		</div>
		<div id = "chestContainer">
		</div>
	</div>
</div>
