<h1>Welcome to PoEEquips!</h1>
<script>
var strength = 0;
var dexterity = 0;
var intelligence = 0;
/*
when page loads, we populate the dropdown menu with all the presets in the database
*/
$().ready(function() {
    $.getJSON( "{urlLink}info/bundle", function( data ) {
      $.each( data, function( key, val ) {
        $("#dropDownItems").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.PresetId + ')">' + 'Preset ' + val.PresetId + '</a></li>');
      });
    });
});

/*
we update each container one by one based on the selected id, sum up the stats
*/
function updateContainer(key) {
    $.getJSON( "{urlLink}info/bundle/" + key, function( data ) {
        strength = 0;
        dexterity = 0;
        intelligence = 0;
        updateContainers(data.Helmet);
        updateContainers(data.Chest);
        updateContainers(data.Shields);
        updateContainers(data.Weapons);
        updateContainers(data.Boots);
        updateContainers(data.Gloves);
    });
}

/*
  we update a single container based on the preset
*/
function updateContainers(key) {
    $.getJSON( "{urlLink}info/catalog/" + key, function( data ) {
        var imagePath = '/assets/images/' + data.ImagePath;
        // $("#helmatContainer").css('background-image', "url('/assets/images/helmets/BoneHelmet.png')");
        strength += parseInt(data.Strength);
        dexterity += parseInt(data.Dexterity);
        intelligence += parseInt(data.Intelligence);
        switch (data.CategoryId)
            {
                case "1":
                    $("#helmatContainer").css("background-image", 'url(' + imagePath + ')');
                    break;
                case "2":
                    $("#chestContainer").css("background-image", 'url(' + imagePath + ')');
                    break;
                case "3":
                    $("#shieldContainer").css("background-image", 'url(' + imagePath + ')');
                    break;
                case "4":
                    $("#weaponContainer").css("background-image", 'url(' + imagePath + ')');
                    break;
                case "5":
                    $("#bootsContainer").css("background-image", 'url(' + imagePath + ')');
                    break;
                case "6":
                    $("#glovesContainer").css("background-image", 'url(' + imagePath + ')');
                    break;
                default:
                    break;
            }
            updateStat();
    });
}
/*
updated the stats and display it 
*/
function updateStat() {
    $("#strength").text("Strength: " + strength)
    $("#dexterity").text("Dexterity: " + dexterity)
    $("#intelligence").text("Intelligence: " + intelligence)
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
<div class="stat">
    <p id="strength">Strength: </p>
    <p id="dexterity">Dexterity: </p>
    <p id="intelligence">Intelligence:</p>
</div>
    <div id="bgcontainer">
        <div id = "weaponContainer" class = "inventoryContainers">
        </div>
        <div id = "glovesContainer" class = "inventoryContainers">
        </div>
        <div id = "shieldContainer" class = "inventoryContainers">
        </div>
        <div id = "bootsContainer" class = "inventoryContainers">
        </div>
        <div id = "helmatContainer" class = "inventoryContainers">
        </div>
        <div id = "chestContainer" class = "inventoryContainers">
        </div>
    </div>
</div>
