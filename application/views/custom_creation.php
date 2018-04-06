<h1>Welcome to PoEEquips!</h1>
<script>
var strength = 0;
var dexterity = 0;
var intelligence = 0;
var selectedPreset = 0;
/*
when page loads, we populate the dropdown menu with all the presets in the database
*/
$().ready(function() {
    // $.getJSON( "{urlLink}info/bundle", function( data ) {
    //   $.each( data, function( key, val ) {
    //     $("#dropDownItems").append('<li><a class="dropdown-item" href="#" onClick="updateAllContainer(' + val.PresetId + ')">' + 'Preset ' + val.PresetId + '</a></li>');
    //   });
    // });

    $.getJSON( "{urlLink}info/bundle", function( data ) {
      $.each( data, function( key, val ) {
        $("#PresetDropDown").append('<option value="' + val.PresetId + '">Preset ' + val.PresetId + '</option>');
      });
    });

    $.getJSON( "{urlLink}info/catalog", function( data ) {
      $.each( data, function( key, val ) {
          if(val.CategoryId === "1"){
               $("#HelmetDropDown").append('<option value="' + val.AccessoriesId + '">'  + val.Name  + '</option>');
          }
          if(val.CategoryId === "2"){
               $("#ArmorDropDown").append('<option value="' + val.AccessoriesId + '">'  + val.Name  + '</option>');
          }
          if(val.CategoryId === "3"){
               $("#ShieldsDropDown").append('<option value="' + val.AccessoriesId + '">'  + val.Name  + '</option>');
          }
          if(val.CategoryId === "4"){
               $("#WeaponsDropDown").append('<option value="' + val.AccessoriesId + '">'  + val.Name  + '</option>');
          }
          if(val.CategoryId === "5"){
               $("#BootsDropDown").append('<option value="' + val.AccessoriesId + '">'  + val.Name  + '</option>');
          }
          if(val.CategoryId === "6"){
               $("#GlovesDropDown").append('<option value="' + val.AccessoriesId + '">'  + val.Name  + '</option>');
          }
        });
    });
    // $.getJSON( "{urlLink}info/catalog", function( data ) {
    //   $.each( data, function( key, val ) {
    //       if(val.CategoryId === "1"){
    //            $("#HelmetDropDown").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.AccessoriesId + ')">' + val.Name  + '</a></li>');
    //       }
    //       if(val.CategoryId === "2"){
    //            $("#ArmorDropDown").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.AccessoriesId + ')">'  + val.Name  + '</a></li>');
    //       }
    //       if(val.CategoryId === "3"){
    //            $("#ShieldsDropDown").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.AccessoriesId + ')">'  + val.Name  + '</a></li>');
    //       }
    //       if(val.CategoryId === "4"){
    //            $("#WeaponsDropDown").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.AccessoriesId + ')">'  + val.Name  + '</a></li>');
    //       }
    //       if(val.CategoryId === "5"){
    //            $("#BootsDropDown").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.AccessoriesId + ')">'  + val.Name  + '</a></li>');
    //       }
    //       if(val.CategoryId === "6"){
    //            $("#GlovesDropDown").append('<li><a class="dropdown-item" href="#" onClick="updateContainer(' + val.AccessoriesId + ')">'  + val.Name  + '</a></li>');
    //       }
    //     });
    // });
    $( "#clearbtn" ).click(function() {
        location.reload();
    });
});

function updateAllContainer(key){
        $.getJSON( "{urlLink}info/bundle/" + key.value, function( data ) {
        strength = 0;
        dexterity = 0;
        intelligence = 0;
        selectedPreset = key.value;
        updateContainers(data.Helmet);
        updateContainers(data.Chest);
        updateContainers(data.Shields);
        updateContainers(data.Weapons);
        updateContainers(data.Boots);
        updateContainers(data.Gloves);
    });
}
/*
we update each container one by one based on the selected id, sum up the stats
*/
function updateContainer(key) {
    $.getJSON( "{urlLink}info/catalog/" + key.value, function( data ) {
        updateContainers(data.AccessoriesId);
    });
}

function updateContainers(key) {
    $.getJSON( "{urlLink}info/catalog/" + key, function( data ) {
        var imagePath = '/assets/images/' + data.ImagePath;
        strength += parseInt(data.Strength);
        dexterity += parseInt(data.Dexterity);
        intelligence += parseInt(data.Intelligence);
        switch (data.CategoryId)
            {
                case "1":
                    $("#helmatContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    $("#HelmetDropDown").val(data.AccessoriesId);
                    break;
                case "2":
                    $("#chestContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    $("#ArmorDropDown").val(data.AccessoriesId);
                    break;
                case "3":
                    $("#shieldContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    $("#ShieldsDropDown").val(data.AccessoriesId);
                    break;
                case "4":
                    $("#weaponContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    $("#WeaponsDropDown").val(data.AccessoriesId);
                    break;
                case "5":
                    $("#bootsContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    $("#BootsDropDown").val(data.AccessoriesId);
                    break;
                case "6":
                    $("#glovesContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    $("#GlovesDropDown").val(data.AccessoriesId);
                    break;
                default:
                    break;
            }
            updateStat();
    });
}

/*
  we update a single container based on the preset
*/
function updateContainersOption(key) {
    $.getJSON( "{urlLink}info/catalog/" + key.value, function( data ) {
        var imagePath = '/assets/images/' + data.ImagePath;
        strength += parseInt(data.Strength);
        dexterity += parseInt(data.Dexterity);
        intelligence += parseInt(data.Intelligence);
        switch (data.CategoryId)
            {
                case "1":
                    $("#helmatContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    break;
                case "2":
                    $("#chestContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    break;
                case "3":
                    $("#shieldContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    break;
                case "4":
                    $("#weaponContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    break;
                case "5":
                    $("#bootsContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
                    break;
                case "6":
                    $("#glovesContainer").css("background-image", 'url(' + imagePath + ')').attr("title", data.Name + "\n" + "Str: " + data.Strength + "\n" + "Dex: " + data.Dexterity + "\n" + "Int: " + data.Intelligence);
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

function updatePreset() {
    if(selectedPreset != 0) {
        document.getElementById('customProcess').action = "custom/edit/" + selectedPreset;
        $("#submitForm").trigger("click");
    }
}

</script>

<div id="body">
    <div class="stat">
        <p id="strength">Strength: </p>
        <p id="dexterity">Dexterity: </p>
        <p id="intelligence">Intelligence:</p>
    </div>
    <!-- <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Presets
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropDownItems">
      </div>
    </div> -->
    <select name="Preset" id="PresetDropDown" onchange="updateAllContainer(this)">
        <option disabled selected value>Presets</option>
    </select>
    <form id="customProcess" method="POST" action="custom/add">
        <!-- <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Helmet
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="HelmetDropDown">
          </div>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Armor
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="ArmorDropDown">
          </div>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Shields
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="ShieldsDropDown">
          </div>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Weapons
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="WeaponsDropDown">
          </div>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Boots
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="BootsDropDown">
          </div>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Gloves
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="GlovesDropDown">
          </div>
        </div> -->
        <select name="Helmet" id="HelmetDropDown" onchange="updateContainersOption(this)">
            <option disabled selected value>Helmet</option>
        </select>
        <select name="Chest" id="ArmorDropDown" onchange="updateContainersOption(this)">
            <option disabled selected value>Armor</option>
        </select>
        <select name="Shields" id="ShieldsDropDown" onchange="updateContainersOption(this)">
            <option disabled selected value>Shields</option>
        </select>
        <select name="Weapons" id="WeaponsDropDown" onchange="updateContainersOption(this)">
            <option disabled selected value>Weapons</option>
        </select>
        <select name="Boots" id="BootsDropDown" onchange="updateContainersOption(this)">
            <option disabled selected value>Boots</option>
        </select>
        <select name="Gloves" id="GlovesDropDown" onchange="updateContainersOption(this)">
            <option disabled selected value>Gloves</option>
        </select>

        <button type="button" class="btn btn-primary" id = "clearbtn">Clear</button>
        <!-- <input type="hidden" name="Helmet" value="5"></input>
        <input type="hidden" name="Chest" value="12"></input>
        <input type="hidden" name="Shields" value="14"></input>
        <input type="hidden" name="Weapons" value="24"></input>
        <input type="hidden" name="Boots" value="25"></input>
        <input type="hidden" name="Gloves" value="302"></input> -->
        <input id="submitForm" type="submit" value="Add New Preset"></input>
    </form>
    <input type="submit" value="Update Preset" onclick="updatePreset()"></input>
    <div id="bgcontainer">
        <div id = "weaponContainer" data-toggle="tooltip" title="" class = "inventoryContainers">
        </div>
        <div id = "glovesContainer" data-toggle="tooltip" title=""  class = "inventoryContainers">
        </div>
        <div id = "shieldContainer" data-toggle="tooltip" title=""  class = "inventoryContainers">
        </div>
        <div id = "bootsContainer" data-toggle="tooltip" title=""  class = "inventoryContainers">
        </div>
        <div id = "helmatContainer" data-toggle="tooltip" title=""  class = "inventoryContainers">
        </div>
        <div id = "chestContainer" data-toggle="tooltip" title=""  class = "inventoryContainers">
        </div>
    </div>
</div>
