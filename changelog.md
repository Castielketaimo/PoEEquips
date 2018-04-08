# Changelog

## Rules

* Team membership:  NC (Captain), QL (Mate), CL (Mate), RT (Mate), GB(Mate)
* Team conventions: Allman notation, markdown for changelog  
* Changelog Format: Read from newest to oldest

## Version 2.0

### Updated components
-------------------------------------------------------------------------------------------------
#### Apr.8, 2018
* added accessory maintenance to catalog controller - GB
* added rules to Accessories model - GB
#### Apr 7, 2018
* added determining user role in custom controller - QL & RT
* update MY_Controller to display menubar according to user role - QL & RT
* added {custom} and {updatepreset} button - QL & RT
#### Apr 6, 2018
* Commented out var_dump and echo from testing to fix header issue - QL
* Added Stat validation for empty entries - QL
* Fixed Memory_Model for catalog - QL
* Updated custom controller to process preset adding, and editing to csv files- QL
* Replaced Memory_Model with a functional version - QL
* Updated custom_creation work with new controller methods - QL

### New components
-------------------------------------------------------------------------------------------------
#### Apr.8, 2018
* itemedit.php -GB
#### Mar 28, 2018
* Custom.php - CL
* custom_creation.php -CL
* Created Roles Controller - RT
* Added define roles into constant.php - RT
* added dropdown roles to menubar - RT

### Updated components
-------------------------------------------------------------------------------------------------
#### Mar 28, 2018
* Info.php (Added validate function checkchoice, when the key passeed in not in the database, no json will be encoded.) - CL
* menubar.php (Added link to custom page) -CL
## Version 1.0

### New components
-------------------------------------------------------------------------------------------------
#### Feb 10, 2018
* Catalog Controller and View - QL
* new image - logo.png -RT
* new favicon - favicon.png -RT
-------------------------------------------------------------------------------------------------
#### Feb 9, 2018
* ../controller/Info.php -CL
* ../views/partials/menubar.php -CL
* ../veiws/partials/footer.php -CL
-------------------------------------------------------------------------------------------------
#### Feb 8, 2018
* 3 models - QL
* Accessories.php, Categories.php, Presets.php
* 3 controllers - QL
* AccessoriesCtr.php, CategoriesCtr.php, PresetsCtr.php
* csv folder - QL
* 3 csv files - QL
* Accessories.csv, Categories.csv, Presets.csv - QL
* images folder - RT
* 31 pictures - RT
* weapon folder and weapon images - RT
* about.php controllers and about_message view - RT

### Updated components
#### Feb 11,2018
* Update the version of the app for first release - NC
* fixed ../views/template (inventoryContainers image repeat) -CL
-------------------------------------------------------------------------------------------------
#### Feb 10,2018
* changed stat colors and moved presets to under the stats for welcome_message view -QL
* fixed menubar view controller to not highlight Home button for all pages -QL
* fixed Memory_Model to be work with where Query -QL
* added striped table for Catalog controller -QL
* updated code for extracting Categories.csv with foreign key in Catalog Controller -QL
* removed redundant code in welcome_message view for css -QL
* centered equipment page on homepage css -QL
* updated ../views/welcome_message (added comments for all the functions) -CL
* updated ../controller/info (added comments for all the functions) -CL
* updated ../views/partials/footer (added link to json files) -CL
* updated ../public/assets/css/default (deleted footer style as we using bootstrap) -CL
* updated ../views/template (used {menubar} and {footer} to place partial view in order) -CL
* updated ../views/partials/footer (use new bootstrap template to make it looks good) -CL
* updated ../controllers/About (only used render function instead load partial views) - CL
* updated ../controllers/Catalog (only used render function instead load partial views) - CL
* updated ../controllers/Welcome (only used render function instead load partial views) - CL
* updated ../core/MY_Controller render function (all the partial view render in correct order) -CL
* move the image css to css files - RT
* updated logo pictures and web app title - RT
* updated ../view/welcome_message (changed the dropdown menu items name) -CL
* updated ../view/welcome_message (added stats display) -CL
* updated ../view/partial/menubar (updated link of home and logo) -CL
* updated catalog controller to correctly display Category - QL
* updated menu items (delete link to Json files and replace with catalog) -CL
* added links to menu dropDownItems -CL
* updated ../view/about_message (Changed the index function to make the page looks nicer) -CL
-------------------------------------------------------------------------------------------------
#### Feb 9,2018
* updated Presets/ Categories/ Accessories to have gloves category - QL
* added selector functionality for presets on front page - QL
* populated selector with presets functional - QL
* made pictures dynamically fill equipment boxes when selecting presets - QL
* fixed image sized to fit with inventory slot size - QL
* implemented catalog, bundle, category view controllers - QL
* ..assets/css/default.css (updated css file) - CL
* ../view/Welcome_message (added invantory image and divs) - CL
* ../views/template (moved the footer to footer.php) -CL
* ../cotrollers/Welcome.php (load partial and welcome page) -CL
* gitignore (allowed CSV files in git) -CL
