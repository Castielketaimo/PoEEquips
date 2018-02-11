# Changelog

## Rules

* Team membership:  NC (Captain), QL (Mate), CL (Mate), RT (Mate)
* Team conventions: Allman notation, markdown for changelog  
* Changelog Format: Read from newest to oldest

## Version 0.1

### New components
-------------------------------------------------------------------------------------------------
####Feb 10, 2018
* Catalog Controller and View - QL
* new image - logo.png -RT
* new favicon - favicon.png -RT
-------------------------------------------------------------------------------------------------
####Feb 9, 2018
* ../controller/Info.php -CL
* ../views/partials/menubar.php -CL
* ../veiws/partials/footer.php -CL
-------------------------------------------------------------------------------------------------
####Feb 8, 2018
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
####Feb 9,2018
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
