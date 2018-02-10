<h1>Welcome to PoEEquips!</h1>
<script>
$().ready(function() {
	$.getJSON( "{urlLink}info/bundle", function( data ) {
	  $.each( data, function( key, val ) {
	  	$("#dropDownItems").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.PresetId + ')">' + val.PresetId + '</a></li>');
	  });
	});
});

function updateContainer(key) {

	$.getJSON( "{urlLink}info/bundle/" + key, function( data ) {
		updateContainers(data.Helmet);
		updateContainers(data.Chest);
		updateContainers(data.Shields);
		updateContainers(data.Weapons);
		updateContainers(data.Boots);
		updateContainers(data.Gloves);
	});
}

function updateContainers(key) {
	$.getJSON( "{urlLink}info/catalog/" + key, function( data ) {
		var imagePath = '/assets/images/' + data.ImagePath;
		// $("#helmatContainer").css('background-image', "url('/assets/images/helmets/BoneHelmet.png')");

		switch (data.CategoryId)
			{
				case "1":
					$("#helmatContainer").css("background-image", 'url(' + imagePath + ')');
					$("#helmatContainer").css("background-repeat", 'no-repeat');
					$("#helmatContainer").css("background-size", 'contain');
					break;
				case "2":
					$("#chestContainer").css("background-image", 'url(' + imagePath + ')');
					$("#chestContainer").css("background-repeat", 'no-repeat');
					$("#chestContainer").css("background-size", 'contain');
					break;
				case "3":
					$("#shieldContainer").css("background-image", 'url(' + imagePath + ')');
					$("#shieldContainer").css("background-repeat", 'no-repeat');
					$("#shieldContainer").css("background-size", 'contain');
					break;
				case "4":
					$("#weaponContainer").css("background-image", 'url(' + imagePath + ')');
					$("#weaponContainer").css("background-repeat", 'no-repeat');
					$("#weaponContainer").css("background-size", 'contain');
					break;
				case "5":
					$("#bootsContainer").css("background-image", 'url(' + imagePath + ')');
					$("#bootsContainer").css("background-repeat", 'no-repeat');
					$("#bootsContainer").css("background-size", 'contain');
					break;
				case "6":
					$("#glovesContainer").css("background-image", 'url(' + imagePath + ')');
					$("#glovesContainer").css("background-repeat", 'no-repeat');
					$("#glovesContainer").css("background-size", 'contain');
					break;
				default:
					break;
			}
	});
}

</script>
<div id="body">
	<div class="dropdown">
	  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Presets
	  </button>
	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropDownItems">

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
